@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>{{__('message.panel')}}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{__('message.avatar')}}</th>
                    <th scope="col">{{__('message.name')}}</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)

                <tr>
                <th scope="row"><img src="{{asset($user->image)}}" alt="" height="30" width="30"
                                     style="border-radius:50%; margin-right: 10px"></th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->id}}</td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection
