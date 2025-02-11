<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $role_admin = Role::where('code', 'admin')->first();
        $role_user = Role::where('code', 'user')->first();
        $role_manager = Role::where('code', 'user')->first();
        User::create([
            'surname' => 'Франк',
            'name' => 'Артур',
            'patronymic' => 'Эдуардович',
            'sex'=> 0,
            'birth_date'=> '1996-01-07',
            'avatar' => null,
            'email' => 'balbesss@mail.ru',
            'password' => 'noway',
            'api_token' => null,
            'role_id' => $role_admin->id ,
        ]);
        User::create([
            'surname' => 'Елезов',
            'name' => 'Максик',
            'patronymic' => 'Анатольевич',
            'sex'=> 1,
            'birth_date'=> '1996-01-07',
            'avatar' => null,
            'email' => 'balda@mail.ru',
            'password' => 'noway',
            'api_token' => null,
            'role_id' => $role_user->id ,
            ]);
        User::create([
            'surname' => 'Попик',
            'name' => 'Мопсик',
            'patronymic' => 'Анатольевич',
            'sex'=> 1,
            'birth_date'=> '1996-01-07',
            'avatar' => null,
            'email' => 'baldarez@mail.ru',
            'password' => 'noway',
            'api_token' => null,
            'role_id' => $role_manager->id ,
            'nickname' => 'sousegeone',
        ]);
    }
}
