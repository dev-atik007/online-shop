<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id','id');
    }
    public function categoryCount() {
        return $this->hasMany(Product::class, 'product_category', 'id');
    }
   
}
