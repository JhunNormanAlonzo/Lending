<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'name' => 'admin'
        ]);

        Position::create([
            'name' => 'area manager'
        ]);

        Position::create([
            'name' => 'manager'
        ]);

        Position::create([
            'name' => 'hr'
        ]);

        Position::create([
            'name' => 'cashier'
        ]);

        Position::create([
            'name' => 'auditor'
        ]);

        Position::create([
            'name' => 'loan officer'
        ]);
    }
}
