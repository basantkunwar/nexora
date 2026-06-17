<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    //
    protected $guarded = ['id'];
    public function users(){
      return  $this->belongsTo(User::class);
    }
    public function cartItems(){
        return $this->hasMany(cartItems::class);
    }
}
