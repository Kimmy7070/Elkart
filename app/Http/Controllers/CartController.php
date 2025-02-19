<?php

namespace App\Http\Controllers;

use DB;

use Auth;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\product;


class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Admin_Cart_Index(){
        $data = DB::table('carts')->join('products', 'carts.product_id', '=', 'products.id')->join('users', 'carts.user_id', '=', 'users.id')
        ->select('carts.*', 'products.name', 'products.img1', 'users.email')
        ->where('carts.is_ordered', 0)->get();
        return view('admin.cart', compact('data'));
    }

    public function Customer_Cart_Index()
    {
        $data = DB::table('carts')->join('products', 'carts.product_id', '=', 'products.id')
        ->select('carts.*', 'products.name','products.quantity','products.price', 'products.img1', 'products.mrp')
        ->where('carts.user_id', Auth::user()->id)->where('carts.is_ordered', 0)->get();

        // $cart_id = DB::table('carts')->select('id')->where('user_id', Auth::user()->id)->get();
        return view('customer.cart', compact('data'));
    }

    public function update_cart($cart_id, Request $request)
    {
        // echo $cart_id;
        $qty = $request['qty'];
        $qt=(int)$qty;
        // echo $qt;

        if(cart::where('id', $cart_id)->exists())
        {
            if($qt <= (int)product::where('id', cart::where('id',$cart_id)->value('product_id'))->value('quantity'))
            {
                $data = DB::table('carts')->where('id', $cart_id)->update(['cart_quantity'=>$qt]);
            }
        }
        return redirect('/customer/cart')->with('success', 'Cart updated successfully');
    }

    // public function edit_cart($user_id, $product_id)
    // {
    //     // add to cart backend
    //     $data = cart::create(['user_id'=>$user_id, 'product_id',$product_id]);
    //     return redirect('/customer/cart')->with('success', 'Product added to cart successfully');
    // }
    public function delete($id)
    {
        // echo $cart_id;
        $data = DB::table('carts')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Product deleted from cart successfully');
    }
}
