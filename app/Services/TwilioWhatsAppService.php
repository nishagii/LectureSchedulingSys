<?php

namespace App\Services;

use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;


class TwilioWhatsAppService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    }

    /**
     * Send a WhatsApp message.
     *
     * @param string $to
     * @param string $message
     * @return bool
     */
    public function sendWhatsappNotification($tophoneNumber, $message)
    {
        try {
            $this->client->messages->create(
                $tophoneNumber,
                [
                    'from' => env('TWILIO_WHATSAPP_NUMBER'),
                    'body' => $message,
                ]
            );
            return true;
        } catch (\Exception $e) {
            Log::error('WhatsApp Message Error: ' . $e->getMessage());
            return false;
        }
    }
}
