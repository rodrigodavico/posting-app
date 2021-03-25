<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // set to auth only.
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index() {
        // bring user tasks data.
        $tasks = Task::orderBy('expiration', 'asc')->where('user_id', auth()->user()->id)->with(['user'])->paginate(10);
        //$tasks = auth()->user()->tasks()->orderBy('expiration', 'asc')->with(['user'])->paginate(10);
        
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function store(Request $request) {
        // validate submited data
        $this->validate($request, [
            'description' => 'required|max:255',
            'expiration' => 'required|date'
        ]);
        
        // store in db, load Task class from elocuent relation.
        auth()->user()->tasks()->create([
            'description' => $request->description,
            'expiration' => $request->expiration
        ]);

        // volver a la página inicial.
        return back();
    }

    public function show(Task $task) {
        if($task->user_id === auth()->user()->id) {
            return view('tasks.show', ['task' => $task]);
        }
        // if task not belonging to user, return error.
        return response('Not Allowed', '409');
    }

    public function destroy(Task $task) {
        $this->authorize('delete', $task);

        $task->delete();
        
        return back();
    }
}
