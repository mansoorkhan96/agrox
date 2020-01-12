<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('products')->latest()->get()->toArray();

        return view('orders.index', compact('orders'));
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
        //
    }

    /**
     * Display the specified order details.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $products = $order->products;
        $user = $order->user();

        return view('orders.show', compact(['order', 'products']));
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
    public function complete(Request $request, Order $order)
    {
        $order->status = 'Complete';
        $order->save();

        return back()->with('success', 'Order set to Complete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reject(Order $order)
    {
        $order->delete();
        
        return back()->with('success', 'Order Reject!');
    }

    public function rejected() {
        $orders = Order::onlyTrashed()->with('products')->get()->toArray();

        return view('orders.rejected', compact('orders'));
    }

    public function restore($id) {
        if($order = Order::onlyTrashed()->where('id', $id)) {
            $order->restore();

            return back()->with('success', 'Order restored successfully');
        }

        abort(419);
    }
}
