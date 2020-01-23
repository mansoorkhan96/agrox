<?php
namespace App\Library;

use App\Cart;

class DBCart implements ShoppingCart {
    public static function add($id, $seller_id, $image, $name, $details, int $qty, int $price, $slug) {
        $model = Cart::firstOrCreate(
            ['id' => $id, 'user_id' => auth()->user()->id],
            [
                'id' => $id,
                'seller_id' => $seller_id,
                'user_id' => auth()->user()->id,
                'image' => $image,
                'name' => $name,
                'details' => $details,
                'qty' => $qty,
                'price' => $price,
                'slug' => $slug
            ]
        );

        if($model->wasRecentlyCreated) {
            return true;
        }

        return false;
    }

    public static function update($rowId, $name, $value) {
        if(Cart::where('rowId', $rowId)->update([
            $name => $value
        ])) {
            return true;
        }

        return false;
    }

    public static function remove($rowId) {
        if(Cart::where('rowId', $rowId)->delete()) {
            return true;
        }

        return false;
    }

    public static function destroy() {
        Cart::where('user_id', auth()->user()->id)->delete();
    }

    /**
     * Get count of items for current cart session.
     *
     * @return int items count, 0 otherwise.
     */
    public static function count() {
        $count = 0;

        if(self::content() > 0) {
            foreach(self::content() as $item) {
                $count += $item['qty'];
            }
        }

        return $count;
    }

    /**
     * Get total price of cart items
     *
     * @return int price if cart items exist, 0 otherwise
     */
    public static function total() {
        $total = 0;
        foreach(self::content() as $item) {
            $total += ($item['price'] * $item['qty']);
        }

        return $total;
    }

    public static function content() {
        $items = Cart::where('user_id', auth()->user()->id)->get()->toArray();

        return $items;
    }
}