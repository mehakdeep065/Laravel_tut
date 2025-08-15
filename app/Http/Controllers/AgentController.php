<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AgentController extends Controller
{
    public function ask_form()
    {
        // Initially no response, just show form
        return view('askai', ['response' => null, 'error' => null]);
    }

    public function ask(Request $request)
    {
        $apiKey = env('GEMINI_API_KEY');

        if (!$apiKey) {
            return view('askai', [
                'response' => null,
                'error' => 'API key not set in .env file'
            ]);
        }

        try {
            $textResponse = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post(
                "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}",
                [
                    "contents" => [
                        [
                            "parts" => [
                                ["text" => "Write a short and catchy description for a post titled: {$request->post_name}"]
                            ]
                        ]
                    ]
                ]
            );

            if ($textResponse->failed()) {
                return view('askai', [
                    'response' => null,
                    'error' => 'API request failed: ' . $textResponse->body()
                ]);
            }

            $data = $textResponse->json();

            $response = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'No response text found';

            return view('askai', [
                'response' => $response,
                'error' => null
            ]);

        } catch (\Exception $e) {
            return view('askai', [
                'response' => null,
                'error' => 'Error: ' . $e->getMessage()
            ]);
        }
    }
}
