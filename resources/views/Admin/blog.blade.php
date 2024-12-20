@extends('layout.main')
@section('content')
<link rel="stylesheet" href="{{asset('asset/CSS/blog.css')}}">

<div class="container my-5">
    <!-- Delete Blog Form -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-danger text-white text-center">
            <h5>Xoá Blog Theo ID</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="./deleteBlog" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="id" class="form-label">ID:</label>
                    <input type="text" class="form-control" id="id" name="id" placeholder="Nhập ID Blog">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger px-4">Xoá</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Blog Table -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white text-center">
            <h5>Danh Sách Blogs</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" style="color: black">STT</th>
                        <th class="text-center" style="color: black">ID</th>
                        <th class="text-center" style="color: black">Tiêu Đề</th>
                        <th class="text-center" style="color: black">Mô Tả</th>
                        <th class="text-center" style="color: black">Nội Dung</th>
                        <th class="text-center" style="color: black">Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($BL_St as $key => $ca)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">{{ $ca->id_blog }}</td>
                            <td class="text-truncate" style="max-width: 150px;">{!! $ca->title !!}</td>
                            <td class="text-truncate" style="max-width: 200px;">{!! $ca->description !!}</td>
                            <td class="text-truncate" style="max-width: 300px;">{!! $ca->content !!}</td>
                            <td class="text-center">
                                <form method="POST" action="./deleteBlog" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $ca->id_blog }}">
                                    <button type="submit" class="btn btn-outline-danger btn-sm px-3 py-1">Xoá</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
