<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Bot</title>
  <script>
    function generateResponse() {
      // Lấy giá trị người dùng nhập vào
      var userInput = document.getElementById("text").value;
      var response = document.getElementById("response");

      // Gửi yêu cầu fetch tới response.php với phương thức POST
      fetch("response.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            text: userInput, // Truyền dữ liệu người dùng nhập vào
          })
        })
        .then(res => res.text()) // Chuyển phản hồi trả về thành văn bản
        .then(res => {
          response.innerHTML = res; // Hiển thị phản hồi trong phần tử với id="response"
        })
        .catch(err => {
          response.innerHTML = "Đã có lỗi xảy ra. Vui lòng thử lại!";
        });
    }
  </script>
</head>

<body>
  <h1>Chat Bot</h1>

  <!-- Input cho văn bản người dùng -->
  <input type="text" id="text" placeholder="Nhập câu hỏi..." />

  <br><br>

  <!-- Nút bấm để tạo phản hồi -->
  <button onclick="generateResponse();">Generate Response</button>

  <br><br>

  <!-- Hiển thị phản hồi từ server -->
  <div id="response"></div>
</body>

</html>