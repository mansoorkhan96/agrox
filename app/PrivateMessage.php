<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivateMessage extends Model
{
    protected $table = 'private_messages';
    
    protected $guarded = [];

    public function from() {
        return $this->belongsTo('App\User', 'from');
    }

    public function to() {
        return $this->belongsTo('App\User', 'to');
    }

    public function consultancies() {
        return $this->belongsTo('App\Consultancy');
    }
}
