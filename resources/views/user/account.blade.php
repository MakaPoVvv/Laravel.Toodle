@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center text-center">
                <div class="card mb-3" style="width:100%; max-width:700px;">
                    <img class="card-img-top" src="{{asset($user->image)}}" height="500" width="100"  alt="Card image cap">
                    <div class="d-flex justify-content-center">
                        <div class="form-group">
                        <form action="{{route('account.update', $user->id)}}" method ="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <input class="form-group" type="file" name="image">
                            <button class="btn btn-primary">submit</button>
                        </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">{{$user->name}}<a href="{{route('account.edit', $user->id)}}" class="btn btn-link">Change name</a>
                        </h2>
                        <p class="card-text">{{$user->email}}</p>
                        <h3 class="card-text">Overall Completed:{{$user->completed}}</h3>
                    </div>
                    <div class="d-flex justify-content-center">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">Completed Tasks</div>
                        <div class="card-body">
                            <h1 class="card-title text-center">{{$completedTasks}}</h1>
                        </div>
                    </div>
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">Uncompleted Tasks</div>
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
