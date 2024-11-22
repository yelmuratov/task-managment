<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Area;
use App\Models\Category;
use App\Models\TaskArea;

class MonitorningController extends Controller
{
    public function monitoring()
    {   
        $totalTasks = Task::count();
        $tasksFor2days = Task::whereBetween('period', [now(), now()->addDays(2)])->count();
        $tasksPassedDeadline = Task::where('period', '<', now())->count();
        $tasksFor1day = Task::whereBetween('period', [now(), now()->addDays(1)])->count();
        $regions = Area::all();
        $categories = Category::all();
        $finished = Task::where('status', 'done')->count();

        // array for statistics
        // form of array: ['region_name' => 'number_of_finished_tasks'];
        $regionNames = [];
        foreach ($regions as $region) {
            $regionNames[$region->name] = TaskArea::where('area_id', $region->id)->where('status', 'done')->count();
        }
        
        return view('monitoring.monitoring', compact('totalTasks', 'tasksFor2days', 'tasksPassedDeadline', 'tasksFor1day', 'regions', 'categories', 'finished', 'regionNames'));
    }
}
