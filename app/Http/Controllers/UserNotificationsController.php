<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
     /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Fetch all unread notifications for the user.
     *
     * @return mixed
     */
    public function index()
    {
        $unreadNotifications= auth()->user()->unreadNotifications;
        return response()->json([$unreadNotifications,200]);
    }

    /**
     * Mark a specific notification as read.
     *
     * @param \App\User $user
     * @param int       $notificationId
     */
    public function destroy($user, $notificationId)
    {
         $markAsRead=auth()->user()->notifications()->findOrFail($notificationId)->markAsRead();
         return response()->json([$markAsRead,204]);
    }
}
