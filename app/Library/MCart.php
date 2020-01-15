<?php

namespace App\Library;

use Illuminate\Support\Facades\Session;

class MCart {
    // private $item = null;
    // private static $count = 0;
    // private static $total = 0;
    
    // public static function hello() {
    //     dd('class run');
    // }

    public static function add($id, $image, $name, $details, int $qty, $price, $slug) {
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

    public static function content() {
        if(session()->has('mcart')) {
            return session()->get('mcart');
        }

        return [];
    }

    public static function count() {
        $count = 0;

        if(self::content() > 0) {
            foreach(self::content() as $item) {
                $count += $item['qty'];
            }
        }

        return $count;
    }

    public static function update($rowId, $name, $value) {
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

    public static function remove($rowId) {
        // $item = array_map(function($item) use ($rowId) {
            
        //     if($item['rowId'] === $rowId) {
        //         return $item;
        //     }
            
        // }, session()->get('mcart'));

        // $item = array_filter(session()->get('mcart'), function($item) use ($rowId) {

        //     if($item['rowId'] === $rowId) {
        //         return $item;
        //     }
            
        // });

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

    public static function destroy() {
        session()->forget('mcart');
        session()->save();
    }

    public static function total() {
        $total = 0;
        foreach(self::content() as $item) {
            $total += ($item['price'] * $item['qty']);
        }

        return $total;
    }

    private static function store($storeItem) {
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

    private static function exists($id) {
        
        if(session()->has('mcart')) {

            foreach(session()->get('mcart') as $item) {
                
                if($item['id'] == $id) {
                    return true;
                }
            }

            return false;
        }
    }

    private static function uniqueId() {
        return hash('sha256', uniqid());
    }
}