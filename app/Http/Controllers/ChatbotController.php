<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;
use App\Models\Category;

class ChatbotController extends Controller
{
    // Hàm index để hiển thị giao diện chatbot
    public function index()
    {
        $category = category::first();

        return view('chatbot', compact('category'));
    }

    public function sendChat(Request $request)
    {
        $text = $request->input('input');

        $client = new Client('AIzaSyCXOks5tpBn7jzY-2PbKF_GKTIvKeI2I6c');

        $response = $client->geminiPro()->generateContent(
            new TextPart($text)
        );

        // Trả về phản hồi từ Gemini
        return $response->text(); // Trả về văn bản từ bot
    }
}
