<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\City;
use App\Country;
use App\Province;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Cart::instance('default')->count() == 0) {
            return redirect()->route('shop.index');
        }

        $countries = Country::pluck('name', 'id');

        $provinces = Province::pluck('name', 'id');

        $cities = City::pluck('name', 'id');

        return view('checkout.index', compact(['countries', 'provinces', 'cities']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Cart::instance('default')->count() == 0) {
            return redirect()->route('shop.index');
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
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['billing_subtotal'] = Cart::subtotal();
        $data['shipping_charges'] = 200;
        $data['billing_total'] = Cart::total() + 200;

        $order = Order::create($data);

        foreach(Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty
            ]);
        }

        Cart::instance('default')->destroy();

        return redirect()->route('pages.message')->with('message', 'Thank you! Your order has been successfully placed!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
