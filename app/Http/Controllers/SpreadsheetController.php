<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SpreadsheetController extends Controller
{
   
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function index()
    {
        return view('app');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required |email|max:255',
            'password' => 'required|confirmed'
        ]);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        return back();
    }
    
}
