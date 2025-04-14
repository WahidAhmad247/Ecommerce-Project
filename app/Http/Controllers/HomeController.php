<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use  Stripe;
use Session;

class HomeController extends Controller
{
    public function index()
    {

        $user = User::where('usertype', 'user')->get()->count();
        $order = Order::get()->count();
        $deliverd = Order::where('status', 'Delivered')->get()->count();

        $product = Product::get()->count();
        return view('admin.index', compact('user', 'product', 'order', 'deliverd'));
    }

    public function home()
    {
        $products = Product::all();

        if (Auth::id()) {

            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }


        return view('home.index', compact('products', 'count'));
    }
    public function login_home()
    {
        $products = Product::all();
        if (Auth::id()) {

            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }


        return view('home.index', compact('products', 'count'));
    }
    public function product_details($id)
    {
        $data = Product::find($id);
        if (Auth::id()) {

            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }
        return view('home.product_details', compact('data', 'count'));
    }
    public function add_cart($id)
    {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;

        $cart = new Cart();
        $cart->user_id = $user_id;
        $cart->product_id = $product_id;
        $cart->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('your product  Added in cart Successfully.');
        return redirect()->back();
    }
    public function mycart()
    {


        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
        }

        return view('home.mycart', compact('count', 'cart'));
    }

    public function delete_cart($id)
    {
        $data = Cart::find($id);

        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('your product  removed from cart Successfully.');
        return redirect()->back();
    }
    public function confirm_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id', $userid)->get();

        foreach ($cart as $carts) {
            $order = new Order;
            $order->product_id = $carts->product_id;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->save();
        }
        
        $cart_remove = Cart::where('user_id', $userid)->get();
        
        
        foreach ($cart_remove as $reomve) {
            $data = Cart::find($reomve->id);
            $data->delete();
        }
        toastr()->timeOut(10000)->closeButton()->addSuccess('your order placed Successfully.');
        return redirect('mycart');
    }
    public function myorders()
    {
        $user = Auth::user()->id;

        $count = Cart::where('user_id', $user)->get()->count();
        
        $order = Order::where('user_id', $user)->get();
        
        
        
        return view('home.order', compact('count', 'order'));
    }
    public function stripe($value)
    {
        return view('home.stripe', compact('value'));
    }
    
    public function stripePost(Request $request, $value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $value * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from complate."
        ]);
        
        $name = Auth::user()->name;
        $address = Auth::user()->address;
        $phone = Auth::user()->phone;
        
        $userid = Auth::user()->id;
        
        $cart = Cart::where('user_id', $userid)->get();
        
        foreach ($cart as $carts) {
            $order = new Order;
            $order->product_id = $carts->product_id;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->payment_status = "Paid";
            $order->user_id = $userid;
            $order->save();
        }

        $cart_remove = Cart::where('user_id', $userid)->get();
        
        
        foreach ($cart_remove as $reomve) {
            $data = Cart::find($reomve->id);
            $data->delete();
        }
        toastr()->timeOut(10000)->closeButton()->addSuccess('your order placed Successfully.');
        return redirect('mycart');
    }
}
