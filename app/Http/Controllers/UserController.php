<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.cadastro');
    }

    /**
     * Login
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $credentials = $request->only('email', 'password');
        $autenticated = Auth::attempt($credentials);

        if(!$autenticated){
            return redirect()->route('login')->withErrors(['error' => 'Email or Password invalid']);
        }

        return redirect()->route('products.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
        ]);
        
        $user = $request->all();
        $user['password'] = Hash::make($request->password); //criptografar
        User::create($user);
         
        return redirect()->route('login')->with('success', 'User created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
