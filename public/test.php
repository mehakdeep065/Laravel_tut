<?php
// Your Hugging Face API Token (must have 'read' access at least)
$apiKey = "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"; // replace with your actual token

// Model inference endpoint (Stable Diffusion 2)
$url = "https://api-inference.huggingface.co/models/stabilityai/stable-diffusion-2";

// Prompt for image generation
$prompt = "A futuristic cityscape at sunset";

// Prepare cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . trim($apiKey), // trim() removes any accidental spaces/newlines
    "Content-Type: application/json",
    "Accept: image/png"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(["inputs" => $prompt]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Save image if success
if ($httpCode == 200) {
    file_put_contents("test.png", $response);
    echo "✅ Image saved as test.png\n";
} else {
    echo "❌ Error: HTTP $httpCode\n";
    echo $response . "\n";
}
