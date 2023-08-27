<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    public function ShowFollowers(User $user){
         return view('profile.followers',[
            'user'=>$user,]);
    }
    public function ShowFollowings(User $user){
         return view('profile.followings',[
            'user'=>$user,]);
    }
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
       
         auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
       
        if ($request->avatar) {
            $imageName = time() .".". $request->avatar->extension();
        
            $request->avatar->move(public_path('images'), $imageName);
             $user->images()->where('type', 'avatar')->firstOrCreate([
                'src' => $imageName,
                'type' => 'avatar'
            ]);
        }
        if ($request->header) {
            $header = time() .".". $request->header->extension();
        
            $request->header->move(public_path('images'), $header);
             $user->images()->where('type', 'header')->firstOrCreate([
                'src' => $header,
                'type' => 'header'
            ]);
        }
        $user->update($data);

        return redirect(route('users.post',auth()->user()))->with('success','profile updated successfully');
    }
    
}


