<?php

namespace App\Console\Commands\Telegram;

use Illuminate\Support\Facades\Log;
use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    protected $name = 'start';
    protected $aliases = ['subscribe'];
    protected $description = 'Start Command to get you started';

    public function handle()
    {
        $chatId = $this->getUpdate()->getMessage()->getChat()->getId();

        Log::info("request", ['$chatId' => $chatId]);

        $this->replyWithMessage(['chat_id' => $chatId, 'text' => 'Hello! Welcome to our bot.']);
    }
}
