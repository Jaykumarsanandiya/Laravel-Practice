<?php

namespace App;

use Illuminate\Support\Facades\Mail;


class PostCardSendingService{
    // facades learning
    public $country;
    public $width;
    public $height;

    public function __construct($country, $width,$height)
    {
        $this->country = $country;
        $this->width = $width;
        $this->height = $height;
    }

    public function hello($message,$email){
        Mail::raw($message,function($message) use ($email){
            $message->to($email);
        });

        dump("Email send with message ".$message);
    }

}