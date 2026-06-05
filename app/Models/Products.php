<?php
namespace App\Models;
use App\Models\Category;
use App\Models\Brand;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $guarded = ['id'];    
    //
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
