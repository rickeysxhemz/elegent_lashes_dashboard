<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function manager()
    {
        $user = Auth::user();
        $notifications = $user->notifications()->unread()->orderBy('created_at','desc')->paginate(10);
        $notifications_count = $user->unreadNotifications->count();
        if(auth()->user()->hasRole('manager'))
        {
            return view('dashboard.manager.notifications', compact('notifications','notifications_count'));
        }
        else if(auth()->user()->hasRole('technician'))
        {
            return view('dashboard.technician.notifications', compact('notifications','notifications_count'));
        }            
    }
    public function markAllAsRead()
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();

        return redirect()->back()->with('message', 'All notifications marked as read.');
    }

}
