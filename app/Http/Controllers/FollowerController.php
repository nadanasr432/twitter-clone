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
   $currentUser = auth()->user(); 

        if ($user->followers->contains($currentUser->id)) {
           
            $user->followers()->attach($currentUser);
            $currentUser->followings()->detach($user);
            $user->followers()->updateExistingPivot($currentUser->id, ['status' => 'approved']);


            return redirect()->back()->with('success', 'Follow request accepted successfully!');
        }

        return redirect()->back()->with('error', 'No pending follow request from this user');
        
    // auth()->user()->followings()->attach($user);
    // return redirect()->back();
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




