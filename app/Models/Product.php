<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'description', 'image', 'quantity', 'slug'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
