<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $user = User::find($id);
        if (Auth::user()->id != $user->id) {
            abort(404);
        }
        $tasks = ($user->tasks()->count());
        $completedTasks = $user->tasks()->where('status', 'completed')->count();
        $uncompletedTasks = $user->tasks()->where('status', 'uncompleted')->count();
        return view('user.account', compact('tasks', 'completedTasks', 'uncompletedTasks', 'user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function update($id)
    {
        $user = User::find($id);
        $data = \request()->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        $user->update($data);

        return redirect('home/' . $id . '/account');
    }

    public function updateImage(Request $request)
    {
        if (request()->has('image')) {
            $user = User::find($request->id);
//            dd($request->image);
            $avatarUploaded = request()->file('image');
            $avatarName = time() . "." . $avatarUploaded->getClientOriginalExtension();
            $avatarPath = public_path('/uploads');
            $avatarUploaded->move($avatarPath, $avatarName);
            $user->update([
                'image' => '/uploads/' . $avatarName
            ]);
            return redirect('home/' . Auth::user()->id . '/account');
        }
    }
}

