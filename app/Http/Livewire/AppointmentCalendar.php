<?php

namespace App\Http\Livewire;

use App\Models\Service;
use DateTime;
use Livewire\Component;

class AppointmentCalendar extends Component
{

    public function render()
    {
        $events = [
            [
                'event_date' => '2021, 8, 1',
                'event_slot' => 1,
                'event_title' => "April Fool's Day",
                'event_theme' => 'blue'
            ],

            [
                'event_date' => '2021, 8, 10',
                'event_slot' => 1,
                'event_title' => "Birthday",
                'event_theme' => 'red'
            ],

            [
                'event_date' => '2021, 8, 16',
                'event_slot' => 1,
                'event_title' => "Upcoming Event",
                'event_theme' => 'green'
            ]
        ];

        $services = Service::select('description');

        return view('livewire.appointment-calendar', compact(['events', 'services']));
    }
}
