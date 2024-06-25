<?php

namespace App\Console\Commands\Telegram;

use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    protected $name = 'start';
    protected $aliases = ['subscribe'];
    protected $description = 'Start Command to get you started';

    public function handle()
    {
        $chatId = $this->getUpdate()->getMessage()->getChat()->getId();
        $this->replyWithMessage(['chat_id' => $chatId, 'text' => 'Hello! Welcome to our bot.']);
    }
}
