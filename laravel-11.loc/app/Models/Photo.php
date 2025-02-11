<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // Указываем поля таблицы (без поля id, created_at и updated_at)
    protected $fillable = [
        'path',
        'product_id',
    ];
    // Связь с таблицей Products M:1
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
