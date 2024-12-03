<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Category;

class ShowMeetingController extends Controller
{
    public function showMeetings()
    {
        $category = Category::first();
        $meetings = Appointment::with(['teacher', 'company', 'student'])->get();

        return view('Pages.Meeting.index', compact('meetings', 'category'));
    }
}
