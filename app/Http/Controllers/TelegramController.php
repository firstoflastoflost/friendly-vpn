<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;

class TelegramController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected Api $telegram;

    public function __construct()
    {
        $this->telegram = new Api();
    }

    public function handleWebhook(Request $request): JsonResponse
    {
        Log::info("request", ['message' => $this->telegram->getWebhookUpdate()->getMessage()->text]);

        $this->telegram->commandsHandler(true);

        return response()->json(['status' => 'ok']);
    }
}
