@extends('layouts.app')
@section('content')
    <div class="col-lg-8 col-md-3">
        <div class="col-lg-12 col-md-12">
            <h2>New Task</h2>
            <form action="{{route('tasks.store', app()->getLocale())}}" method="post">
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
@endsection
