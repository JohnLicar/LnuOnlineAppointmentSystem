<?php

namespace App\Actions;

use Illuminate\Http\Request;

class SendSmsNotification
{
    public function execute(Request $request, $queuingNumber)
    {
        $message = "Your Queuing Number is $queuingNumber and will be Valid only  on  $request->appointmentDate ";

        $ch = curl_init();

        $itexmo = array('1' => $request->contact_number, '2'
        => $message, '3'
        => env('API_CODE'), 'passwd'
        => env('API_PASSWORD'));

        curl_setopt($ch, CURLOPT_URL, "https://www.itexmo.com/php_api/api.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            http_build_query($itexmo)
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        return curl_exec($ch);
        curl_close($ch);
    }
}
