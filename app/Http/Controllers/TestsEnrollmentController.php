<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\TestEnrollment;

class TestsEnrollmentController extends Controller
{
    //
    
    public function sendNotification(){
        $user = User::first();

        $enrollmentData = [
            "body" => "This is body of notification",
            "enrollmentText" => "You are allowed to enroll in DataScience",
            "url" => url('/'),
            "thankyou" => "You have 7 days remaining"
        ];

        $user->notify(new TestEnrollment($enrollmentData));

    }
}
