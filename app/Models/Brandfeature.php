<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brandfeature extends Model
{
    //
    protected $guarded = ['id'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
