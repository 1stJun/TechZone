<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderDetail;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct() {
        $products = Product::select('products.*', 'categories.catName')
                ->join('categories', 'products.catID', '=', 'categories.catID')
                ->orderBy('productID', 'DESC')
                ->paginate(4);
        return view('admin.product', compact('products'));
    }

    public function getAddProduct() {
        $categories = Category::get();
        return view('admin.addproduct', compact('categories'));        
    }

    public function postAddProduct(Request $request) {
        $request->validate([
            'name' => 'required|unique:products,productName,'.$request->id.',productID|string|max:255',
            'image' => 'required|string|max:255',
            'price' => 'required|numeric',
            'list_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => 'nullable|string|max:500',
        ]);

        $product = new Product();
        $product->productName = $request->name;
        $product->productImage = $request->image;
        $product->productPrice = $request->price;
        $product->productListPrice = $request->list_price;
        $product->productQuantity = $request->quantity;
        $product->productDescription = $request->description;
        $product->catID = $request->category;
        $product->save();
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function getEditProduct($id) {
        $product = Product::where('productID', $id)->first();
        $categories = Category::get();
        if ($product) {
            $hasOrders = OrderDetail::where('productID', $product->productID)->exists();
            if ($hasOrders) {
                return redirect('admin/product')->with('error', 'Cannot edit the product. It has associated orders.');
            }
            return view('admin.editproduct', compact('product', 'categories'));      
        }
    }

    public function postEditProduct(Request $request) {
        $request->validate([
            'name' => 'required|unique:products,productName,'.$request->id.',productID|string|max:255',
            'image' => 'required|string|max:255',
            'price' => 'required|numeric',
            'list_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => 'nullable|string|max:500',
        ]);

        Product::where('productID', $request->id)->update([
            'productName' => $request->name,
            'productImage' => $request->image,
            'productPrice' => $request->price,
            'productListPrice' => $request->list_price,
            'productQuantity' => $request->quantity,
            'productDescription' => $request->description,
            'catID' => $request->category
        ]);
        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    public function getDeleteProduct($id) {
        $product = Product::find($id);
        if ($product) {
            $hasOrders = OrderDetail::where('productID', $product->productID)->exists();
            if ($hasOrders) {
                return redirect('admin/product')->with('error', 'Cannot delete the product. It has associated orders.');
            }
            $product->delete();
            return back();
        }
    }

    public function search(Request $request) {
        $searchTerm = $request->input('search');
        $products = Product::join('categories', 'products.catID', '=', 'categories.catID')
                        ->where('productName', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('catName', 'LIKE', '%' . $searchTerm . '%')
                        ->orderBy('productID', 'ASC')
                        ->paginate(4);
        return view('customer.index', compact('products'));
    }
}
