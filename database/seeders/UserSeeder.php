<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@facturacion.test',
            'password' => Hash::make('@dm1n123'),
        ]);
        $user->assignRole(1);

        $user = User::create([
            'name' => 'Pedro Arredondo',
            'email' => 'pedro@facturacion.test',
            'password' => Hash::make('@pedro123'),
        ]);
        $user->assignRole(2);

        User::factory(500)->create()->each(function ($item, $key) {
            $item->assignRole(2);
        });
    }
}
