@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center text-center">
            <div class="col-lg-3 col-lg-6 d-flex">
                <div class="card mb-3">
                    <img class="card-img-top" src="{{asset($user->image)}}" height="500" width="100" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title">{{$user->name}}</h2>
                        <p class="card-text">{{$user->email}}</p>
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
