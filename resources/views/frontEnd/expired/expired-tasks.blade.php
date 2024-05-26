@extends('frontEnd.master')

@section('title')
Expired Tasks
@endsection

@section('content')
<style>
    .content-section {
        min-height: calc(100vh - 70px);
        /* Subtracting navbar height */
    }
</style>
<section class="content-section" style="background-color: #190482;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-10 col-xl-8">
                <div class="card rounded-3 shadow" style="background-color: #7752FE;">
                    <div class="card-header bg-white p-4" style="color: #190482;">
                        <h2 class="text-center">Expired Tasks</h2>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped text-light">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">#</th>
                                        <th scope="col">Task</th>
                                        <th scope="col">Deadline</th>
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
                            <p class="text-center text-light mt-3">No expired tasks available.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection