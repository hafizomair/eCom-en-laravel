<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    function index()
    {
        $data = Product::all();
        return view('product', ['products' => $data]);
    }

    function detail($id)
    {
        $data =  Product::find($id);
        return view('detail', ['product' => $data]);
    }
    function search(Request $req)
    {
        //return $req->input();
        $data = Product::where('name', 'like', '%' . $req->input('query') . '%')->get();
        return view('search', ['products' => $data]);
    }

    function addToCart(Request $req)
    {
        if ($req->session()->has('user')) {

            $cart = new Cart();
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return  redirect('/');
        }
        return  redirect('/login');
    }
    static function cartItem()
    {
        $user_id = Session::get('user')['id'];
        return Cart::where('user_id', $user_id)->count();
    }

    function cartList()
    {
        $user_id = Session::get('user')['id'];

        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $user_id)
            ->select('products.*', 'cart.id as cart_id')
            ->get();


        return view('cartlist', ['products' => $products]);
    }
    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('/cartlist');
    }
    function orderNow()
    {

        $user_id = Session::get('user')['id'];

        $total = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $user_id)
            ->select('products.*', 'cart.id as cart_id')
            ->sum('products.price');


        return view('ordernow', ['total' => $total]);
    }

    function orderPlace(Request $req)
    {
        $user_id = Session::get('user')['id'];
        $allCart = Cart::where('user_id', $user_id)->get();

        foreach ($allCart as $cart) {
            $orders = new Order();
            $orders->product_id = $cart['product_id'];
            $orders->user_id = $cart['user_id'];
            $orders->status = "pending";
            $orders->payment_method = $req->payment;
            $orders->payment_status = "pending";
            $orders->address = $req->address;
            $orders->save();
            Cart::where('user_id', $user_id)->delete();
        }
        return redirect('/');
    }

    function myOrders()
    {
        $user_id = Session::get('user')['id'];

        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $user_id)
            ->get();

        return view('myorders', ['orders' => $orders]);
    }
}
