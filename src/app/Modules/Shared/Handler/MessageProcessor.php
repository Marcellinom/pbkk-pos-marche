<?php

namespace App\Modules\Shared\Handler;

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
     * @param Message $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }
}
