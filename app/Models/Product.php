<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function category()
    {
        return $this->belongsTo(Category::class, 'product_category','id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Category::class, 'product_sub_category','id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'product_brand', 'id');
    }
}
