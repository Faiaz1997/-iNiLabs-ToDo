<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    use HasFactory;
    private static $task;
    public static function taskAdded($req)
    {
        self::$task = new todo();
        self::$task->uid = auth()->user()->id;
        self::$task->task = $req->task;
        self::$task->deadline = $req->deadline;
        self::$task->save();
    }

    public static function taskUpdated($req)
    {
        self::$task = todo::find($req->id);
        self::$task->task = $req->task;
        self::$task->deadline = $req->deadline;
        self::$task->save();
    }

    public static function deleteTask($request)
    {
        self::$task = todo::find($request->id);
        self::$task->delete();
    }
}
