<?php

namespace App\Repositories\Eloquent;
use App\Models\Notifications\UserNotification;
use App\Repositories\NotificationRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class NotificationRepository implements NotificationRepositoryInterface
{
    private $model;

    public function __construct(UserNotification $model){
        $this->model = $model;
    }

    public function getAllNotifications(){
        return $this->model->all();
    }

    public function getUserReadNotifications(){
        return ;
    }

    public function getUserUnreadNotifications(){
        return ;
    }
    public function getUserNotificationMarkedAsRead(){
        return ;
    }
}
