<?php

namespace App\Library;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MCart implements ShoppingCart{

    /**
     * Add items to the cart if does not exits
     *
     * @param [int] $id
     * @param [string] $image
     * @param [string] $name
     * @param [string] $details
     * @param [int] $qty
     * @param [int] $price
     * @param [string] $slug
     * 
     * @return boolean true if item successfully added to the cart, false otherwise.
     */
    public static function add($id, $seller_id, $image, $name, $details, int $qty, int $price, $slug) {

        if(Auth::check()) {
            return DBCart::add($id, $seller_id, $image, $name, $details, $qty, $price, $slug);
        } else {
            return Cart::add($id, $seller_id, $image, $name, $details, $qty, $price, $slug);
        }

    }

    /**
     * Get cart contents
     *
     * @return array of cart items if items exist in the cart, empty array otherwise.
     */
    public static function content() {

        if(Auth::check()) {
            return DBCart::content();
        } else {
            return Cart::content();
        }
        
    }

    /**
     * Get count of items for current cart session.
     *
     * @return int items count, 0 otherwise.
     */
    public static function count() {
        if(Auth::check()) {
            return DBCart::count();
        } else {
            return Cart::count();
        }
    }

    /**
     * Update the specific cart item
     *
     * @param [string] $rowId
     * @param [string] $name
     * @param [mixed] $
     * 
     * @return boolean true on success, false otherwise.
     */
    public static function update($rowId, $name, $value):bool {
        if(Auth::check()) {
            return DBCart::update($rowId, $name, $value);
        } else {
            return Cart::update($rowId, $name, $value);
        }
    }

    /**
     * Removes an specific cart item.
     *
     * @param [string] $rowId
     * @return boolean true on success, false otherwise.
     */
    public static function remove($rowId) {
        if(Auth::check()) {
            return DBCart::remove($rowId);
        } else {
            return Cart::remove($rowId);
        }
    }

    /**
     * Destroy cart items
     *
     * @return void
     */
    public static function destroy() {
        if(Auth::check()) {
            DBCart::destroy();
        } else {
            Cart::destroy();
        }
    }

    /**
     * Get total price of cart items
     *
     * @return int price if cart items exist, 0 otherwise
     */
    public static function total() {
        if(Auth::check()) {
            return DBCart::total();
        } else {
            return Cart::total();
        }
    }
}