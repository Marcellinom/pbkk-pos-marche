<?php

namespace App\Modules\Shared\Handler;

use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Self_;

class MessageBus
{
    private static array $all_listeners = [];
    private static string $current_module = "default";

    public static function setChannel(string $channel): void
    {
        self::$current_module = $channel;
    }

    public static function registerListener(string $source_module, string $label, string $process): void
    {
        self::$all_listeners[self::$current_module][$label][$source_module][] = $process;
    }

    public static function broadcast(string $source_module, string $label, array $data): void
    {
        MessageBusHandler::insertToQueue(new Message(
            $source_module,
            $label,
            $data
        ));
    }

    public static function process(Message $message): void
    {
        foreach (self::$all_listeners as $listeners_on_each_module => $label) {
            if (!array_key_exists($message->getLabel(), $label)) continue;

            foreach ($label as $source_module => $processors) {
                if ($message->getSourceModule() != $source_module) continue;
                foreach ($processors as $processor) {
                    $processor::dispatch($message);
                }
            }
        }
    }

//    public static function isMessageAlreadyProcessed(Message $message): bool
//    {
//
//    }
//
//    public static function trackMessageProcessed(Message $message): void
//    {
//
//    }
//
//    public static function clearTrackingMessagProcessor(Message $message): void
//    {
//        DB::connection("system")->table('message_tracker')
//            ->where('id', $message->getId())->delete();
//    }
}
