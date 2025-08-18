<?php

namespace App\Http\Controllers;

use App\Models\postsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Photo;

class PostController extends Controller
{
    public function viewpost()
    {
        $posts = postsModel::paginate(6);
        return view('posts.viewPost', compact('posts'));
    }

    public function postform()
    {
        return view('posts.postUpload');
    }
    public function editpost($id)
    {
        $post = postsModel::find($id);
        if (!$post) {
            return view('posts.postUpload');
        } else {
            return view('posts.EditPost',compact('post'));
        }
    }
    public function deletepost($id)
    {
        $post = postsModel::find($id);
        if (!$post) {
            return "post already deleted";
        } else {
            $post->delete();
            return redirect()->route('posts.viewPost')->with('success', 'Post deleted!');
        }
    }
    public function update(Request $request, $id){
         $request->validate([
            "post_name" => "required|string|max:220",
            "post_path" => "required|image|mimes:jpg,jpeg,png,gif|max:2048",
            "cate_name" => "required|string"
        ]);
         $post = postsModel::find($id);
        if (!$post) {
            abort(404,'record not found');
        } 
        $post->update([
            'post_name' => $request->post_name,
            'post_path' => $request->post_path,
            'cate_name' => strtolower($request->cate_name),
        ]);
        session()->flash('alert-success','Post update successfully');
        return to_route('posts.viewPost');
    } 

    public function addpost(Request $request)
    {
        $request->validate([
            "post_name" => "required|string|max:220",
            "post_path" => "required|image|mimes:jpg,jpeg,png,gif|max:2048",
            "cate_name" => "required|string"
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


        //    // 2️⃣ Generate image (Hugging Face)
        // $imageName = null;
        // try {
        //     $model = "stabilityai/stable-diffusion-2";
        //     $url = "https://api-inference.huggingface.co/models/{$model}";

        //     $imageData = Http::withHeaders([
        //         'Authorization' => 'Bearer ' . env('HF_API_KEY'),
        //     ])->withBody(json_encode([
        //         'inputs' => $request->post_name
        //     ]), 'application/json')->send('POST', $url)->body();

        //     if ($imageData) {
        //         $imageName = uniqid() . ".png";
        //         Storage::put("public/posts/{$imageName}", $imageData);
        //     }
        // } catch (\Exception $e) {
        //     \Log::error('Hugging Face image generation failed: ' . $e->getMessage());
        // }
        //upload img 
    $safeimgname = preg_replace('/[^A-Za-z0-9_\- ]/', "_", strtolower($request->post_name));
    $extension = $request->file('post_path')->getClientOriginalExtension();
    $imgname = $safeimgname . "." . $extension;

// Store the uploaded file
$request->file('post_path')->storeAs('public/posts/', $imgname);



        /**
         * 3️⃣ Save post
         */
        postsModel::create([
            'post_name' => $request->post_name,
            'post_description' => $description,
            'post_path' =>'posts/'.$imgname,
            'cate_name' => strtolower($request->cate_name),
        ]);

        return redirect()->route('posts.viewPost')->with('success', 'Post created successfully!');
    }
}
