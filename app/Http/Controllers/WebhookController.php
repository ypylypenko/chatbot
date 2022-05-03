<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Telegram\Bot\Actions;
use Telegram\Bot\BotsManager;

class WebhookController extends Controller
{
    private BotsManager $botsManager;
    private Client $httpClient;

    public function __construct(
        BotsManager $botsManager,
        Client $httpClient
    ) {
        $this->botsManager = $botsManager;
        $this->httpClient = $httpClient;
    }

    public function __invoke(Request $request): Response
    {
        $webhook = $this->botsManager->bot()
            ->commandsHandler(true);

        $message = $webhook->getMessage();

        $bot = $this->botsManager->bot();

        if ($message->isType('location')) {
            $location = $message->location;
            $chat = $message->chat;

            $bot->sendChatAction([
                'chat_id' => $chat->id,
                'action' => Actions::TYPING,
            ]);

            $weatherInfo = $this->weatherInformation($location->latitude, $location->longitude);

            $bot->sendMessage([
                'chat_id' => $chat->id,
                'text' => $weatherInfo,
            ]);
        }
        return response(null, Response::HTTP_OK);
    }

    private function weatherInformation($latitude, $longitude): string
    {
        $apiToken = env('WEATHER_TOKEN');

        $requestUrl = "https://api.openweathermap.org/data/2.5/weather?lat={$latitude}&lon={$longitude}&units=metric&lang=ua&appid={$apiToken}";

        $response = $this->httpClient->get($requestUrl);

        $data = json_decode($response->getBody(), false, 512, JSON_THROW_ON_ERROR);

        $city = $data->name . "\n\n";
        $temp = $data->main->temp . "℃\n";
        $pressure = $data->main->pressure . "℃\n";
        $humidity = $data->main->humidity . "℃\n";

        $weatherInfo = 'Місто : ' . $city;
        $weatherInfo .= 'Температура повітря : ' . $temp;
        $weatherInfo .= 'Атмосферній тиск : ' . $pressure;
        $weatherInfo .= 'Вологість повітря : ' . $humidity;

        return $weatherInfo;
    }
}
