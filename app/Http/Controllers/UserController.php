<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use App\Models\Task;

class UserController extends Controller
{
    public function index(){
        $totalTasks = Task::count();
        $tasksFor2days = Task::whereBetween('period', [now(), now()->addDays(2)])->count();
        $tasksPassedDeadline = Task::where('period', '<', now())->count();
        $tasksFor1day = Task::whereBetween('period', [now(), now()->addDays(1)])->count();

        $users = User::paginate(10);
        return view('user.user', [
            'users' => $users,
            'totalTasks' => $totalTasks,
            'tasksFor2days' => $tasksFor2days,
            'tasksPassedDeadline' => $tasksPassedDeadline,
            'tasksFor1day' => $tasksFor1day
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'role' => 'required|string',
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
    
        return redirect()->back()->with('success', 'User created successfully!');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('user.user_edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|string',
        ]);
    
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
    
        return redirect()->route('user.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }

    public function logout() {
        FacadesAuth::logout();
    
        session()->invalidate();
        session()->regenerateToken();
    
        return redirect()->route('login.index')->with('success', 'Logged out successfully.');
    }
}
