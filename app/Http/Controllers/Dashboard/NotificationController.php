<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function getNotifications()
    {
        $notifications = Notification::where('is_read', false)->get();

        return response()->json($notifications);
    }

    public function markAsRead($id)
    {
        $notification = Notification::find($id);
        if ($notification) {
            $notification->is_read = true;
            $notification->save();
        }

        return response()->json(['success' => true]);
    }
}