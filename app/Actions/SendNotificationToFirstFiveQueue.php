<?php

namespace App\Actions;

use App\Models\Appointment;
use App\Notifications\NotifyFirstFiveQueued;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;

class SendNotificationToFirstFiveQueue
{
    public function execute($department)
    {
        $appointments = Appointment::where('scheduled_date', Carbon::now()->toDateString())
            ->take(5)->get();

        $message = [
            'body' => '     Greetings, this is the LNU Online Appointment
                        notifying you that your queue will be called in soon,
                        so please be ready and be present in the ' . $department,

            'thankyou' => 'Thank you for using LNU Queuing System',
        ];
        Notification::send($appointments, new NotifyFirstFiveQueued($message));
    }
}
