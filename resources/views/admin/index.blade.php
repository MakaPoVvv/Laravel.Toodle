@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Admin Panel</h1>
        <table class="table">
            <thead>
            @foreach($users as $user)
                <tr>
                    <th scope="col">Avatar</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
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
