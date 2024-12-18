@extends('layout.main')
@section('content')
<link rel="stylesheet" href="{{asset('asset/CSS/numbers.css')}}">

<!-- Account Summary Section -->
<h1>1. Số lượng tài khoản</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Loại</th>
            <th>Số lượng</th>
        </tr>
    </thead>
    <tbody>
        <tr><td>Sinh Viên</td><td>{{$studentCount}}</td></tr>
        <tr><td>Giáo Viên</td><td>{{$teacherCount}}</td></tr>
        <tr><td>Công Ty</td><td>{{$companyCount}}</td></tr>
        <tr><td>Tổng số tài khoản</td><td>{{$usersCount}}</td></tr>
    </tbody>
</table>

<!-- Additional Data Sections -->
<h1>2. Số lượng blog: {{$blogCount}}</h1>
<h1>3. Số lượng tin nhắn: {{$messageCount}}</h1>

<h1>4. Số lượng sinh viên theo kỹ năng:</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Kỹ năng</th>
            <th>Số lượng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($skillStats as $item)
            <tr><td>{{$item['name']}}</td><td>{{$item['total']}}</td></tr>
        @endforeach
    </tbody>
</table>

<h1>5. Số lượng thầy cô tuyển theo kỹ năng:</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Kỹ năng</th>
            <th>Số lượng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($skillStats2 as $item)
            <tr><td>{{$item['name']}}</td><td>{{$item['total']}}</td></tr>
        @endforeach
    </tbody>
</table>

<h1>6. Số lượng thầy công ty tuyển theo kỹ năng:</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Kỹ năng</th>
            <th>Số lượng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($skillStats3 as $item)
            <tr><td>{{$item['name']}}</td><td>{{$item['total']}}</td></tr>
        @endforeach
    </tbody>
</table>

<!-- Modal for Editing Category -->
<div class="modal fade" id="modal-category">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Sửa Category</h4>
            </div>
            <div class="modal-body">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="SaveEdit()">Save changes</button>
            </div>
        </div>
    </div>
</div>
@stop
