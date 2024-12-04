@extends('layout.main')
@section('content')
<link rel="stylesheet" href="{{asset('asset/CSS/blog.css')}}">

<!-- Delete blog form -->
<form method="POST" action="./deleteBlog" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <legend>Xoá blog theo ID</legend>

    <div class="form-group">
        <label for="id">ID: </label>
        <input type="text" class="form-control" id="category_name" name="id">
        <button type="submit" class="btn btn-danger">Xoá</button>
    </div>
</form>

<!-- Blog table -->
<table class="table table-hover">
    <thead>
        <tr>
            <th class="text-center">STT</th>
            <th class="text-center">ID</th>
            <th class="text-center">Tiêu đề</th>
            <th class="text-center">Mô tả</th>
            <th class="text-center">Nội dung</th>
            <th class="text-center">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($BL_St as $key => $ca)
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td class="text-center">{{ $ca->id_blog }}</td>
                <td>{!! $ca->title !!}</td>
                <td>{!! $ca->description !!}</td>
                <td>{!! $ca->content !!}</td>
                <td>
                    <form method="POST" action="./deleteBlog" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <input type="hidden" class="form-control" value="{{ $ca->id_blog }}" name="id">
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>

                    <!-- Thêm nút Cập nhật để chuyển hướng tới trang chỉnh sửa -->
                    <a href="{{ route('admin.blogs.edit', $ca->id_blog) }}" class="btn btn-primary mt-2">Cập nhật</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop
