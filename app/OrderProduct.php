<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';
    
    protected $fillable = ['order_id', 'product_id', 'quantity', 'seller_id'];

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function order() {
        return $this->belongsTo('App\Order');
    }

    public function seller() {
        return $this->belongsTo('App\User', 'seller_id');
    }
}
