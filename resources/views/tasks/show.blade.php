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
                                <h5 class="modal-title" id="exampleModalLabel">{{__('message.title')}}: {{$task->title}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="modal-body">@if($task->status == 'completed')
                                {{__('message.status')}}: {{__('message.statusCompleted')}}
                                @else
                                    {{__('message.status')}}: {{__('message.statusUncompleted')}}
                                                        @endif
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                @if($task->status == 'uncompleted')
                                    <form action="{{'/tasks/'.app()->getLocale().'/'.$task->id}}" method="post">
                                        @method('Patch')
                                        <button type="submit" class="btn btn-primary">{{__('message.complete')}}</button>
                                        @csrf
                                    </form>

                                    <form action=" {{url('/tasks/'.app()->getLocale().'/'.$task->id.'/edit')}}">
                                        <button type="submit" class="btn btn-warning" data-dismiss="modal">{{__('message.edit')}}</button>
                                        @csrf
                                    </form>
                                @else
                                    <form>
                                        @include('flash-message')
                                        @csrf
                                        @endif
                                    </form>



                                    <form action="{{url('/tasks/'.app()->getLocale().'/'.$task->id)}}" method="post">
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" data-dismiss="modal">{{__('message.delete')}}
                                        </button>
                                        @csrf
                                    </form>

                                    <form action="{{url('home/'. app()->getLocale(). '/'.Auth::user()->id)}}">
                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">{{__('message.close')}}
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
