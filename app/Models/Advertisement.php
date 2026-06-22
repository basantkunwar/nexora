<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    //
    protected $guarded = ['id'];
    public function getUrlAttribute()
{
    switch ($this->link_type) {

        case 'product':
            return route('products.search', $this->link_id);

        case 'category':
            return route('frontend.category.index', $this->link_id);

        case 'brand':
            return route('frontend.brand.index', $this->link_id);

        default:
            return '#';
    }
}
}
