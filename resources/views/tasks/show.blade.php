@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-lg-3">
                <div class="col-lg-3 new__task">
                    <!-- Button trigger modal -->
                    <!-- Modal -->
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Title: {{$task->title}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Status: {{$task->status}}
                            </div>
                            <div class="modal-footer">
                                @if($task->status == 'uncompleted')
                                    <form action="{{route('tasks.complete', $task->id)}}" method="post">
                                        @method('Patch')
                                        <button type="submit" class="btn btn-primary">Complete</button>
                                        @csrf
                                    </form>

                                    <form action="/tasks/{{$task->id}}/edit">
                                        <button type="submit" class="btn btn-warning" data-dismiss="modal">Edit</button>
                                        @csrf
                                    </form>
                                @else
                                    <form>
                                        @include('flash-message')
                                        @csrf
                                        @endif
                                    </form>



                                    <form action="{{route('tasks.destroy', $task->id)}}" method="post">
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" data-dismiss="modal">Delete
                                        </button>
                                        @csrf
                                    </form>

                                    <form action="{{route('home', \Illuminate\Support\Facades\Auth::user()->id)}}">
                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        @csrf
                                    </form>

                            </div>
                        </div>
                    </div>
                </div>
                @csrf
                </form>
            </div>
        </div>
    </div>

    <style>
        .new__task {
            position: fixed; /* or absolute */
            top: 50%;
            left: 50%;
            margin: -150px 0 0 -240px;
        }

        .new__task h2 {
            text-align: center;
        }

        form button {
            margin-top: 10px;
        }

        @media(max-width: 700px){
            .new__task {
                position: relative; /* or absolute */
                top: 0;
                left: 0;
                margin: 0;
            }
        }
    </style>
@endsection
