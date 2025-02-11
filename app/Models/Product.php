<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'quantity',
        'discount',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

}
