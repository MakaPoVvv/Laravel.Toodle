@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-12 col-md-6">
                <div class="tasks">
                    <h2 style="">All Tasks</h2>
                    <ul>
                        @foreach($users->tasks as $task)
                            @if($task->status == 'uncompleted')
                                <li>
                                    <a class="btn btn-danger"
                                       href="{{ route('tasks.show', $task->id) }}">{{$task->title}}</a>
                                </li>
                            @else
                                <li>
                                    <a class="btn btn-success"
                                       href="{{ route('tasks.show', $task->id) }}">{{$task->title}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-md-3">
                <div class="col-lg-3 col-md-3 new_task">
                    <h2>New Task</h2>
                    <form action="{{route('tasks.store')}}" method="post">
                        <div class="form-group">
                            <label for="title"></label>
                            <input type="text" name="title" class="form-control" placeholder="Do something amazing">
                            {{$errors->first('title')}}
                            <small id="emailHelp" class="form-text text-muted">Get it done.</small>
                        </div>
                        <button type="submit" class="btn btn-success">Add task</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

