<?php
namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $totalTasks = Task::count();
        $tasksFor2days = Task::whereBetween('period', [now(), now()->addDays(2)])->count();
        $tasksPassedDeadline = Task::where('period', '<', now())->count();
        $tasksFor1day = Task::whereBetween('period', [now(), now()->addDays(1)])->count();

        $users = User::all();
        $areas = Area::paginate(10);
        return view('area.areas', compact('areas', 'users', 'totalTasks', 'tasksFor2days', 'tasksPassedDeadline', 'tasksFor1day'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'name' => 'required|string|max:255',
        ]);

        Area::create($request->all());

        return redirect()->back()->with('success', 'Area created successfully!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:areas,id',
            'user_id' => 'required|integer',
            'name' => 'required|string|max:255',
        ]);

        $area = Area::findOrFail($request->id);
        $area->update($request->all());

        return redirect()->back()->with('success', 'Area updated successfully!');
    }

    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();

        return redirect()->back()->with('success', 'Area deleted successfully!');
    }
}
