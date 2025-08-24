<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //list user
    public function index()
    {
        $users = User::where('role', 'kasir')->get();

        return view('admin.users.index', compact('users'));
    }

    //Form tambah user
    public function create()
    {
        return view('admin.users.create');
    }

    //Simpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'role'=> 'kasir',
        ]);

        return redirect()->route('admin.users.index')->with('status', 'User kasir berhasil ditambahkan.');
    }
}
