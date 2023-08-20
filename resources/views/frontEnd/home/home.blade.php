@extends('frontEnd.master')

@section('title')
Home
@endsection

@section('content')
<div class="container-fluid p-2">
    <div class="row d-flex align-items-center">
        <div class="col-md-12 d-flex justify-content-end">
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
    <div class=" row d-flex justify-content-around align-items-center">
        <div class="tasks col-md-4 d-flex justify-content-start mt-5 p-4 card">
            <div class="row mb-3 card-header">
                <div class="col-md-12 d-flex justify-content-between">
                    <div class="col-md-12">
                        <h1>What is your plan for today?</h1>
                    </div>
                </div>
            </div>
            <div class="row d-flex align-items-center">
                <div class="col-md-12">
                    <form action="{{route('add.task')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="task" class="form-label ">
                                <h6>Tasks</h6>
                            </label>
                            <input type="text" class="form-control" id="task" name="task">
                            <div id="task" class="form-text">Add your task.</div>
                        </div>
                        <div class="mb-3">
                            <label for="deadline" class="form-label">
                                <h6>Deadline</h6>
                            </label>
                            <input type="time" class="form-control" id="deadline" name="deadline">
                            <div id="task" class="form-text">Last time to complete your task.</div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Add Task</button>
                        <h6 class="page-title text-color-dark-beige">{{session('message')}}</h6>
                    </form>
                </div>
            </div>
        </div>
        <div class="task-list col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Task List</h5>
                            <div class="col-md-4">
                                <form method="post" action="{{route('expired.tasks')}}">
                                    @csrf
                                    <div class="form-group row mb-3">
                                        <div class="col-md-12">
                                            <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-grid col-md-12 mx-auto">
                                            <button type="submit" class="btn btn-primary">Search by Date</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr />

                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="align-items-center">
                                        <th>sl</th>
                                        <th>Tasks</th>
                                        <th>Deadline</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @php $i=1 @endphp
                                @foreach($items as $item)
                                <tbody>
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->task}}</td>
                                        <td>{{$item->deadline}}</td>
                                        <td class="d-flex">
                                            <a href="{{route('task.edit',['id'=>$item->id])}}" class="btn btn-warning">Edit</a>
                                            <form action="{{route('delete.task')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <button type="submit" class="btn btn-danger ms-2">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection