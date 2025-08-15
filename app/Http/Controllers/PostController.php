<?php

namespace App\Http\Controllers;

use App\Models\postsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function viewpost()
    {
        $posts = postsModel::all();
        return view('posts.viewPost', compact('posts'));
    }

    public function postform()
    {
        return view('posts.postUpload');
    }

    public function addpost(Request $request)
    {
        $request->validate([
            "post_name" => "required|string|max:220",
        ]);

        $apiKey = env('GEMINI_API_KEY');

        /**
         * 1️⃣ Generate description with Gemini
         */
        $textResponse = Http::post(
            "https://generativelanguage.googleapis.com/v1/models/gemini-1.5-flash:generateContent?key={$apiKey}",
            [
                "contents" => [
                    [
                        "parts" => [
                            ["text" => "Write a short and catchy description for a post titled: {$request->post_name}"]
                        ]
                    ]
                ]
            ]
        )->json();
        // dd($textResponse);


        $description = implode("\n", array_column($textResponse['candidates'][0]['content']['parts'], 'text'));


        if (!$description) {
            return back()->with('error', 'Failed to generate description from Gemini. Try again later.');
        }


           // 2️⃣ Generate image (Hugging Face)
        $imageName = null;
        try {
            $model = "stabilityai/stable-diffusion-2";
            $url = "https://api-inference.huggingface.co/models/{$model}";

            $imageData = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('HF_API_KEY'),
            ])->withBody(json_encode([
                'inputs' => $request->post_name
            ]), 'application/json')->send('POST', $url)->body();

            if ($imageData) {
                $imageName = uniqid() . ".png";
                Storage::put("public/posts/{$imageName}", $imageData);
            }
        } catch (\Exception $e) {
            \Log::error('Hugging Face image generation failed: ' . $e->getMessage());
        }
        /**
         * 3️⃣ Save post
         */
        postsModel::create([
            'post_name' => $request->post_name,
            'post_description' => $description,
            // 'post_path' => $imageName ? "posts/{$imageName}" : null
        ]);

        return redirect()->route('posts.viewPost')->with('success', 'Post created successfully!');
    }
}
