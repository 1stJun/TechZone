<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;

class AdminController extends Controller
{
    public function index() {
        $customers = Customer::count();
        $category = Category::count();
        $product = Product::count();
        $order = Order::count(); 
        return view('admin.index', compact('customers', 'category', 'product', 'order'));
    }

    public function getLogin() {
        return view('admin.login');
    }
    
    public function postLogin(Request $request) {        
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
    
        $admin = Admin::where('adminUsername', $credentials['username'])->first();
    
        if($admin) {
            if(Hash::check($credentials['password'], $admin->adminPass) ) {
                $request->session()->put('user_name', $admin->adminFullName);
                return redirect('admin/index');
            }
            else {
                return back()->with('fail', 'Password is not match!');
            }
        }
        else {
            return back()->with('fail', 'Admin username is not existed.');
        }
    }

    public function getLogout() {
        session()->forget('user_name');    
        return redirect('admin/login');
    }

    public function getCustomer() {
        $customers = Customer::orderBy('customerID', 'DESC')->paginate(4);
        return view('admin.customer', compact('customers'));
    }

    public function getEditCustomer($id) {        
        $cus = Customer::find($id);
        if (Session::get('customerID') == $cus->customerID) {
            return redirect()->back()->with('error', 'The logged in customer cannot be edited.');
        }
        if ($cus) {
            $hasOrders = Order::where('customerID', $cus->customerID)->exists();
            if ($hasOrders) {
                return redirect('admin/customer')->with('error', 'Cannot delete the customer. It has associated orders.');
            }
            return view('admin.editcustomer', compact('cus'));
        }
    }

    public function postEditCustomer(Request $request) {
        $request->validate([
            'customerPhone' => 'required|unique:customers,customerPhone,'.$request->id.',customerID',
            'customerEmail' => 'required|email|unique:customers,customerEmail,'.$request->id.',customerID',
            'customerName' => 'required',
            'customerPass' => 'nullable|min:6'
        ]);
        $cus = Customer::find($request->id);
        $cus->customerPhone = $request->input('customerPhone');
        $cus->customerEmail = $request->input('customerEmail');
        $cus->customerName = $request->input('customerName');
        if ($request->filled('customerPass')) {
            $cus->customerPass = Hash::make($request->input('customerPass'));
        }
        $cus->save();
        return redirect()->back()->with('success', 'Customer updated successfully!');
    }

    public function getDeleteCustomer($id) {
        $cus = Customer::find($id);
        if (Session::get('customerID') == $cus->customerID) {
            return redirect()->back()->with('error', 'The logged in customer cannot be deleted.');
        }        
        if ($cus) {
            $hasOrders = Order::where('customerID', $cus->customerID)->exists();
            if ($hasOrders) {
                return redirect('admin/customer')->with('error', 'Cannot delete the customer. It has associated orders.');
            }
            $cus->delete();
            return redirect()->back();
        }        
    }

    public function getOrder() {
        $orders = Order::select('orders.*', 'customers.*')
                        ->join('customers', 'orders.customerID', '=', 'customers.customerID')
                        ->orderByDesc('order_date')
                        ->paginate(4);              
        return view('admin.order', compact('orders'));
    }

    public function viewOrderDetail($orderID) {
        $order = Order::select('orders.*', 'customers.*')
                    ->join('customers', 'orders.customerID', '=', 'customers.customerID')
                    ->find($orderID);
        $items = OrderDetail::select('order_details.*', 'products.*')
                        ->join('products', 'order_details.productID', '=', 'products.productID')
                        ->where('orderID', $orderID)
                        ->get();
        return view('admin.detail', compact('order', 'items'));
    }

    public function getDeleteOrder($id) {
        OrderDetail::where('orderID', $id)->delete();
        Order::where('orderID', $id)->delete();
        return back();
    }

    public function searchCustomer(Request $request) {
        $searchTerm = $request->input('search');
        $customers = Customer::where('customerName', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('customerPhone', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('customerEmail', 'LIKE', '%' . $searchTerm . '%')
                        ->paginate(4);
        return view('admin.customer', compact('customers'));
    }

    public function searchCategory(Request $request) {
        $searchTerm = $request->input('search');
        $categories = Category::where('catName', 'LIKE', '%' . $searchTerm . '%')
                        ->paginate(4);
        return view('admin.category', compact('categories'));
    }

    public function searchProduct(Request $request) {
        $searchTerm = $request->input('search');
        $products = Product::join('categories', 'products.catID', '=', 'categories.catID')
                        ->where('productName', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('catName', 'LIKE', '%' . $searchTerm . '%')
                        ->paginate(4);
        return view('admin.product', compact('products'));
    }

    public function searchOrder(Request $request) {
        $searchTerm = $request->input('search');
        $orders = Order::join('customers', 'orders.customerID', '=', 'customers.customerID')
                        ->where('customerName', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('order_date', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('total_amount', 'LIKE', '%' . $searchTerm . '%')
                        ->paginate(4);
        return view('admin.order', compact('orders'));
    }
}
