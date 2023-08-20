@extends('frontEnd.master')

@section('title')
Edit Task
@endsection

@section('content')
<div class="container-fluid p-2">
<div class="row d-flex align-items-center mb-3">
        <div class="col-md-6 d-flex justify-content-start">
            <a href="{{route('home')}}" class="btn btn-primary">Home</a>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
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
                        <h1>Want to change your plan?</h1>
                    </div>
                </div>
            </div>
            <div class="row d-flex align-items-center">
                <div class="col-md-12">
                    <form action="{{route('update.task')}}" method="post">
                        @csrf
                        <div class="">
                            <input type="hidden" class="form-control" id="id" name="id" value="{{$items->id}}">
                        </div>
                        <div class="mb-3">
                            <label for="task" class="form-label ">
                                <h6>Tasks</h6>
                            </label>
                            <input type="text" class="form-control" id="task" name="task" value="{{$items->task}}">
                            <div id="task" class="form-text">Update your task.</div>
                        </div>
                        <div class="mb-3">
                            <label for="deadline" class="form-label">
                                <h6>Deadline</h6>
                            </label>
                            <input type="time" class="form-control" id="deadline" name="deadline" value="{{$items->deadline}}">
                            <div id="task" class="form-text">Update the last time to complete your task.</div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Update Task</button>
                        <h6 class="page-title">{{session('message')}}</h6>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection