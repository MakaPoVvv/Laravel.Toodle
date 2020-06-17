@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-12 col-md-6">
                <div class="tasks">
                    <form action="{{route('tasks.destroyCompleted', app()->getLocale())}}" method='post'>
                        @method('delete')
                        @csrf
                        <div class="titleHome d-flex align-items-center flex-column">
                            <h2>{{__('message.all')}}</h2>
                            <button type="submit" class="clear">{{__('message.clear')}}</button>
                        </div>
                    </form>
                    <ul>
                        @foreach($tasks as $task)
                            @if($task->status_id == 1)
                                <li>
                                    <a class="btn btn-danger"
                                       href="{{ url('tasks/'. app()->getLocale().'/'.$task->id) }}">{{$task->title}}</a>
                                </li>
                            @elseif($task->status_id == 2)
                                <li>
                                    <a class="btn btn-warning"
                                       href="{{ url('tasks/'. app()->getLocale().'/'.$task->id) }}">{{$task->title}}</a>
                                </li>
                            @else
                                <li>
                                    <a class="btn btn-success"
                                       href="{{ url('tasks/'. app()->getLocale().'/'.$task->id) }}">{{$task->title}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>

                </div>
                <div class="link d-flex justify-content-center">
                    {{$tasks->links()}}
                </div>

            </div>
            <div class="col-lg-8 col-md-3">
                <div class="col-lg-4 col-md-3 new_task">
                    <h2>{{__('message.new')}}</h2>
                    <form action="{{route('tasks.store', app()->getLocale())}}" method="post">
                        <div class="form-group">
                            <label for="title"></label>
                            <input type="text" name="title" class="form-control"
                                   placeholder="{{__('message.placeholder')}}">
                            {{$errors->first('title')}}
                            <select class="form-control" name="priority_id">
                                @foreach(\App\Priority::all() as $priority)
                                <option value="{{$priority->id}}">{{$priority->priority}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">{{__('message.add')}}</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

