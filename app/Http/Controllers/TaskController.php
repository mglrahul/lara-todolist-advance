<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;


class TaskController extends Controller
{
    protected $tasks;
    public function __construct(TaskRepository $tasks) {
        $this->middleware('auth');
        
        $this->tasks = $tasks;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$tasks = $request->user()->tasks()->get();
        
//        return view('tasks.index',[
//            'tasks' => $tasks,
//        ]);
        
        return view('tasks.index',[
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    public function paging(Request $request) {
        //$tasks = $request->user()->tasks()->paginate(2);
        $tasks = $this->tasks->forUser($request->user());
//        $tasks = $user->tasks()
//                    ->orderBy('created_at', 'asc')
//                    ->paginate(2);
        //echo '<pre>'; print_r($tasks); die;
        //$tasks = Task::paginate(2);
        return view('tasks.paging')
            ->with('tasks', $tasks);
        //return View::make('paging', compact('tasks'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);
        
        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,  $id)
    {
        
      
        //return view('tasks.update');
        //echo 'test';die;
        //echo '<pre>'; print_r($request->user()->tasks()->where('id', $id)->get());
       // echo '<pre>';print_r($this->tasks->taskDetails(Task $task, $id));
        return view('tasks.update',[
            'taskData' => $request->user()->tasks()->where('id', $id)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //echo 'hello'; 
        $this->authorize('update', $task);
        
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        
        $request->user()->tasks()->update([
            'name' => $request->name,
        ]);
        
        $landing = 'edit/'.$task->id;
        return redirect($landing);
        
        //echo '<pre>'; print_r($request);
        die;
        //return redirect('update/'.$id)->withMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);
        
        $task->delete();
        
        return redirect('/tasks');
                
    }
}
