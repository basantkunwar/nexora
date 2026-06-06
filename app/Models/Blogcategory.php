<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogcategory extends Model
{
    //
    protected $guarded = ['id'];
    public function blog(){
        return $this->hasMany(Blog::class);
    }
}
