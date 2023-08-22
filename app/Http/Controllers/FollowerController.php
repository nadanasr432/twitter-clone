<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class FollowerController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function store(User $user,Request $request){
        $user->followers()->create([
            'follower_id'=>$request->user_id,
            'following_id'=>$request->user_id
        ]);
        return back();

    }
    public function destroy(User $user, Request $request){
        $request->user()->where('follower_id', $user->user_id)->delete();
    
        return back();
    }
    }




