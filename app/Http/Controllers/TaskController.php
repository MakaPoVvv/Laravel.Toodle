<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($user)
    {
        $users = User::findOrFail($user);
        if (Auth::id() != $users->id) {
            abort(404);
        }
        return view('home', compact('users'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store()
    {
        auth()->user()->tasks()->create(request()->validate([
            'title' => 'required|min:2|max:100',
        ]));

        return redirect('home/' . Auth::user()->id);
    }

    public function show($task)
    {
        $task = Task::find($task);
        if(Auth::user()->id != $task->user->id){
            abort('404');
        }
        return view('tasks.show', compact('task'));
    }

    public function complete($task)
    {
        Task::where('id', $task)->update(array('status' => 'completed'));

        return redirect('tasks/' . $task)->with('success', 'Completed');
    }

    public function edit($task)
    {
        $tasks = Task::find($task);
        return view('tasks.edit', compact('tasks'));
    }

    public function update($task)
    {
        $tasks = Task::find($task);
        $tasks->update(request()->validate([
            'title' => 'required|min:2',
        ]));

        return redirect('tasks/' . $tasks->id);
    }

    public function destroy($task)
    {
        $tasks = Task::find($task);
        $tasks->delete();
        return redirect('home/' . Auth::user()->id);
    }

    public function destroyCompleted()
    {
        $tasks = Task::where('status', 'completed');

        $tasks->delete();

        return redirect('home/' . Auth::user()->id);
    }

}
