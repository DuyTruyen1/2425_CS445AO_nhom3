# Website Quản Lý Profile

## Lời nói đầu

Ngày nay, ứng dụng công nghệ thông tin và việc tin học hóa được xem là một trong những yếu tố mang tính quyết định trong hoạt động của các chính phủ, tổ chức, cũng như của các công ty, nhà trường. Nó đóng vai trò hết sức quan trọng, có thể mang lại cho chúng ta rất nhiều lợi ích và thuận tiện trong công việc. Mạng Internet là một trong những sản phẩm có giá trị hết sức lớn lao và ngày càng trở nên một công cụ không thể thiếu, là nền tảng chính cho sự truyền tải, trao đổi thông tin trên toàn cầu.

Vì vậy, trong phạm vi môn học này, nhóm chúng em sẽ trình bày về project website quản lý profile. Người tuyển dụng đưa các thông tin tuyển dụng, người ứng tuyển thì luôn luôn cập nhật CV của mình lên website một cách nhanh chóng và ai cũng có thể tiếp cận, tìm kiếm, lọc những thứ mình cần tìm mọi lúc mọi nơi.

Trong quá trình làm, nhóm em còn nhiều sai sót. Chúng em mong nhận được những ý kiến đánh giá của thầy và các bạn. Em xin chân thành cảm ơn!

## Mục lục

1. [Yêu cầu hệ thống](#yêu-cầu-hệ-thống)
2. [Cài đặt](#cài-đặt)
3. [Cách sử dụng](#cách-sử-dụng)
4. [Đóng góp](#đóng-góp)
5. [Liên hệ](#liên-hệ)

## Yêu cầu hệ thống

Dự án này yêu cầu các công nghệ sau:

- PHP 8.0 hoặc cao hơn
- MySQL 5.7 hoặc cao hơn
- Web Server (Apache,...)
- Trình duyệt web hỗ trợ HTML5

## Cài đặt

### Bước 1: Clone repository từ GitHub
Trước tiên, bạn cần clone dự án từ GitHub về máy tính của mình.

```bash
git clone git@github.com:DuyTruyen1/2425_CS445AO_nhom3.git
### Bước 2: Cài đặt các phụ thuộc
Dự án này sử dụng Composer (đối với PHP) và npm (đối với frontend). Bạn cần cài đặt các phụ thuộc bằng cách chạy các lệnh sau:
composer install
npm install
### Bước 3: Cấu hình file .env
- Nếu không có file env thì tạo fille .env , còn nếu thấy file  ".env.example" thì đổi tên thành ".env"
Chỉnh sửa các thông số trong file .env để phù hợp với môi trường của bạn.

Lưu ý nhớ chạy câu lệnh các câu lệnh sau đây.

bash
Sao chép mã
- php artisan cache:clear
- php artisan config:clear
- php artisan key:generate
### Bước 4: Tạo cơ sở dữ liệu
- Tiến hành tạo cơ sở dữ liệu và cấu hình kết nối trong file .env. Bạn có thể tạo cơ sở dữ liệu trực tiếp từ MySQL hoặc sử dụng lệnh Artisan của Laravel để tạo các bảng cơ sở dữ liệu.

- Ở đây tôi có 1 file SQL chứa trong thư mục Database các bạn có thể copy từng câu lệnh và bỏ lên 
MySQL để tiến hành chạy.
- php artisan migrate
### Bước 5: Chạy ứng dụng
- php artisan serve
- Ứng dụng sẽ được chạy tại địa chỉ http://localhost:8000/
Cách sử dụng
- Truy cập vào địa chỉ http://localhost:8000 để sử dụng ứng dụng. Bạn có thể đăng nhập, cập nhật CV và tìm kiếm thông tin tuyển dụng trên website.
Liên hệ
- Nếu bạn có bất kỳ câu hỏi nào, hãy liên hệ với chúng tôi qua email: truyenmap420@gmail.com




