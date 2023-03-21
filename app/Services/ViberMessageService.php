<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class ViberMessageService implements MessageService
{

    public function send()
    {
        Log::debug('Sending message from viber service');
    }
}
