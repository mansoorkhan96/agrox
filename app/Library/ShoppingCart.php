<?php
namespace App\Library;

interface ShoppingCart {
    public static function add($id, $seller_id, $image, $name, $details, int $qty, int $price, $slug);

    public static function content();

    public static function count();

    public static function update($rowId, $name, $value);

    public static function remove($rowId);

    public static function destroy();

    public static function total();
}