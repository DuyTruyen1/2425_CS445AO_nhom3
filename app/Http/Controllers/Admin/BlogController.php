<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function getBlog()
    {
        $blogs = Blog::all();
        return view('Admin.blog', ['BL_St' => $blogs]);
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('Admin.editBlog', compact('blog'));
    }

    public function update(UpdateBlogRequest $request, $id)
    {
        // Tìm blog theo id hoặc trả về lỗi nếu không tìm thấy
        $blog = Blog::findOrFail($id);

        // Cập nhật các trường thông tin của blog
        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'description' => $request->description,
        ]);

        // Kiểm tra nếu có file hình ảnh mới
        if ($request->hasFile('Hinh')) {
            // Xóa file hình ảnh cũ nếu có
            if ($blog->Hinh && file_exists(public_path('upload/' . $blog->Hinh))) {
                unlink(public_path('upload/' . $blog->Hinh));
            }

            // Lưu hình ảnh mới
            $fileName = time() . '_' . $request->file('Hinh')->getClientOriginalName();
            $request->file('Hinh')->move(public_path('upload'), $fileName);

            // Cập nhật tên file hình ảnh trong cơ sở dữ liệu
            $blog->Hinh = $fileName;
            $blog->save();
        }

        // Trả về thông báo thành công qua session
        return redirect()->route('admin.blogs.edit', $blog->id)->with('success', 'Cập nhật blog thành công!');
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
