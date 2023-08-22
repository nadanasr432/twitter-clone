<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function store(User $user){
        // dd($user);
        Auth::user()->followings()->toggle($user->id);
    //    auth()->user()->followings()->attach($user->id);
    //    auth()->user()->followings()->detach($user->id);
    //    auth()->user()->followings()->sync([1, 2 ,3 ]);
        return redirect()->back();

    }

    }




