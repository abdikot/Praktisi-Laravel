<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $fillable = [
        'name',
        'product_category_id',
        'unit',
        'minimal_stock',
        'maximal_stock',
        'stock',
        'selling_price',
        'purchase_price'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}