<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\Models\User;
class FirebaseNotificationController extends Controller
{
    public function updateDeviceToken(Request $request)
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
    public function sendNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
    
        // Get valid FCM tokens
        $FcmToken = User::whereNotNull('fcm_token')->pluck('fcm_token')->all();
    
        if (empty($FcmToken)) {
            return response()->json(['message' => 'No valid FCM tokens available.'], 400);
        }
    
        $serverKey = 'AAAA3D1tYFQ:APA91bGY3l2456Im_Mn5pgLsH5WauvAX7Pg4pzVrJgLYP-L_j2G1rBe-C1xESw8defh01yMZiJBiyJpAvU8cbLhMLoS5BqagBH-IpRhth3IstDnhEmVmK21uqUKjVQGbDvRb50GSgT5J';
    
        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];
        $encodedData = json_encode($data);
    
        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarily
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            return response()->json(['message' => 'Curl failed: ' . curl_error($ch)], 500);
        }
        // Close connection
        curl_close($ch);
    
        // FCM response
        return response()->json(['message' => 'Notification sent successfully.']);
    }
}    