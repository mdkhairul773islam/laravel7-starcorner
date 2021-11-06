<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sapitem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['voucher_no', 'product_id', 'discount', 'total_bill', 'total_quantity', 'status'];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id')->select(['id', 'name', 'model', 'category_id', 'subcategory_id', 'brand_id', 'unit_id']);
    }
}
