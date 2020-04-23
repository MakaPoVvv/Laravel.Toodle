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
        return redirect('home/'.Auth::user()->id);
    }

    public function show($task)
    {
        $task = Task::find($task);

        return view('tasks.show', compact('task'));
    }

    public function complete($task)
    {
        Task::where('id', $task)->update(array('status' => 'completed'));

        return redirect('tasks/'.$task)->with('success','Completed');
    }

    public function edit($task)
    {
        $tasks = Task::find($task);
        return view('tasks.edit', compact('tasks'));
    }

    public function update($task)
    {

        $data = request()->validate([
            'title' => 'required|min:2',
        ]);

        $tasks = Task::find($task);
        $tasks->update($data);
        return redirect('tasks/'.$tasks->id);
    }

    public function destroy($task)
    {
        $tasks = Task::find($task);
        $tasks->delete();
        return redirect('home/'.Auth::user()->id);    }

}
