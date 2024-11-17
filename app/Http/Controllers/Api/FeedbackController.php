<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function feedback()
    {
        $feedbacks = Feedback::all();
        return view('Admin.feedback', ['feedbacks' => $feedbacks]);
    }
}
