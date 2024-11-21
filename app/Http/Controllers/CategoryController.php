<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Task;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalTasks = Task::count();
        $tasksFor2days = Task::whereBetween('period', [now(), now()->addDays(2)])->count();
        $tasksPassedDeadline = Task::where('period', '<', now())->count();
        $tasksFor1day = Task::whereBetween('period', [now(), now()->addDays(1)])->count();
        $finished = Task::where('status', 'done')->count();

        $categories = Category::paginate(10);
        return view('category.categories', [
            'categories' => $categories,
            'totalTasks' => $totalTasks,
            'tasksFor2days' => $tasksFor2days,
            'tasksPassedDeadline' => $tasksPassedDeadline,
            'tasksFor1day' => $tasksFor1day,
            'finished' => $finished
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create(['name' => $request->name]);    
        return redirect()->back()->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category = Category::findOrFail($request->id);
        $category->update(['name' => $request->name]);

        return redirect()->back()->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // $category = Category::findOrFail($id);

        try {
            $category->delete();
            return redirect()->back()->with('success', 'Category deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete the category. Please try again.');
        }
    }
}
