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
            'password' => Hash::make('@dm1n'),
        ]);
        $user->assignRole(1);
        User::factory(500)->create()->each(function ($item, $key) {
            $item->assignRole(2);
        });
    }
}
