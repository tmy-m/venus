<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\TypeProduct;
use App\Cart;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layouts.nav', function($view){
            $types=TypeProduct::all();
            $view->with('types', $types);
        });
        view()->composer('layouts.nav', function($view){
            if(Session('cart')){
                $oldCart=Session::get('cart');
                $cart=new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'), 'products'=>$cart->items,'totalPrice'=>$cart->totalPrice, 'totalQuantity'=>$cart->totalQuantity]);
            }
        });
    }
}
