<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategory() {
        $categories = Category::orderBy('catID', 'DESC')->paginate(6);
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
        $product = Product::where('catID', $category->catID)->first();
        if ($category) {
            $hasOrders = OrderDetail::where('productID', $product->productID)->exists();
            if ($hasOrders) {
                return redirect('admin/category')->with('error', 'Cannot edit the category. It has associated orders.');
            }
            return view('admin.editcategory', compact('category'));
        }
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

    public function getDeleteCategory($id) {
        $category = Category::find($id);
        if ($category) {
            $hasProducts = Product::where('catID', $category->catID)->exists();
            if ($hasProducts) {
                return redirect('admin/category')->with('error', 'Cannot delete the category. It has associated products.');
            }
            $category->delete();
            return back();
        }
    }

}
