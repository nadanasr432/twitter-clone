<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserNotificationsController extends Controller
{

        public function index()
        {
            $notifications = auth()->user()->unreadNotifications;
        
            return view('notification.notifications', compact('notifications'));
        }
        
        
}
