<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('home');
    }
  
    public function storeToken(Request $request)
    {
    try{
        $request->user()->update(['fcm_token'=>$request->token]);
        return response()->json([
            'success'=>true
        ]);
    }catch(\Exception $e){
        report($e);
        return response()->json([
            'success'=>false
        ],500);
    }
}
}