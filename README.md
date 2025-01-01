# Website Quản Lý Profile

<style>
    h1 {
        color: #2c3e50;
        text-align: center;
    }

    h2 {
        color: #2980b9;
        font-size: 1.5em;
    }

    p {
        font-size: 1.1em;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    ul {
        list-style-type: square;
        padding-left: 20px;
    }

    .container {
        max-width: 900px;
        margin: 0 auto;
        background-color: #ecf0f1;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .footer {
        font-size: 0.9em;
        text-align: center;
        color: #7f8c8d;
        margin-top: 20px;
    }
</style>

<div class="container">
    <h1>Website Quản Lý Profile</h1>

    <h2>Lời nói đầu</h2>
    <p>
        Ngày nay, ứng dụng công nghệ thông tin và việc tin học hóa được xem là một trong những yếu tố mang tính quyết định trong hoạt động của các chính phủ, tổ chức, cũng như của các công ty, nhà trường. Nó đóng vai trò hết sức quan trọng, có thể mang lại cho chúng ta rất nhiều lợi ích và thuận tiện trong công việc. Mạng Internet là một trong những sản phẩm có giá trị hết sức lớn lao và ngày càng trở nên một công cụ không thể thiếu, là nền tảng chính cho sự truyền tải, trao đổi thông tin trên toàn cầu.
    </p>
    <p>
        Vì vậy, trong phạm vi môn học này, nhóm chúng em sẽ trình bày về project website quản lý profile. Người tuyển dụng đưa các thông tin tuyển dụng, người ứng tuyển thì luôn luôn cập nhật CV của mình lên website một cách nhanh chóng và ai cũng có thể tiếp cận, tìm kiếm, lọc những thứ mình cần tìm mọi lúc mọi nơi.
    </p>
    <p>
        Trong quá trình làm, nhóm em còn nhiều sai sót. Chúng em mong nhận được những ý kiến đánh giá của thầy và các bạn. Em xin chân thành cảm ơn!
    </p>

    <h2>Mục lục</h2>
    <ul>
        <li><a href="#yêu-cầu-hệ-thống">Yêu cầu hệ thống</a></li>
        <li><a href="#cài-đặt">Cài đặt</a></li>
        <li><a href="#cách-sử-dụng">Cách sử dụng</a></li>
        <li><a href="#đóng-góp">Đóng góp</a></li>
        <li><a href="#liên-hệ">Liên hệ</a></li>
    </ul>

    <h2 id="yêu-cầu-hệ-thống">Yêu cầu hệ thống</h2>
    <p>Dự án này yêu cầu các công nghệ sau:</p>
    <ul>
        <li>PHP 8.0 hoặc cao hơn</li>
        <li>MySQL 5.7 hoặc cao hơn</li>
        <li>Web Server (Apache,...)</li>
        <li>Trình duyệt web hỗ trợ HTML5</li>
    </ul>

    <h2 id="cài-đặt">Cài đặt</h2>
    <h3>Bước 1: Clone repository từ GitHub</h3>
    <p>Trước tiên, bạn cần clone dự án từ GitHub về máy tính của mình.</p>
    <pre><code>git clone git@github.com:DuyTruyen1/2425_CS445AO_nhom3.git</code></pre>

    <h3>Bước 2: Cài đặt các phụ thuộc</h3>
    <p>Dự án này sử dụng Composer (đối với PHP) và npm (đối với frontend). Bạn cần cài đặt các phụ thuộc bằng cách chạy các lệnh sau:</p>
    <pre><code>composer install</code></pre>
    <p>Để cài đặt các phụ thuộc JavaScript, nếu dự án có phần frontend, bạn chạy:</p>
    <pre><code>npm install</code></pre>

    <h3>Bước 3: Cấu hình file .env</h3>
    <p>Đảm bảo rằng bạn đã tạo file `.env` từ file `.env.example` và cấu hình các thông tin cần thiết như kết nối cơ sở dữ liệu, ứng dụng...</p>
    <pre><code>cp .env.example .env</code></pre>
    <p>Chỉnh sửa các thông số trong file `.env` để phù hợp với môi trường của bạn.</p>
    <p>Lưu ý nhớ chạy câu lệnh các câu lệnh sau đây.</p>
     <ul>
        <li>php artisan cache:clear</li>
	<li>php artisan config:clear</li>
	<li>php artisan key:generate</li>
      </ul>

    <h3>Bước 4: Tạo cơ sở dữ liệu</h3>
    <p>Tiến hành tạo cơ sở dữ liệu và cấu hình kết nối trong file `.env`. Bạn có thể tạo cơ sở dữ liệu trực tiếp từ MySQL hoặc sử dụng lệnh Artisan của Laravel để tạo các bảng cơ sở dữ liệu.</p>
<p>Ở đây tôi có 1 file sql các bạn có thể copy từng câu lệnh à bỏ lên MySQL để tiến hành chạy.</p>
    <pre><code>php artisan migrate</code></pre>
    <h3>Bước 5: Chạy ứng dụng</h3>
    <p>Cuối cùng, bạn có thể chạy ứng dụng bằng cách sử dụng lệnh Artisan:</p>
    <pre><code>php artisan serve</code></pre>
    <p>Ứng dụng sẽ được chạy tại địa chỉ <code>http://localhost:8000</code>.</p>

    <h2 id="cách-sử-dụng">Cách sử dụng</h2>
    <p>Truy cập vào địa chỉ <code>http://localhost:8000</code> để sử dụng ứng dụng. Bạn có thể đăng nhập, cập nhật CV và tìm kiếm thông tin tuyển dụng trên website.</p>
</div>

<div class="footer">
    <p>Chân thành cảm ơn sự quan tâm của bạn!</p>
</div>
