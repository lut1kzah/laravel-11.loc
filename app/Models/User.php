<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    //Поля таблицы(!= id created_at/updated_at)
    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'sex',
        'birth_date',
        'avatar',
        'email',
        'password',
        'role_id',
        'api_token',
        'nickname',
        'phone',
    ];


    protected $hidden = [
        'password',
        'api_token',
    ];


    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
    //Roles M:1
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function adresses(){
        return $this->hasMany(Address::class);
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
