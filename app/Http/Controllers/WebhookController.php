<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Telegram\Bot\BotsManager;

class WebhookController extends Controller
{
    private BotsManager $botsManager;

    public function __construct(
        BotsManager $botsManager
    )
    {
        $this->botsManager = $botsManager;
    }

    public function __invoke(Request $request): Response
    {
        $webhook = $this->botsManager->bot()
            ->commandsHandler(true);

        $message = $webhook->getMessage();

        return response(null, Response::HTTP_OK);
    }
}
