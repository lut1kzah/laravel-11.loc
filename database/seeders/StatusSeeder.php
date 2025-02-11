<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'name' => 'Новый заказ',
            'code' => 'new',
            ]);
        Status::create([
            'name' => 'В сборке',
            'code' => 'assembled',
        ]);
        Status::create([
            'name' => 'Передается в доставку',
            'code' => 'transmitted',
        ]);
        Status::create([
            'name' => 'В пути',
            'code' => 'In Way',
        ]);
        Status::create([
            'name' => 'Доставлено',
            'code' => 'delivered',
        ]);
        Status::create([
            'name' => 'Получено',
            'code' => 'taked',
        ]);
        Status::create([
            'name' => 'Отменен',
            'code' => 'cancelled',
        ]);
    }



}
