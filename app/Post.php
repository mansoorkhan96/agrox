<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Model
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
            'posts.title' => 10,
            'posts.excerpt' => 5,
            'posts.body' => 2,
        ],
    ];

    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function categories() {
        return $this->belongsToMany('App\Category');
    }

    public function userRating() {
        return $this->hasMany(Rating::class)->where('user_id', auth()->user()->id);
    }

    public function ratings() {
        return $this->hasMany('App\Rating');
    }

    public function discussions() {
        return $this->hasMany('App\Discussion');
    }
}
