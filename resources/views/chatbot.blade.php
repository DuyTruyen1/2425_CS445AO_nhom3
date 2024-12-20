<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Thêm CSRF token vào meta tag -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9f7fd;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .chat-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .chat-header img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .chat-header p {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            margin-top: 0;
        }

        .response {
            background-color: #f1f8ff;
            padding: 15px;
            border-radius: 5px;
            font-size: 16px;
            min-height: 100px;
            margin-top: 20px;
        }

        .loading {
            text-align: center;
            color: #888;
            font-size: 16px;
        }

        input, button {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
            margin-top: 10px;
        }

        input:focus, button:focus {
            border-color: #007bff;
            outline: none;
        }

        .btn-send {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-send:hover {
            background-color: #0056b3;
        }

        .btn-send:active {
            background-color: #00408a;
        }

        .btn-send:disabled {
            background-color: #d6d6d6;
            cursor: not-allowed;
        }
    </style>
    <title>Chat Bot</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-KyZXEJw6L6jR6u7z4m0a6jlWL7k0t3hZg+zD92nGbZGbF8kMbY2IMBfZvn8jd1uK" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="chat-header">
            <img src="https://incubator.ucf.edu/wp-content/uploads/2023/07/artificial-intelligence-new-technology-science-futuristic-abstract-human-brain-ai-technology-cpu-central-processor-unit-chipset-big-data-machine-learning-cyber-mind-domination-generative-ai-scaled-1-1500x1000.jpg" class="rounded-circle" alt="Chat Bot">
            <p>Chat with AI</p>
        </div>

        <div id="response" class="response"></div>

        <!-- Form để gửi câu hỏi -->
        <form id="chatForm">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" id="userInput" name="input" placeholder="Hỏi điều gì đó..." required>
            </div>
            <button type="submit" class="btn btn-send">Gửi</button>
        </form>
    </div>

    <!-- Thêm thư viện jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Thêm Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Gửi form và nhận phản hồi từ Chatbot qua AJAX
        $('#chatForm').on('submit', function(e) {
            e.preventDefault();
            
            var userInput = $('#userInput').val();
            var responseDiv = $('#response');

            // Hiển thị thông báo loading
            responseDiv.html('<div class="loading">Đang xử lý...</div>');

            // Gửi yêu cầu AJAX
            $.ajax({
                url: '/send', // Địa chỉ URL cho route xử lý
                method: 'POST',
                data: JSON.stringify({ input: userInput }), // Dữ liệu gửi đi
                contentType: 'application/json', // Gửi dưới dạng JSON
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Thêm CSRF token
                },
                success: function(data) {
                    // Hiển thị phản hồi từ bot
                    responseDiv.html('<strong>Phản hồi từ Bot:</strong><br>' + data);
                    $('#userInput').val(''); // Xóa nội dung input
                },
                error: function(xhr, status, error) {
                    // Hiển thị thông báo lỗi nếu có
                    responseDiv.html("Có lỗi xảy ra. Vui lòng thử lại!");
                }
            });
        });
    </script>
</body>
</html>
