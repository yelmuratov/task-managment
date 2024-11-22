<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Area;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $totalTasks = Task::count();
        $tasksFor2days = Task::whereBetween('period', [now(), now()->addDays(2)])->count();
        $tasksPassedDeadline = Task::where('period', '<', now())->count();
        $tasksFor1day = Task::whereBetween('period', [now(), now()->addDays(1)])->count();
        $finished = Task::where('status', 'done')->count();

        // if (request()->has('start_date') && request()->has('end_date')) it should filter tasks by period range else it should return all tasks with pagination 10 per page
        if ($request->has('start_date') && $request->has('end_date')) {
            $tasks = Task::whereBetween('period', [$request->start_date, $request->end_date])->orderBy('period', 'desc')->paginate(10);
        } else {
            $tasks = Task::orderBy('period', 'desc')->paginate(10);
        }

        return view('task.task', compact('tasks', 'totalTasks', 'tasksFor2days', 'tasksPassedDeadline', 'tasksFor1day', 'finished'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $totalTasks = Task::count();
        $tasksFor2days = Task::whereBetween('period', [now(), now()->addDays(2)])->count();
        $tasksPassedDeadline = Task::where('period', '<', now())->count();
        $tasksFor1day = Task::whereBetween('period', [now(), now()->addDays(1)])->count();

        $areas = Area::all();
        $categories = Category::all();
        return view('task.task_create', compact('categories', 'areas', 'totalTasks', 'tasksFor2days', 'tasksPassedDeadline', 'tasksFor1day'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {

        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('tasks', 'public'); 
        }
        
        $task = Task::create([
            'category_id' => $request->category_id,
            'performer' => $request->performer,
            'title' => $request->title,
            'period' => $request->period,
            'file' => $filePath, 
        ]);
        
        $task->areas()->attach($request->area_id);
    
        return redirect('/tasks')->with('success', 'Task created successfully.');
    }
      
    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $areas = Area::all();
        $categories = Category::all();
        return view('task.task_edit', compact('task', 'categories','areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $data = $request->all();
    
        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('tasks', 'public');
        }
    
        $task->update($data);
    
        if ($request->has('area_id')) {
            $task->areas()->sync($request->input('area_id'));
        }
    
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if ($task->file && Storage::exists('public/' . $task->file)) {
            Storage::delete('public/' . $task->file);
        }
    
        $task->delete();
    
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }

    public function showByRegionAndCategory($regionId, $categoryId)
    {
        $tasks = Task::whereHas('taskAreas', function ($query) use ($regionId) {
            $query->where('area_id', $regionId);
        })->where('category_id', $categoryId)->get();

        $region = Area::find($regionId);
        $totalTasks = Task::count();
        $tasksFor2days = Task::whereBetween('period', [now(), now()->addDays(2)])->count();
        $tasksPassedDeadline = Task::where('period', '<', now())->count();
        $tasksFor1day = Task::whereBetween('period', [now(), now()->addDays(1)])->count();
        $finished = Task::where('status', 'done')->count();

        return view('task.task_show', compact('tasks', 'region', 'totalTasks', 'tasksFor2days', 'tasksPassedDeadline', 'tasksFor1day', 'finished'));
    }
}
