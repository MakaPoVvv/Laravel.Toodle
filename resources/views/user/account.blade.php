@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center text-center">
                <div class="card" style="width:100%; max-width:700px;">
                    <div class="d-flex justify-content-center">

                        <div class="form-control">

                        <form action="{{url('/home/'.app()->getLocale().'/'.$user->id.'/account/update/image')}}" method ="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <input class="form-control-file" type="file" name="image">
                            <button class="btn btn-primary">{{__('message.submit')}}</button>
                        </form>
                        </div>
                    </div>
                    <div class="card-body" style="margin-top:50px">
                        <div class="pic d-flex flex-column justify-content-center">
                            <img class="account_image" src="{{asset($user->image)}}">
                            <div class="account_title">
                            <h2 class="card-title">{{$user->name}}<a href="{{url('/home/'.app()->getLocale().'/'.$user->id.'/account/edit')}}" class="btn btn-link">{{__('message.changeName')}}</a>
                            </h2>
                            </div>
                        </div>

                        <p class="card-text">{{$user->email}}</p>
                        <h3 class="card-text">{{__('message.overall')}}: {{$user->completed}}</h3>
                    </div>
                    <div class="d-flex justify-content-center">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">{{__('message.completed')}}</div>
                        <div class="card-body">
                            <h1 class="card-title text-center">{{$completedTasks}}</h1>
                        </div>
                    </div>
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">{{__('message.uncompleted')}}</div>
                            <div class="card-body">
                                <h1 class="card-title text-center">{{$uncompletedTasks}}</h1>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
