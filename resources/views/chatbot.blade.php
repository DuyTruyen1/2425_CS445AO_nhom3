<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Thêm CSRF token vào meta tag -->
    
    <title>Chat Bot</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-KyZXEJw6L6jR6u7z4m0a6jlWL7k0t3hZg+zD92nGbZGbF8kMbY2IMBfZvn8jd1uK" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #50a8f1;
        }
        .container {
            max-width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #86ecec;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .chat-header p { font-size: 24px; /* Kích thước chữ */ font-weight: bold; /* Độ đậm của chữ */ color: #333; /* Màu chữ */ margin: 10px 0; /* Khoảng cách trên dưới */ }
        .chat-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .chat-header img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .response {
            margin-top: 20px;
            background-color: #e1f7d5;
            padding: 100px; /* Tăng padding để ô phản hồi trông rõ ràng hơn */
            border-radius: 5px;
            font-size: 18px; /* Tăng kích thước font */
            min-height: 100px; /* Tăng chiều cao tối thiểu */
        }
        .loading {
            text-align: center;
            color: #888;
            font-size: 16px;
        }
        .btn-send {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .btn-send:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Chat Bot</h1>
        <!-- Header của chatbot với logo -->
        <div class="chat-header">
            <img src="https://incubator.ucf.edu/wp-content/uploads/2023/07/artificial-intelligence-new-technology-science-futuristic-abstract-human-brain-ai-technology-cpu-central-processor-unit-chipset-big-data-machine-learning-cyber-mind-domination-generative-ai-scaled-1-1500x1000.jpg" class="rounded-circle">
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

        <!-- Phần phản hồi từ bot -->
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
