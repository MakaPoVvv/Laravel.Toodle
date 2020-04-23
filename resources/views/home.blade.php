
@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 overflow: scroll">
                <div class="tasks" style="border-right: 3px solid gray; height: 90vh">
                    <h2 style="padding-left: 15%">All Tasks</h2 >

                    <ul>
                        @foreach($users->tasks as $task)
                            <li>
                                <a href="#">{{$task->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-9">
                <div class="col-lg-3 new_task">
                    <h2>New Task</h2>
                    <form action="{{route('tasks.store')}}" method = "post">
                        <div class="form-group">
                            <label for="title"></label>
                            <input type="text" name = "title" class="form-control" placeholder="name">
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

    <style>
        .new_task{
            position: fixed; /* or absolute */
            top: 50%;
            left: 50%;
            margin: -150px 0 0 -200px;
        }

        .new__task h2{
            text-align: center;
        }

        form button{
            margin-top: 10px;
        }
    </style>
@endsection

