@extends('frontEnd.master')

@section('title')
Edit Task
@endsection

@section('content')

<style>
    .content-section {
        min-height: calc(100vh - 70px); /* Subtracting navbar height */
    }
</style>
<section class="content-section" style="background-color: #190482;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8 col-lg-6">
                <div class="card rounded-3 shadow" style="background-color: #7752FE;">
                    <div class="card-header bg-white p-4" style="color: #190482;">
                        <h2 class="text-center">Want to change your PLAN?</h2>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('update.task') }}" method="post">
                            @csrf
                            <input type="hidden" class="form-control" id="id" name="id" value="{{ $items->id }}">

                            <div class="mb-3">
                                <label for="task" class="form-label text-light"><h6>Task</h6></label>
                                <input type="text" class="form-control" id="task" name="task" value="{{ $items->task }}" required>
                                <div id="taskHelp" class="form-text text-light">Update your task.</div>
                            </div>

                            <div class="mb-3">
                                <label for="deadline" class="form-label text-light"><h6>Deadline</h6></label>
                                <input type="time" class="form-control" id="deadline" name="deadline" value="{{ $items->deadline }}" required>
                                <div id="deadlineHelp" class="form-text text-light">Update the deadline for your task.</div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-warning">Update Task</button>
                            </div>
                        </form>

                        @if (session('message'))
                            <div class="alert alert-info mt-3">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
