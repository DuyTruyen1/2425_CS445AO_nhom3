<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JitsiController extends Controller
{
    public function index()
    {
        // Tạo một tên phòng ngẫu nhiên hoặc cho phép người dùng chọn tên phòng
        $roomName = 'meeting-' . time();
        return view('jitsi.index', compact('roomName'));
    }
}
