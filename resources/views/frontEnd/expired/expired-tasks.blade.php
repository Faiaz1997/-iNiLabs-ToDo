@extends('frontEnd.master')

@section('title')
Expired Taks
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
    <div class="row d-flex justify-content-around align-items-center">
        <div class="tasks-list col-md-6">
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
                                    <tr>
                                        <th>sl</th>
                                        <th>Tasks</th>
                                        <th>Deadline</th>
                                    </tr>
                                </thead>
                                @php $i=1 @endphp
                                @foreach($items as $item)
                                <tbody>
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->task}}</td>
                                        <td>{{$item->deadline}}</td>
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