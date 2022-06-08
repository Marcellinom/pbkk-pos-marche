<?php

namespace App\Modules\Shared\Handler\Messaging;

use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class MessageBusHandler implements ShouldQueue
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

    public static function insertToQueue(Message $message): void
    {
        Log::channel("messages")->info("message broadcast",
            [
                "identity" => $message->getId(),
                "source_module" => $message->getSourceModule(),
                "label" => $message->getLabel(),
                "content" => $message->getContent(),
                "broadcasted_at" => (new DateTime())->format("Y-m-d H:i:s")
            ]
        );
        self::dispatch($message);
    }

    public function handle(): void
    {
        MessageBus::process($this->message);
    }
}
