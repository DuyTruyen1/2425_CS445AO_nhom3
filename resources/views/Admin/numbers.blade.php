@extends('layout.main')
@section('content')
<style>
    /* General styling */
    .form-group {
        width: 40%;
        float: left;
    }
    .them {
        margin-top: 30px;
        margin-left: 10px;
    }

    /* Styling for headers */
    h1 {
        margin-top: 20px;
        font-size: 1.5em;
        color: #333;
    }

    /* Table styling */
    .table {
        width: 90%;
        margin: 15px auto;
        border-collapse: collapse;
        background-color: #f8f9fa;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .table-hover th, .table-hover td {
        padding: 12px;
        text-align: center;
        border: 1px solid #dee2e6;
        vertical-align: middle;
    }

    .table-hover th {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
    }

    .table-hover tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table-hover tr:hover {
        background-color: #e9ecef;
    }

    /* Modal styling */
    .modal-header {
        background-color: #007bff;
        color: #fff;
    }

    .modal-title {
        font-weight: bold;
    }

    .modal-body {
        padding: 20px;
    }

    .modal-footer .btn {
        padding: 8px 20px;
        font-size: 0.9em;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-default {
        background-color: #6c757d;
        color: white;
        border: none;
    }

    .btn-default:hover {
        background-color: #5a6268;
    }
</style>

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
        <tr><td>Sinh Viên</td><td>{{$students}}</td></tr>
        <tr><td>Giáo Viên</td><td>{{$teachers}}</td></tr>
        <tr><td>Công Ty</td><td>{{$companys}}</td></tr>
        <tr><td>Tổng số tài khoản</td><td>{{$users}}</td></tr>
    </tbody>
</table>

<!-- Additional Data Sections -->
<h1>2. Số lượng blog: {{$blogs}}</h1>
<h1>3. Số lượng tin nhắn: {{$messages}}</h1>

<h1>4. Số lượng sinh viên theo kỹ năng:</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Kỹ năng</th>
            <th>Số lượng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($skill_all as $item)
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
        @foreach ($skill_all2 as $item)
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
        @foreach ($skill_all3 as $item)
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
