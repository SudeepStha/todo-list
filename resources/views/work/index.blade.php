@extends('welcome')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-12 d-flex">
            <div class="col-md-6 m-4">
                <div class="card mt-5" >
                    <div class="card-header">
                        Create Your Working Plan
                    </div>
                    <div class="card-body" style="background-color: burlywood">
                        <form action="/work" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Task to perform <span class="text-danger">*</span></label>
                                        <input class="form-control" id="title" required type="text" name="title" placeholder="Your task.">
                                    </div>
                                    <div class="form-group">
                                        <label for="time">Time <span class="text-danger">*</span></label>
                                        <input class="form-control" id="time" required type="time" name="time" placeholder="Your task.">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date <span class="text-danger">*</span></label>
                                        <input class="form-control" id="date" required type="date" name="date" placeholder="Your task.">
                                    </div>
                                </div>
                            </div>
    
                            <button type="submit" class="badge btn bg-primary float-end mt-3">Add</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 m-4">
                <div class="card mt-5" >
                    <div class="card-header">
                        Your Working List
                    </div>
                    <div class="card-body" style="background-color: lightsteelblue">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Task</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($work as $work)
                                <tr>
                                    <td>{{$work->title}}</td>
                                    <td>{{\Carbon\Carbon::parse($work->time)->format('h:i a')}}</td>
                                    <td>{{$work->date}}</td>
                                    <td>
                                        <form action="/work/{{$work->id}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="badge btn bg-danger"><i class="fas fa-trash-can"></i></button>
                                        </form>
                                        {{-- <a href="/work/{{$work->id}}" class="badge btn bg-danger ">Delete</a> --}}
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

@endsection

