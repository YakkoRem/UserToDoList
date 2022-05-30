<?php

namespace App\Http\Controllers;

//use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use App\Models\Task;

class TaskController extends Controller
{

  protected $tasks;

  public function __construct(TaskRepository $tasks)
  {
      $this->middleware('auth');

      $this -> tasks = $tasks;
  }

  public function index(Request $request)
  {
    $tasks = auth()->user()->tasks();
        return view('dashboard', compact('tasks'));
  }

  public function store(Request $request)
  {
      $this->validate($request, [
          'name' => 'required|min:3',
      ]);

      $request->user()->tasks()->create([
        'name' => $request->name,
    ]);

    return redirect('/dashboard');
  }

  public function destroy(Request $request, Task $task)
  {
    //$this->authorize('destroy', $task);

    $task->delete();

    return redirect('/dashboard');
  }

}
