<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer('*', function ($view) {
            $cart = Session::get('cart', []);
            $cartItems = collect($cart)->map(function($item) {
                return (object) $item;
            })->all();
            $view->with('cartItems', $cartItems);
        });
        //
        $data = ['categories' => Category::orderBy('catID', 'ASC')->get()];
        view()->share($data);
        //
        View::composer('*', function ($view) {
            $customerID = session('customerID');
            $customer = Customer::find($customerID);
            $view->with('customer', $customer);
        });
    }
}
