<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Указываем поля таблицы (без поля id, created_at и updated_at)
    protected $fillable = [
        'name',
        'code'
    ];

    // Связь с таблицей Users 1:M
    public function users() {
        return $this->hasMany(User::class);
    }
}
