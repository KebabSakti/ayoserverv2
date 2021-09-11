<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chat($message)
    {
        broadcast(new MessageEvent(["message" => $message]))->toOthers();

        return $message;
    }
}
