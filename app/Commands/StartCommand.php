<?php

namespace App\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    protected $name = 'start';

    protected $description = 'Start command';

    public function handle()
    {
        $this->replyWithMessage([
            'text' => 'Привіт! Ласкаво прошу.',
        ]);

        $this->replyWithChatAction([
            'action' => Actions::TYPING,
        ]);

        $response = '';
        $commands = $this->getTelegram()->getCommands();

        foreach ($commands as $name => $command) {
            $response .= sprintf('/%s - %s' . PHP_EOL, $name, $command->getDescription());
        }

        $this->replyWithMessage([
            'text' => $response,
        ]);
    }
}
