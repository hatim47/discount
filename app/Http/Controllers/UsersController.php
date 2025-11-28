<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function addUser()
    {
        return view('admin.users/addUser');
    }
    
    public function usersGrid()
    {
        return view('admin.users/usersGrid');
    }

    public function usersList()
    {
        return view('admin.users/usersList');
    }
    
    public function viewProfile()
    {
        return view('admin.users/viewProfile');
    }

  public function index()
    {
       $stores = User::all();
        return view('adminn.user.usersList', compact('stores'));
    }

  public function create()
    {
        return view('adminn.user.addUser');
    }

    // Handle form submission
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|confirmed', // requires password_confirmation field
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.create')->with('success', 'User added successfully!');
    }

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->back()->with('success', 'User deleted successfully.');
}



}
