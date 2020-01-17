<?php

namespace App\Library;

use Illuminate\Support\Facades\Session;

class MCart {

    /**
     * Add items to the cart if does not exits
     *
     * @param [int] $id
     * @param [string] $image
     * @param [string] $name
     * @param [string] $details
     * @param [integer] $qty
     * @param [integer] $price
     * @param [string] $slug
     * 
     * @return boolean true if item successfully added to the cart, false otherwise.
     */
    public static function add($id, $image, $name, $details, int $qty, int $price, $slug): bool {
        if(self::exists($id)) {
            return false;
        }

        $storeItem = [
            'rowId' => self::uniqueId(),
            'id' => $id,
            'image' => $image,
            'name' => $name,
            'details' => $details,
            'qty' => (int)$qty,
            'price' => $price,
            'slug' => $slug
        ];
        
        if(self::store($storeItem)) {
            return true;
        }
    }

    /**
     * Get cart contents
     *
     * @return array of cart items if items exist in the cart, empty array otherwise.
     */
    public static function content():array {
        if(session()->has('mcart')) {
            return session()->get('mcart');
        }

        return [];
    }

    /**
     * Get count of items for current cart session.
     *
     * @return integer items count, 0 otherwise.
     */
    public static function count():integer {
        $count = 0;

        if(self::content() > 0) {
            foreach(self::content() as $item) {
                $count += $item['qty'];
            }
        }

        return $count;
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
        $updattion = false;
        $items = [];

        foreach(self::content() as $item) {

            if($item['rowId'] === $rowId) {
                $item[$name] = $value;
                $updattion = true;
            }

            $items[] = $item;
        }

        if($updattion) {
            session()->put('mcart', $items);
            session()->save();
        }

        return $updattion;
    }

    /**
     * Removes an specific cart item.
     *
     * @param [string] $rowId
     * @return boolean true on success, false otherwise.
     */
    public static function remove($rowId):bool {
        $items = [];
        $deletion = false;

        foreach(self::content() as $item) {
            if($item['rowId'] === $rowId) {
                unset($item);
                $deletion = true;
                continue;
            }
            
            $items[] = $item;
        }

        
        if(! empty($items)) {
            session()->put('mcart', $items);
            session()->save();
        } else {
            session()->put('mcart', null);
            session()->save();
        }

        return $deletion;
    }

    /**
     * Destroy cart items
     *
     * @return void
     */
    public static function destroy() {
        session()->forget('mcart');
        session()->save();
    }

    /**
     * Get total price of cart items
     *
     * @return integer price if cart items exist, 0 otherwise
     */
    public static function total():int {
        $total = 0;
        foreach(self::content() as $item) {
            $total += ($item['price'] * $item['qty']);
        }

        return $total;
    }

    /**
     * Store cart item
     *
     * @param [array] $storeItem
     * @return boolean true on success, false otherwise
     */
    private static function store($storeItem):bool {
        $items = [];

        if(session()->has('mcart')) {

            $items = session()->get('mcart');
            
            array_push($items, $storeItem);
            
            session()->put('mcart', $items);
            session()->save();
        } else {

            $items[] = $storeItem;
            session()->put('mcart', $items);
            session()->save();
              
        }

        return true;
    }

    /**
     * Checks if an item already exists in the cart
     *
     * @param [int] $id
     * @return boolean true if item exists, false otherwise.
     */
    private static function exists($id):bool {
        
        if(session()->has('mcart')) {

            foreach(session()->get('mcart') as $item) {
                
                if($item['id'] == $id) {
                    return true;
                }
            }

            return false;
        }
    }

    /**
     * Generate a unique hash (sha256)
     *
     * @return string hash
     */
    private static function uniqueId() {
        return hash('sha256', uniqid());
    }
}