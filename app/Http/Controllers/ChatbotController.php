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

    // Hàm gửi và nhận phản hồi từ Gemini API
    public function sendChat(Request $request)
    {
        $text = $request->input('input');

        $client = new Client('');

        $response = $client->geminiPro()->generateContent(
            new TextPart($text)
        );

        // Trả về phản hồi từ Gemini
        return $response->text(); // Trả về văn bản từ bot
    }
}
