<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'content',
        'price',
        'discount',
        'product_avatar',
        'product_vartar_path'
    ];
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
