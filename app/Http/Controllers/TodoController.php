<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\todo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TodoController extends Controller
{
    //

    public function index()
    {
    
        return view('frontEnd.home.home',[
            'items' =>todo::orderby('deadline', 'asc')
            ->where('uid',auth()->user()->id)
            ->whereDate('created_at', Carbon::today())
            ->get(),
            
        ],);
    }

    public function addTask(Request $req)
    {
        todo::taskAdded($req);
        return back()->with('message', 'Task Added Successfully');
    }

    
    public function expiredTasks(Request $req)
    {
    
        return view('frontEnd.expired.expired-tasks',[
            'items' =>todo::where('uid',auth()->user()->id)
                    ->whereDate('created_at', $req->date)
                    ->get()
            
        ],);
    }

    public function status($id){
        $todo = todo::find($id);
        if ($todo->status == 1){
            $todo->status = 2;
        }
        else{
            $todo->status = 1;
        }
        $todo->save();
        return back();
     }
    
    public function taskEdit($id)
    {
        return view('frontEnd.tasks.edit-task',[
            'items' =>todo::find($id),
        ],);
    }

    public function updateTask(Request $req)
    {
        todo::taskUpdated($req);
        return back()->with('message', 'Task Updated Successfully');
    }
    public function deleteTask(Request $request){
        todo::deleteTask($request);
        return back();
      }

}
