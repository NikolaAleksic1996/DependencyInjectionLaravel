<?php

namespace App\Http\Controllers;

use App\Services\MessageService;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    /**
     * @var MessageService
     */
    private $messageService;
    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    /**
     * @param MessageService $messageService
     * @return string[]
     */
    public function send(MessageService $messageService): array
    {
//        $messageService->send();
        $this->messageService->send();

        return [
            'statis' => 'OK'
        ];
    }
}
