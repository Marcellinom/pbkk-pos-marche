<?php

namespace App\Modules\Shared\Handler\Messaging;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;

abstract class MessageProcessor
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;

    private Message $message;

    /**
     * @return Message
     */
    public function getMessage(): Message
    {
        return $this->message;
    }
    /**
     * @param Message $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }
}
