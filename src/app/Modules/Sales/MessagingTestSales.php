<?php

namespace App\Modules\Sales;

use App\Modules\Shared\Handler\MessageProcessor;

class MessagingTestSales extends MessageProcessor
{
    public function handle(): void
    {
        $this->process($this->getMessage()->getContent());
    }

    public function process($data): void
    {
        dd($data);
    }
}
