<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\Cart;
use Session;
use App\User;
use Hash;
use App\TypeProduct;
use App\Customer;
use App\Bill;
use App\BillDetail;

class PagesController extends Controller
{
    public function index(){
        $slides=Slide::all();
        $best_seller=Product::all();
        return view('pages.index', compact('slides', 'best_seller'));
    }

    public function blog(){
        return view('pages.blog');
    }

    public function contact(){
        return view('pages.contact');
    }

    public function checkout(){
        $cart=Session::get('cart');
        return view('pages.checkout', compact('cart'));
    }

    public function product_details(Request $req){
        $product=Product::where('id',$req->id)->first();
        return view('pages.product_details', compact('product'));
    }

    public function allitems(){
        $types=TypeProduct::all();
        $products=Product::all();
        return view('pages.allitems', compact('products', 'types'));
    }

    public function products_in_types($id_type){
        $types=TypeProduct::all();
        $products=Product::where('id_type', $id_type)->get();
        return view('pages.products_in_types', compact('products', 'types'));
    }

    public function add_to_cart(Request $req, $id){
        $product=Product::find($id);
        $oldCart=Session('cart') ? Session::get('cart') : null;
        $cart=new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function delete_cart($id){
        $oldCart=Session::has('cart') ? Session::get('cart') : null;
        $cart=new Cart($oldCart);
        $cart->remove($id);
        Session::put('cart', $cart);
        return redirect()->back();
    }

    public function search(Request $req){
        $types=TypeProduct::all();
        $products=Product::where('name', 'like', '%'.$req->search.'%')->orWhere('price_out', $req->search)->get();
        return view('pages.search', compact('products', 'types'));
    }

    public function post_checkout(Request $req){
        $cart=Session::get('cart');

        $customer=new Customer;
        $customer->name=$req->name;
        $customer->gender=$req->gender;
        $customer->email=$req->email;
        $customer->phone=$req->phone;
        $customer->address=$req->address;
        $customer->note=$req->note;
        $customer->save();
        
        $bill=new Bill;
        $bill->id_customer=$customer->id;
        $bill->date_order= date('Y-m-d');
        $bill->total=$cart->totalPrice;
        $bill->payment=$req->payment;
        $bill->note=$req->note;
        $bill->save();

        foreach($cart->items as $key => $value){
            $bill_details=new BillDetail;
            $bill_details->id_bill=$bill->id;
            $bill_details->id_product=$key;
            $bill_details->quantity=$value['quantity'];
            $bill_details->price_out=$value['price']/$value['quantity'];
            $bill_details->save();
        }
        Session::forget('cart');
        return redirect()->back();

    }

    public function login(){
        return view('users.login');
    }

    public function register(){
        return view('users.register');
    }

    public function post_register(){
        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        $user=User::create(request(['name', 'email', 'password']));
        auth()->login($user);
        return redirect()->to('/login');
    }

    public function post_login(){
        if(auth()->attempt(request(['email', 'password']))==false){
            return back();
        }
        return redirect()->to('/');
    }

    public function logout(){
        auth()->logout();
        return redirect()->to('/');
    }

    public function profile(){
        return view('users.profile');
    }
}