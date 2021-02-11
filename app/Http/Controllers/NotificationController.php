<?php

namespace App\Http\Controllers;

use App\Notifications\DataTransferedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function sendNotification(){
        Auth::user()->notify(new DataTransferedNotification());

        return redirect('/home');
//        return Auth::user()->notifications->find('446b6074-55e5-4d22-a61e-b718b11d0e6f')->markAsRead();
    }
}
