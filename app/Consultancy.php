<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultancy extends Model
{
    protected $guarded = [];

    public function consultant() {
        return $this->belongsTo('App\User', 'consultant');
    }

    public function consumer() {
        return $this->belongsTo('App\User', 'consumer');
    }
}
