<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserNotificationsController extends Controller
{

        public function index()
        {
            $notifications = auth()->user()->notifications;
            auth()->user()->unreadNotifications()->update(['read_at' => now()]);

        
            return view('notification.notifications', compact('notifications'));
        }
        
        
}
