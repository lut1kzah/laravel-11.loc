<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Указываем поля таблицы (без поля id, created_at и updated_at)
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id'
    ];

    // Связь с таблицей Categories M:1
    public function category() {
        return $this->belongsTo(Category::class);
    }
    // Связь с таблицей Photos 1:M
    public function photos() {
        return $this->hasMany(Photo::class);
    }
}
