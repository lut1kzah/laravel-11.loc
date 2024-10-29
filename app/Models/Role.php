<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //Поля таблицы(!= id created_at/updated_at)
    protected $fillable = ['name','code'];
    //связь с Users 1:M
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
