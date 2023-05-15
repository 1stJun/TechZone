<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;

class CustomerController extends Controller
{
    public function index() {
        $products = Product::paginate(8);
        return view('customer.index', compact('products'));
    }

    public function getRegister() {
        return view('customer.register');
    }

    public function postRegister(Request $request) {
        $request->validate([
            'customerPhone' => 'required|unique:customers',
            'customerEmail' => 'required|email|unique:customers',
            'customerName' => 'required',
            'customerPass' => 'required|min:6'
        ]);

        $customer = new Customer();
        $customer->customerPhone = $request->input('customerPhone');
        $customer->customerEmail = $request->input('customerEmail');
        $customer->customerName = $request->input('customerName');
        $customer->customerPass = Hash::make($request->input('customerPass'));
        $customer->save();

        return redirect()->intended('customer/login');
    }

    public function getLogin() {
        return view('customer.login');
    }

    public function postLogin(Request $request) {
        $request->validate([
            'customerEmail' => 'required|email',
            'customerPass' => 'required|min:6',
        ]);

        $customer = Customer::where('customerEmail', $request->customerEmail)->first();
        if ($customer) {
            if (Hash::check($request->customerPass, $customer->customerPass)) {
                $request->session()->put('customerPhone', $customer->customerPhone);
                $request->session()->put('customerEmail', $customer->customerEmail);
                $request->session()->put('customerName', $customer->customerName);
                return redirect('customer/index');
            }
            else {
                return back()->with('fail','Password is not macth');
            }
        }
        else {
            return back()->with('fail','Customer does not exist');
        }
    }

    public function getLogout() {
        session()->forget('customerName');  
        return redirect('customer/login');
    }

    public function showByCategory($id)
    {
        $items = Product::where('catID', $id)->paginate(4);
        return view('customer.category', compact('items'));
    }

    public function getDetail($id) {
        $item = Product::find($id);
        return view('customer.product', compact('item'));
    }

    public function storeCart(Request $request) {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $product = Product::find($productId);

        $cart = Session::get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'product' => $product->toArray(),
                'quantity' => $quantity,
            ];
        }
        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart.');
    }

    public function viewCart() {
        $cart = Session::get('cart', []);
        $cartItems = collect($cart)->map(function($item) {
            return (object) $item;
        })->all();
        $subtotal = collect($cart)->sum(function($item) {
            return $item['product']['productPrice'] * $item['quantity'];
        });

        return view('customer.cart', compact('cartItems', 'subtotal'));
    }

    public function removeItem($productId) {
        $cart = session()->get('cart');
        if(isset($cart[$productId])){
            unset($cart[$productId]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product removed from cart.');
        } else {
            return redirect()->back()->with('error', 'Product not found in cart.');
        }
    }

    public function updateCart(Request $request) {
        $cart = Session::get('cart', []);    
        foreach ($cart as $productId => $item) {
            $newQuantity = $request->input("quantity");
            $cart[$productId]['quantity'] = $newQuantity;
        }    
        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Cart updated successfully.');
    }

    public function placeOrder(Request $request) {
        $cart = Session::get('cart', []);
        $totalAmount = collect($cart)->sum(function($item) {
            return $item['product']['productPrice'] * $item['quantity'];
        });
        $customer = session('customerName');
        if (!$customer) {
            return redirect('customer/login');
        }
        $customerID = Customer::where('customerName', $customer)->value('customerID');
        $order = new Order();
        $order->customerID = $customerID;
        $order->order_date = now();
        $order->total_amount = $totalAmount;
        $order->save();
        $orderID = $order->orderID;

        foreach($cart as $productId => $item) {
            $orderDetail = new OrderDetail();
            $orderDetail->orderID = $orderID;
            $orderDetail->productID = $productId;
            $orderDetail->quantity = $item['quantity'];
            $orderDetail->save();
        }

        Session::forget('cart');

        return redirect()->back();
    }    

    public function search(Request $request)
    {
        $customers = Customer::orderBy('customerID', 'DESC')->search()->paginate(4);
        return view('admin.customer', compact('customers'));
    }
}
