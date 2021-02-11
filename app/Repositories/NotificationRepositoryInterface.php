<?php

namespace App\Repositories;

interface NotificationRepositoryInterface
{
    public function getAllNotifications();

    public function getUserReadNotifications();

    public function getUserUnreadNotifications();
    
    public function getUserNotificationMarkedAsRead();
}
