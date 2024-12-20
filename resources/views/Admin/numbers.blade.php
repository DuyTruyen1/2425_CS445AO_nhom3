@extends('layout.main')
@section('content')
<link rel="stylesheet" href="{{ asset('asset/CSS/numbers.css') }}">

<!-- Account Summary Section -->
<div class="container mt-5">
    <h1 class="text-center text-primary mb-4" style="font-size: 2.5rem; font-weight: bold; text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);">📊 Tổng Quan Tài Khoản 📊</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle">
            <thead style="background: linear-gradient(90deg, #6a11cb, #2575fc); color: white;">
                <tr>
                    <th class="text-center" style="font-size: 1.2rem; font-weight: bold; color:black">Loại</th>
                    <th class="text-center" style="font-size: 1.2rem; font-weight: bold;color:black">Số lượng</th>
                </tr>
            </thead>
            <tbody>
                <tr style="background-color: #f1f8ff;">
                    <td class="fw-bold text-primary" style="font-size: 1.2rem; text-shadow: 1px 1px 3px rgba(0,0,0,0.3);">Sinh Viên</td>
                    <td class="text-center" style="font-size: 1.2rem;">{{ $studentCount }}</td>
                </tr>
                <tr style="background-color: #fdfdfe;">
                    <td class="fw-bold text-success" style="font-size: 1.2rem; text-shadow: 1px 1px 3px rgba(0,0,0,0.3);">Giáo Viên</td>
                    <td class="text-center" style="font-size: 1.2rem;">{{ $teacherCount }}</td>
                </tr>
                <tr style="background-color: #f1f8ff;">
                    <td class="fw-bold text-info" style="font-size: 1.2rem; text-shadow: 1px 1px 3px rgba(0,0,0,0.3);">Công Ty</td>
                    <td class="text-center" style="font-size: 1.2rem;">{{ $companyCount }}</td>
                </tr>
                <tr style="background-color: #fdfdfe;">
                    <td class="fw-bold text-danger" style="font-size: 1.2rem; text-shadow: 1px 1px 3px rgba(0,0,0,0.3);">Tổng số tài khoản</td>
                    <td class="text-center" style="font-size: 1.2rem;">{{ $usersCount }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Additional Data Sections -->
<div class="container mt-5">
    <h2 class="text-center text-success mb-4" style="font-size: 2rem; font-weight: bold; text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);">📋 Thông Tin Thêm 📋</h2>
    <h3 class="text-center mb-4" style="font-size: 1.5rem; font-weight: bold; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">2. Số lượng blog: {{ $blogCount }}</h3>
    <h3 class="text-center mb-4" style="font-size: 1.5rem; font-weight: bold; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">3. Số lượng tin nhắn: {{ $messageCount }}</h3>

    <h3 class="text-center mb-4" style="font-size: 1.5rem; font-weight: bold; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">4. Số lượng sinh viên theo kỹ năng:</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle">
            <thead style="background: linear-gradient(90deg, #6a11cb, #2575fc); color: white;">
                <tr>
                    <th class="text-center" style="font-size: 1.2rem; font-weight: bold;color:black">Kỹ năng</th>
                    <th class="text-center" style="font-size: 1.2rem; font-weight: bold;color:black">Số lượng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skillStats as $item)
                    <tr style="background-color: {{ $loop->odd ? '#f1f8ff' : '#fdfdfe' }};">
                        <td class="text-center" style="font-size: 1.1rem;">{{ $item['name'] }}</td>
                        <td class="text-center" style="font-size: 1.1rem;">{{ $item['total'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h3 class="text-center mb-4" style="font-size: 1.5rem; font-weight: bold; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">5. Số lượng thầy cô tuyển theo kỹ năng:</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle">
            <thead style="background: linear-gradient(90deg, #6a11cb, #2575fc); color: white;">
                <tr>
                    <th class="text-center" style="font-size: 1.2rem; font-weight: bold;color:black">Kỹ năng</th>
                    <th class="text-center" style="font-size: 1.2rem; font-weight: bold;color:black">Số lượng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skillStats2 as $item)
                    <tr style="background-color: {{ $loop->odd ? '#f1f8ff' : '#fdfdfe' }};">
                        <td class="text-center" style="font-size: 1.1rem;">{{ $item['name'] }}</td>
                        <td class="text-center" style="font-size: 1.1rem;">{{ $item['total'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h3 class="text-center mb-4" style="font-size: 1.5rem; font-weight: bold; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">6. Số lượng thầy công ty tuyển theo kỹ năng:</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle">
            <thead style="background: linear-gradient(90deg, #6a11cb, #2575fc); color: white;">
                <tr>
                    <th class="text-center" style="font-size: 1.2rem; font-weight: bold;color:black">Kỹ năng</th>
                    <th class="text-center" style="font-size: 1.2rem; font-weight: bold;color:black">Số lượng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skillStats3 as $item)
                    <tr style="background-color: {{ $loop->odd ? '#f1f8ff' : '#fdfdfe' }};">
                        <td class="text-center" style="font-size: 1.1rem;">{{ $item['name'] }}</td>
                        <td class="text-center" style="font-size: 1.1rem;">{{ $item['total'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

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
                <button type="button" class="btn btn-primary" onclick="SaveEdit()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    function SaveEdit() {
        var name = document.getElementById('name').value;
        console.log(name);  // Perform your save operation here
    }
</script>

@endsection
