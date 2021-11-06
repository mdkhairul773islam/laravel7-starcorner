<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'purchase_price', 'sale_price', 'unit_id'];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id')->select('id', 'name');
    }

    public function subcategory()
    {
        return $this->hasOne(Subcategory::class, 'id', 'subcategory_id')->select('id', 'name');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id')->select('id', 'name');
    }

    public function unit()
    {
        return $this->hasOne(Unit::class, 'id', 'unit_id')->select('id', 'unit');
    }
}


