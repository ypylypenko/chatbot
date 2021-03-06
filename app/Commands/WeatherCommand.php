<?php

namespace App\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;

class WeatherCommand extends Command
{
    protected $name = 'weather';

    protected $description = 'Інформація про погоду';

    public function handle()
    {
        $keyboard = new Keyboard();

        $button = Keyboard::button([
            'text' => 'Надіслати розташування',
            'request_location' => true,
        ]);

        $keyboard->setResizeKeyboard(true);
        $keyboard->setOneTimeKeyboard(true);

        $keyboard->row($button);

        $this->replyWithMessage([
            'text' => 'Для отримання інформації про погоду натисніть кнопку',
            'reply_markup' => $keyboard,
        ]);
    }
}
