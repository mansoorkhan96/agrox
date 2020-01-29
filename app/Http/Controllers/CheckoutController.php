<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\Library\MCart;
use Illuminate\Http\Request;
use App\City;
use App\Country;
use App\Product;
use App\Province;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Exception;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! Auth::check()) {
            return redirect()->route('login', ['redirect' => 'checkout']);
        }

        if(MCart::count() == 0) {
            return redirect()->route('shop.index');
        }

        $countries = Country::pluck('name', 'id');

        $provinces = Province::pluck('name', 'id');

        $cities = City::pluck('name', 'id');

        return view('checkout.index', compact(['countries', 'provinces', 'cities']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(! Auth::check()) {
            return redirect('/login');
        }

        if(MCart::count() == 0) {
            return redirect()->route('shop.index');
        }

        if($this->productsNotAvailable()) {
            return back()->with('error', 'Sorry! One of the items in your cart is no longer available.');
        }

        $data = $request->validate([
            'billing_name' => 'required',
            'billing_email' => ['required', 'email'],
            'billing_postalcode' => ['required', 'integer'],
            'billing_province' => 'required',
            'billing_city' => 'required',
            'billing_address' => 'required',
            'shipping_address' => 'required',
            'billing_phone' => ['required'],
            'payment_method' => ['required']
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['billing_subtotal'] = MCart::total();
        $data['shipping_charges'] = 200;
        $data['billing_total'] = MCart::total() + 200;
        
        if($data['payment_method'] == 'Stripe') {
            try {
                $contents = collect(MCart::content())->map(function($item) {
                    return $item['slug'] . ', ' . $item['qty']; 
                })->values()->toJson();
    
                $charge = Stripe::charges()->create([
                    'amount' => $data['billing_total'],
                    'currency' => 'PKR',
                    'source' => $request->stripeToken,
                    'description' => 'Order',
                    'receipt_email' => $data['billing_email'],
                    'metadata' => [
                        'contents' => $contents,
                        'quantity' => MCart::count(),
                    ],
                ]);
    
            } catch (Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }

        $order = Order::create($data);
       
        foreach(MCart::content() as $item) {
            OrderProduct::create([
                'seller_id' => $item['seller_id'],
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['qty']
            ]);
        }

        $this->decreaseQuantities();

        MCart::destroy();

        return redirect()->route('pages.message')->with('message', 'Thank you! Your order has been successfully placed!');

    }

    private function decreaseQuantities() {
        foreach(MCart::content() as $item) {
            $product = Product::find($item['id']);

            $product->quantity = $product->quantity - $item['qty'];
            $product->save();
        }
    }

    private function productsNotAvailable() 
    {
        foreach(MCart::content() as $item) {
            $product = Product::find($item['id']);
            if($product->quantity < $item['qty']) {
                return true;
            }

            return false;
        }
    }
}
