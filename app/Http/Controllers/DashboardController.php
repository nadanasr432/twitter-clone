<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    
    public function index(){
    
        return view('dashboard');
    }
    public function __construct(){

        $this->middleware(['auth']);
    }
}

