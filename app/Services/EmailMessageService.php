<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class EmailMessageService implements MessageService
{

    public function send()
    {
        Log::debug('Sending message from email service');
    }
}
