<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
     public function edit(User $user)
    {
        
        return view('profile.edit',['user' => $user]);
    }
    public function update(User $user,Request $request){
        $data=$request->validate([
        'name'=>'required',
        'username'=>'required',
        'email' => 'required |email|max:255',
        'password' => 'required|confirmed'
        ]);
        $user->update($data);
        return redirect(route('users.post',auth()->user()))->with('success','profile updated successfully');
    }
}


