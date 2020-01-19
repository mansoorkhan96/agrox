<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SoftDeletes;
    
    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 10,
            'products.details' => 5,
            'products.description' => 2,
        ],
    ];
    
    protected $guarded = [];

    public function categories() {
        return $this->belongsToMany('App\Category');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function reviews() {
        return $this->hasMany('App\ProductReview');
    }

    public function userReview() {
        return $this->hasMany(ProductReview::class)->where('user_id', auth()->user()->id);
    }

    public function orders() {
        return $this->hasMany('App\OrderProduct');
    }

}