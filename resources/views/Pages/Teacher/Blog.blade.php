@extends('Pages.layout.menu')
@section('content')

<!-- Form Đăng Bài -->
<div class="container p-5 bg-dark text-white rounded shadow mt-4">
    <h2 class="text-center mb-4">Đăng Bài Viết</h2>
    
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{ $err }}<br>
            @endforeach
        </div>
    @endif

    @if(session('thongbao'))
        <div class="alert alert-success">
            {{ session('thongbao') }}
        </div>
    @endif

    <form action="Pages/Company/Blog" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="Tieude" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control dark-mode" name="Tieude" id="Tieude" placeholder="Nhập tiêu đề">
            @error('Tieude')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Hinhanh" class="form-label">Hình ảnh</label>
            <input type="file" name="Hinh" id="Hinh" class="form-control dark-mode">
        </div>

        <div class="mb-3">
            <label for="Tomtat" class="form-label">Tóm tắt</label>
            <textarea name="Tomtat" id="Tomtat" cols="30" rows="2" class="ckeditor form-control dark-mode"></textarea>
            @error('Tomtat')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Noidung" class="form-label">Nội dung</label>
            <textarea name="Noidung" id="Noidung" cols="30" rows="4" class="ckeditor form-control dark-mode"></textarea>
            @error('Noidung')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning w-100 dark-mode">Đăng bài</button>
    </form>
</div>

<!-- Bảng Hiển Thị Blog -->
<div class="container mt-5 p-4 bg-light rounded shadow">
    <h2 class="text-center mb-4">Các Blog Của Tôi</h2>
    <div class="table-responsive">
        <table class="table table-hover table-bordered bg-black text-black align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID Blog</th>
                    <th>ID Tus</th>
                    <th>Ngày Tạo</th>
                    <th>Ngày Đăng</th>
                    <th>Tiêu Đề</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($BL_Tr as $blg)
                <tr>
                    <td>{{ $blg->id_blog }}</td>
                    <td>{{ $blg->id }}</td>
                    <td>{{ $blg->created_at }}</td>
                    <td>{{ $blg->updated_at }}</td>
                    <td>{{ $blg->title }}</td>
                    <td>
                        <form action="Pages/Company/getUpdateBlog/{{ $blg->id_blog }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm dark-mode">Sửa</button>
                        </form>
                    </td>
                    <td>
                        <form action="Pages/Company/delBlog/{{ $blg->id_blog }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm dark-mode">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $BL_Tr->links() }}
    </div>
</div>

<!-- Thêm CKEditor -->
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('Tomtat');
    CKEDITOR.replace('Noidung');
</script>

@endsection
