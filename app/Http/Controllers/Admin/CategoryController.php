<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function manageCategory() {
        $categories = Category::latest()->get();
        return view('back-end.admin.category.manage-category', [
            'categories' => $categories
        ]);
    }

    public function addCategory() {
        return view('back-end.admin.category.add-category');
    }

    public function newCategory(Request $request)
    {
        Category::validCategory($request);
        $imageName = Category::imageFile($request);
        Category::storeCategory($request, $imageName);

        Toastr::success('Category info saved successfully', 'Success');
        return redirect()->back(); 
    }

    public function unpublishCategory($id) {
        $category = Category::find($id);
        $category->publication_status = 0;
        $category->save();

        Toastr::success('Category info unpublihsed successfully');
        return redirect()->back();
    }

    public function publishCategory($id) {
        $category = Category::find($id);
        $category->publication_status = 1;
        $category->save();

        Toastr::success('Category info publihsed successfully');
        return redirect()->back();
    }

    public function editCategory($id) {
        $category = Category::find($id);
        return view('back-end.admin.category.edit-category', [
            'category' => $category,
        ]);
    }

    public function updateCategory(Request $request) {

        $imageName = Category::updateImageFile($request);
        Category::updateCategoryInfo($request, $imageName);

        Toastr::success('Category info updated successfully');
        return redirect()->route('manage-category');
    }

    public function deleteCategory($id) {
        $category = Category::find($id);
        if(file_exists('assets/images/category/thumb/'.$category->image)) {
            unlink('assets/images/category/thumb/'.$category->image);
        }
        if(file_exists('assets/images/category/slider/'.$category->image)) {
            unlink('assets/images/category/slider/'.$category->image);
        }
        $category->delete();

        Toastr::success('Category info deleted successfully');
        return redirect()->back();
    }



}

