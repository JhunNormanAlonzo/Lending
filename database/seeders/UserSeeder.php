<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        $user = User::create([
            'name' => 'Jhun Norman Alonzo',
            'email' => 'alonzojhunnorman@gmail.com',
            'password' => bcrypt('admin123')
        ]);

        $user->assignRole('super-admin');



    }
}
