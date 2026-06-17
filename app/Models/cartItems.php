<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cartItems extends Model
{
    //
    protected $guarded = ['id'];
    public function cart(){
        return $this->belongsTo(Carts::class);
    }
    public function product(){
        return $this->belongsTo(Products::class);
    }
}
