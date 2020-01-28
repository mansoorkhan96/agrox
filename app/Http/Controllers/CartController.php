<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\MCart;
use App\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buy(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'seller_id' => 'required',
            'image' => 'required',
            'name' => 'required',
            'details' => 'required',
            'price' => 'required',
            'slug' => 'required',
        ]);

        $added = MCart::add(
            $request->id,
            $request->seller_id,
            $request->image,
            $request->name,
            $request->details,
            1,
            $request->price,
            $request->slug
        );
        
        if($added) {
            return redirect('/checkout')->with('success', 'Item was added to cart!');
        }

        return redirect('/checkout')->with('success', 'Item is already in your cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'seller_id' => 'required',
            'image' => 'required',
            'name' => 'required',
            'details' => 'required',
            'price' => 'required',
            'slug' => 'required',
        ]);
        
        $added = MCart::add(
            $request->id,
            $request->seller_id,
            $request->image,
            $request->name,
            $request->details,
            1,
            $request->price,
            $request->slug
        );
        
        if($added) {
            return redirect('/cart')->with('success', 'Item was added to cart!');
        }

        return redirect('/cart')->with('success', 'Item is already in your cart');
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
        $productQuantity = Product::findOrfail($request->productId)->quantity;
        
        if($request->quantity < 1) {
            return response()->json(['status' => false, 'message' => 'Bad Request']);
        }

        if($productQuantity < $request->quantity) {
            return response()->json(['status' => false, 'message' => 'We currently do not have enough items in stock']);
        } else {
            MCart::update($id, 'qty', (int)$request->quantity);
    
            return response()->json(['status' => true, 'quantity' => $request->quantity]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MCart::remove($id);

        return back()->with('success', 'Item has been removed!');
    }
}
