@extends('layouts.app')
@section('content')
    <div class="container-fluid ">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 d-flex ">
                <div class="col-lg-3 new__task text-center">
                    <h2>{{__('message.editTask')}}</h2>
                    <form action="{{url('/tasks/'.app()->getLocale().'/update'. '/'. $tasks->id)}}" method = "post">
                        @method("Put")
                        <div class="form-group">
                            <label for="title"></label>
                            <input type="text" name = "title" class="form-control" placeholder="name" value="{{ old('title') ?? $tasks->title}}">
                            {{$errors->first('title')}}
                        </div>
                        <select class="form-control" name="priority_id">
                            <option value="{{$tasks->getPriority()->id}}">{{$tasks->getPriority()->priority}}</option>
                            @foreach(\App\Priority::all() as $priority)
                                <option value="{{$priority->id}}">{{$priority->priority}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">{{__('message.edit')}}</button>
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
