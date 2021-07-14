<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\SampleNotification;
use Illuminate\Support\Facades\Notification;

class SampleController extends Controller
{
    //
    public function sendNotification(Request $request) {
        $user = User::first();
        $testData = [
            'name' => 'Test Data',
            'body' => 'This is a test message',
            'thanks' => 'Thank you',
            'offerText' => 'Check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => 007
        ];

        Notification::send($user, new SampleNotification($testData));
       
        dd('Task completed!');
    }
}
