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
   public function acceptFollowRequest(Request $request, User $user)
    {

        auth()->user()->requests()->where('follower_id',$user->id)->updateExistingPivot($user->id,['status'=>'approved']);
       
         return redirect()->back();
    }
    public function ShowFollowers(User $user){
        $users=$user->followers()->get();
        return view('profile.followers',['users'=>$users]);

    }
    public function ShowFollowings(User $user){
       $users= $user->followings()->get();
        return view('profile.followings',['users'=>$users]);

    }
    public function ShowFollowRequests(User $user)
{
    $users = $user->followers()->wherePivot('status', 'pending')->get();

    return view('profile.requests', ['users' => $users]);
}

    }




