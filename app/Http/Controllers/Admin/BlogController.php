<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getBlog()
    {
        $blogs = Blog::all();
        return view('Admin.blog', ['BL_St' => $blogs]);
    }

    public function deleteBlog(Request $request)
    {
        $blog = Blog::find($request->id);
        if ($blog) {
            try {
                $blog->delete();
                return redirect()->back()->with('success', 'Bạn đã xoá thành công bài đăng');
            } catch (\Exception $e) {
                return redirect()->back()->with('danger', 'Có lỗi khi xoá bài đăng: ' . $e->getMessage());
            }
        }
        return redirect()->back()->with('danger', 'Không tìm thấy bài đăng này');
    }
}
