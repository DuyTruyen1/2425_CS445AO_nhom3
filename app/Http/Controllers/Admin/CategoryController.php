<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;



class CategoryController extends Controller
{
    public function category()
    {
        $category = Category::all();
        return view('Admin.category', ['cat' => $category]);
    }

    public function postCategory(CategoryRequest $req)
    {
        $category = Category::create($req->all());
        return response()->json(['success' => 'Thêm thành công sản phẩm']);
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return json_encode([
            'cat' => $category,
        ]);
    }

    public function postEditCategory(UpdateCategoryRequest $request, $id)
    {
        Category::find($id)->update($request->all());

        return response()->json(['success' => 'Cập nhật thành công']);
    }

    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        return response()->json(['success' => 'Xóa thành công danh mục']);
    }
}
