<?php

namespace App\Http\Controllers;

use App\Events\RealTimeMessageEvent;
use App\Repositories\NotificationRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notifications = Auth::user()->notifications;
        $data = $this->userRepository->getAll();
        return view('home')->with('users', $data)->with('notifications', $notifications);
    }

    public function markRead($id){
        Auth::user()->notifications->find($id)->markAsRead();
        return redirect('/home');
    }


    // Event based real time notification 
    public function sendEventRealtimeNotification(){
        event(new RealTimeMessageEvent("events"));
    }
}
