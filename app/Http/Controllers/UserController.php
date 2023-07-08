<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function index()
    // {
    //     $users = User::all();
    //     return view('admin.admin.users.index', compact('users'));
    // }

    // public function create()
    // {
    //     return view('admin.admin.users.create');
    // }

    // public function store(Request $request)
    // {
    //     // Validate input

    //     // Create a new user
    //     $user = new User();
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');
    //     $phone = $request->input('phone');
    //     // Set other user properties

    //     $user->save();

    //     return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    // }

    // public function edit($id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('admin.admin.users.edit', compact('user'));
    // }

    // public function update(Request $request, $id)
    // {
    //     // Validate input

    //     $user = User::findOrFail($id);
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');
    //     $phone = $request->input('phone');
    //     // Update other user properties

    //     $user->save();

    //     return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    // }

    // public function destroy($id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->delete();

    //     return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    // }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'required|string',
            'role' => 'required|in:admin,teacher,user',
        ]);

        $user = User::create($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'phone' => 'required|string',
            'role' => 'required|in:admin,teacher,user',
        ]);

        $user->update($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
