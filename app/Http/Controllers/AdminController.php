<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\TypeProduct;
use App\User;
use App\Bill;
use App\Customer;
use App\BillDetail;

class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function post_login(){
        // if(auth()->attempt(request(['email', 'password']))==false){
        //     return back();
        // }
        // return redirect()->to('/dashboard');
        if((auth()->attempt(request(['email', 'password']))==true) and (auth()->user()->admin==1)){
            return redirect()->to('/dashboard');
        }
        else{
            return back();
        }
    }

    public function dashboard(){
        $products=Product::all();
        $types=TypeProduct::all();
        $users=User::all();
        $bills=Bill::all();
        $customers=Customer::all();
        $billDetails=BillDetail::all();
        return view('admin.dashboard', compact('products', 'types', 'users', 'bills', 'customers', 'billDetails'));
    }

    public function logout(){
        auth()->logout();
        return redirect()->to('/admin');
    }

    public function addProduct(){
        $types=TypeProduct::all();
        return view('admin.addProduct', ['types'=>$types]);
    }

    public function post_addProduct(Request $req){
        if($req->hasFile('imgUpload')){
            $fileNameWithExtension=$req->file('imgUpload')->getClientOriginalName();
            $fileName=pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $fileExtension=$req->file('imgUpload')->getClientOriginalExtension();
            $fileNameToStore=$fileName.'_'.time().'.'.$fileExtension;
            $path=$req->file('imgUpload')->storeAs('/resources/frontend/img/products', $fileNameToStore);
        }
        else{
            $fileNameToStore='no';
        }
        $product=new Product();
        $product->name=$req->name;
        $product->description=$req->description;
        $product->price_in=$req->price_in;
        $product->price_out=$req->price_out;
        $product->id_type=$req->type;
        $product->unit=$req->unit;
        $product->image=$fileNameToStore;
        $product->save();
        return redirect()->to('/dashboard');
    }

    public function addUser(){
        return view('admin.addUser');
    }

    public function post_addUser(){
        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        $user=User::create(request(['name', 'email', 'password']));
        auth()->login($user);
        return redirect()->to('/dashboard');
    }

    public function addType(){
        return view('admin.addType');
    }

    public function post_addType(Request $req){
        $this->validate(request(),[
            'name'=>'required',
            'description'=>'required'
        ]);

        $type=new TypeProduct();
        $type->name=$req->name;
        $type->description=$req->description;
        $type->save();
        return redirect()->to('/dashboard');
    }

    public function deleteUser($id){
        User::where('id', $id)->delete();
        return redirect()->to('/dashboard');
    }

    public function deleteType($id){
        TypeProduct::where('id', $id)->delete();
        return redirect()->to('/dashboard');
    }

    public function deleteProduct($id){
        Product::where('id', $id)->delete();
        return redirect()->to('/dashboard');
    }

    public function deleteBill($id){
        BillDetail::where('id_bill', $id)->delete();
        Bill::where('id', $id)->delete();
        return redirect()->to('dashboard');
    }

    public function viewBillDetails($id){
        $bill=Bill::find($id);
        $billDetails=BillDetail::where('id_bill', $id)->get();
        $customer=Customer::where('id', $bill->id_customer)->first();
        return view('admin.viewBillDetails', compact('bill', 'billDetails', 'customer'));
    }

    public function editUser($id){
        $user=User::find($id);
        return view('admin.editUser', compact('user'));
    }

    public function post_editUser($id, Request $req){
        $user=User::find($id);
        $user->email=$req->email;
        $user->name=$req->name;
        $user->password=$req->password;
        $user->admin=$req->admin;
        $user->save();
        return redirect()->to('/dashboard');
    }

    public function editType($id){
        $type=TypeProduct::find($id);
        return view('admin.editType', compact('type'));
    }

    public function post_editType($id, Request $req){
        $type=TypeProduct::find($id);
        $type->name=$req->name;
        $type->description=$req->description;
        $type->save();
        return redirect()->to('/dashboard');
    }

    public function cancel(){
        return redirect()->to('/dashboard');
    }

    public function editProduct($id){
        $product=Product::find($id);
        $types=TypeProduct::all();
        return view('admin.editProduct', compact('product', 'types'));
    }

    public function post_editProduct($id, Request $req){
        $product=Product::find($id);
        
        if($req->hasFile('imgUpload')){
            $fileNameWithExtension=$req->file('imgUpload')->getClientOriginalName();
            $fileName=pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $fileExtension=$req->file('imgUpload')->getClientOriginalExtension();
            $fileNameToStore=$fileName.'_'.time().'.'.$fileExtension;
            $path=$req->file('imgUpload')->storeAs('/resources/frontend/img/products', $fileNameToStore);
        }
        else{
            $fileNameToStore='no';
        }
        $product->name=$req->name;
        $product->description=$req->description;
        $product->price_in=$req->price_in;
        $product->price_out=$req->price_out;
        $product->id_type=$req->type;
        $product->unit=$req->unit;
        $product->image=$fileNameToStore;
        $product->save();

        return redirect()->to('/dashboard');
    }
}
