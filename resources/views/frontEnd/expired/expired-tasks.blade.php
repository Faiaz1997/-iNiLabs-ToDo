@extends('frontEnd.master')

@section('title')
Expired Taks
@endsection

@section('content')
<section class="vh-100" style="background-color: #190482;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
                <div class="card rounded-3 "style=" background-color: #7752FE;">
                    <div class="card-body p-4">
                        <h2 class="text-center my-3 pb-3 text-light">To Do App</h2>

                        <table class="table mb-4">
                            <thead>
                                <tr class="align-items-center justify-content-around">
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
</section>

@endsection