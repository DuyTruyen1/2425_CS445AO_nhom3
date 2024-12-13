<?php
echo "Current directory: " . __DIR__ . "<br>";
echo "Checking if autoload.php exists: " . (file_exists(__DIR__ . '/../vendor/autoload.php') ? 'Yes' : 'No') . "<br>";

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

// Giải mã dữ liệu JSON từ yêu cầu POST
$data = json_decode(file_get_contents("php://input"));

// Kiểm tra xem có tồn tại thuộc tính 'text' trong dữ liệu JSON không
if (isset($data->text)) {
  $text = $data->text;
} else {
  echo "Thiếu thuộc tính text trong dữ liệu JSON.";
  exit;
}

$client = new Client("AIzaSyCXOks5tpBn7jzY-2PbKF_GKTIvKeI2I6c");

$response = $client->geminiPro()->generateContent(
  new TextPart($text)
);

// Hiển thị kết quả trả về từ API
echo $response->text();
