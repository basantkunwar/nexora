<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $guarded = ['id'];
    public function blogcategory()
    {
       return $this->belongsTo(Blogcategory::class); 
    }
    public function blogtags()
    {
       return $this->belongsTo(Blogtags::class); 
    }
}
