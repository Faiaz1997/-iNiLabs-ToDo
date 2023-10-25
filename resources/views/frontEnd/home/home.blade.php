@extends('frontEnd.master')

@section('title')
Home
@endsection

@section('content')
<section class="vh-100" style="background-color: #190482;">
    <div class="container py-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-10 col-lg-7">
                <div class="card rounded-3" style="background-color: #7752FE;">
                    <div class="card-body p-4">
                        <h2 class="text-center my-3 pb-3 text-light">To Do App</h2>
                        <form class="row mb-4" action="{{ route('add.task') }}" method="post">
                            @csrf
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="task" class="form-label text-light">Task Name</label>
                                    <input type="text" class="form-control" id="task" name="task" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="deadline" class="form-label text-light">Deadline</label>
                                    <input type="time" class="form-control" id="deadline" name="deadline" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-warning btn-block mt-3">Add Task</button>
                            </div>
                        </form>
                        <p class="form-label text-light">{{ session('message') }}</p>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>sl</th>
                                        <th>Tasks</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1 @endphp
                                    @foreach($items as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->task }}</td>
                                        <td>{{ $item->deadline }}</td>
                                        <td>
                                            @if($item->status == 1)
                                            <a href="{{ route('status', ['id' => $item->id]) }}" class="btn btn-secondary text-light">Pending</a>
                                            @else
                                            <a href="{{ route('status', ['id' => $item->id]) }}" class="btn btn-success">Finished</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('task.edit', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('delete.task') }}" method="post" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection