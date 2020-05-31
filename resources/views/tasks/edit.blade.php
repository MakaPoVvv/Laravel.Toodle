@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 overflow: scroll">

            </div>
            <div class="col-9">
                <div class="col-lg-3 new__task">
                    <h2>Edit Task</h2>
                    <form action="{{url('/tasks/'.app()->getLocale().'/update'. '/'. $tasks->id)}}" method = "post">
                        @method("Put")
                        <div class="form-group">
                            <label for="title"></label>
                            <input type="text" name = "title" class="form-control" placeholder="name" value="{{ old('title') ?? $tasks->title}}">
                            {{$errors->first('title')}}
                            <small id="emailHelp" class="form-text text-muted">Get it done.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit task</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .new__task{
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
