<?php
require "vendor/autoload.php";

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

header('Content-Type: application/json');

try {
    $data = json_decode(file_get_contents("php://input"));
    if (!$data || !isset($data->text)) {
        throw new Exception('Invalid input');
    }

    $text = $data->text;

    $client = new Client("AIzaSyAwfRSAeCdCTV_MItV6rp1uQivR5xZaxnw");

    $response = $client->geminiPro()->generateContent(
        new TextPart($text),
    );

    $generatedText = $response->text();

    echo json_encode(['generatedText' => $generatedText]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
