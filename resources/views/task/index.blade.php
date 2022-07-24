@extends('welcome')

@section('content')
    
<div class="container ">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 d-flex ">
            <div class="col-md-6 m-5" >
                <div class="card" style="background-color: burlywood">
                    <div class="card-header">
                        <span class="fs-5 fw-bold">Create your todo-list here.</span>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-succcess">
                            <span>{{session('status')}}</span>
                        </div>
                    @endif

                    <div class="card-body">
                        <form action="/task" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="title">Task to perform <span class="text-danger">*</span></label>
                                <input class="form-control" id="title" required type="text" name="title" placeholder="Your task.">
                            </div>
                            <div class="form-group">
                                <label for="time">Time<span class="text-danger">*</span></label>
                                <input class="form-control" id="time" required type="time" name="time">
                            </div>
                            <div class="form-group">
                                <label for="date">Date <span class="text-danger">*</span></label>
                                <input class="form-control" id="date" required type="date" name="date">
                            </div>
                            <button type="submit" class="badge btn bg-primary mt-3 float-end">Add to list</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 m-5">
                <div class="card" style="background-color: chocolate">
                    <div class="card-header">
                        <span class="fw-bold fs-5">Your todo-list to perform.</span>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            {{-- @foreach ($monkey as $item) --}}
                            <tbody>
                                <tr>
                                    <td>button</td>
                                    <td>{{$task->title}}</td>
                                </tr>
                            </tbody>
                            {{-- @endforeach --}}
                        </table>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>

@endsection