<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::where('code', 'admin')->first();
        $role_user = Role::where('code', 'user')->first();
        User::create([
            'surname' => 'Евсеев',
            'name' => 'Дмитрий',
            'patronymic' => 'Витальевич',
            'sex' => 1,
            'birth_date' => '2005-11-04',
            'avatar' => null,
            //'tel' => '+79521641903',
            //'login' => 'krofpoi',
            'email' => 'dima112831@gmail.com',
            'password' => 'krofpoi',
            'api_token' => null,
            'role_id' => $role_admin->id,
        ]);
        User::create([
            'surname' => 'Мотов',
            'name' => 'Алибала',
            'patronymic' => 'Эльманович',
            'sex' => 1,
            'birth_date' => '2005-01-27',
            'avatar' => null,
            //'tel' => '+79528997595',
            //'login' => 'noway',
            'email' => 'unilajar@gmail.com',
            'password' => 'noway',
            'api_token' => null,
            'role_id' => $role_user->id,
        ]);
    }
}
