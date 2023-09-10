<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Models\User;
use App\Services\FCMService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function sendNotificationrToUser($id)
    {
       // get a user to get the fcm_token that already sent.               from mobile apps 
       $user = User::findOrFail($id);

      FCMService::send(
          $user->fcm_token,
          [
              'title' => 'your title',
              'body' => 'your body',
          ]
      );

    }
}
