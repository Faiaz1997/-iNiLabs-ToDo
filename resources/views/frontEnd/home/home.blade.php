@extends('frontEnd.master')

@section('title')
Home
@endsection

@section('content')
<style>
    .content-section {
        min-height: calc(100vh - 70px); /* Subtracting navbar height */
    }
</style>

<section class="content-section" style="background-color: #190482;">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card rounded-3 shadow" style="background-color: #7752FE;">
                    <div class="card-header bg-white p-4" style="color: #190482;">
                        <h2 class="text-center">What's your PLAN for today?</h2>
                    </div>
                    <div class="card-body p-4">
                        <form class="row g-3 mb-4" action="{{ route('add.task') }}" method="post">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="task" class="form-label text-light">Task Name</label>
                                    <input type="text" class="form-control" id="task" name="task" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="deadline" class="form-label text-light">Deadline</label>
                                    <input type="time" class="form-control" id="deadline" name="deadline" required>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-warning mt-3">Add Task</button>
                            </div>
                        </form>
                        @if (session('message'))
                        <p class="alert alert-info">{{ session('message') }}</p>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped text-light">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">#</th>
                                        <th scope="col">Tasks</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1 @endphp
                                    @foreach($items as $item)
                                    <tr class="text-center">
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $item->task }}</td>
                                        <td>{{ $item->deadline }}</td>
                                        <td>
                                            @if($item->status == 1)
                                            <a href="{{ route('status', ['id' => $item->id]) }}" class="btn btn-secondary">Pending</a>
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
                            @if($items->isEmpty())
                                <p class="text-center text-light mt-3">No tasks available.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
