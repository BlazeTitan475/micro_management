<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use App\Models\NotificationSetting;

class AdminController extends Controller
{
    //
    public function showAdminDashboard(){
        $activityLogs = ActivityLog::get();
        return view('admin/dashboard',compact('activityLogs'));
    }

    public function showNotificationSettings()
    {
        logger('notification setting function entered');
        $events = ['task_completed', 'new_message', 'new_task_assigned'];  // Example events
        $notificationSettings = NotificationSetting::all()->pluck('receive_email', 'event');

        return view('admin.notification_settings', compact('events', 'notificationSettings'));
    }

    public function saveNotificationSettings(Request $request)
    {
        foreach ($request->notifications as $event => $receive_email) {
            NotificationSetting::updateOrCreate(
                ['event' => $event],
                ['receive_email' => $receive_email]
            );
        }

        return redirect()->back()->with('success', 'Notification settings updated.');
    }
}