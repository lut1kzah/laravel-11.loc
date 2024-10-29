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
}
