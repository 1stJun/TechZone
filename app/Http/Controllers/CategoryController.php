<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategory() {
        $categories = Category::orderBy('catID', 'ASC')->paginate(4);
        return view('admin.category', compact('categories'));
    }

    public function getAddCategory() {
        return view('admin.addcategory');
    }

    public function postAddCategory(Request $request) {
        $request->validate([
            'name' => 'required|unique:categories,catName,'.$request->id.',catID|string|max:255',
        ]);
        $cate = new Category();
        $cate->catName = $request->name;
        $cate->save();
        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function getEditCategory($id) {
        $category = Category::find($id);
        return view('admin.editcategory', compact('category'));
    }

    public function postEditCategory(Request $request) {
        $request->validate([
            'name' => 'required|unique:categories,catName,'.$request->id.',catID|string|max:255',
        ]);
        $category = Category::find($request->id);
        $category->catName = $request->name;
        $category->save();
        return redirect()->back()->with('success', 'Category updated successfully!');
    }


}
