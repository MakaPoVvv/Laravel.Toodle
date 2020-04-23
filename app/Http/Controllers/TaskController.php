<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index($user)
    {
        $users = User::findOrFail($user);
        if(Auth::id() == $users->id)
        return view('home', compact('users'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|min:2',
        ]);
        auth()->user()->tasks()->create($data);
        return redirect('home');
    }
}
