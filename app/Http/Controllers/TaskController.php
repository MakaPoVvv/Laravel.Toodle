<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\increment;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $tasks = Task::where('user_id', $request->id)->orderBy('status_id', 'asc')->paginate(10);
        if (Auth::id() != $request->id) {
            abort(404);
        }
        return view('home', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store()
    {
        auth()->user()->tasks()->create(request()->validate([
            'title' => 'required|min:2|max:100',

            'priority_id' => ''
        ]));

        return redirect('home/' . app()->getLocale(). '/'. Auth::user()->id);
    }

    public function show(Request $request)
    {
        $task = Task::findOrFail($request->id);
        if(Auth::user()->id != $task->user_id){
            abort(404);
        }
        return view('tasks.show', compact('task'));
    }

    public function complete(Request $request)
    {
        Task::where('id', $request->id)->increment('status_id');
        Auth::user()->increment('completed');

        return redirect('tasks/' .\app()->getLocale().'/'.$request->id)->with('success', __('message.success'));
    }

    public function edit(Request $request)
    {
        $tasks = Task::find($request->id);
        return view('tasks.edit', compact('tasks'));
    }

    public function update(Request $request)
    {
        $tasks = Task::find($request->id);
        $tasks->update(request()->validate([
            'title' => 'required|min:2',
            'priority_id' => ''
        ]));

        return redirect('tasks/' .app()->getLocale().'/'. $tasks->id);
    }

    public function destroy(Request $request)
    {
        $tasks = Task::find($request->id);
        $tasks->delete();
        return redirect('home/' .app()->getLocale().'/'. Auth::user()->id);
    }

    public function destroyCompleted()
    {
        $tasks = Task::where('status_id', '3');

        $tasks->delete();

        return redirect('home/' . app()->getLocale(). '/'. Auth::user()->id);
    }

}
