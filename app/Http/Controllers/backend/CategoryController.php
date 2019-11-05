<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\{AddCategoryRequest,EditCategoryRequest};
use App\models\category;
class CategoryController extends Controller
{
    public function GetCategory()
    {
        $data['category'] = category::all();
        return view('backend.category.category',$data);
    }

    public function PostCategory(AddCategoryRequest $r)
    {
        $cate = new category;
        $cate->name=$r->name;
        $cate->parent=$r->parent;
        $cate->save();
        return redirect()->back()->with('thongbao','Đã thêm thành công');
    
    }

    public function EditCategory($id)
    {
        $data['cate']=category::find($id);
        $data['category']=category::all();
        return view('backend.category.editcategory',$data);
    }

    public function PostEditCategory(EditCategoryRequest $r,$id)
    {
        $cate = category::find($id);
        $cate->name=$r->name;
        $cate->parent=$r->parent;
        $cate->save();

        return redirect()->back()->with('thongbao','Đã sửa thành công');
    }

    public function DelCategory($id)
    {
        $cate = category::find($id);
        category::where('parent',$id)->update(['parent'=>$cate->parent]);
        category::destroy($id);
        return redirect('admin/category')->with('thongbao','Đã xóa danh mục:');
    }
}
