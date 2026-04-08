<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
<<<<<<< HEAD
<<<<<<< HEAD
            'email' => 'butomo@prakarsarecycling.com',
            'name' => 'Budi Utomo',
            'password' => Hash::make('123456'),
            'status' => 'aktif',
            'role' => 'trainer',
            'pin' => '3188',
=======
            'email' => 'qc@prakarsarecycling.com',
            'name' => 'QC',
            'password' => Hash::make('123456'),
            'status' => 'aktif',
            'role' => 'qc',
            'pin' => '3107',
>>>>>>> 70f3fdfbd8fb118defd9d3992be31921eace02c6
=======
            'email' => 'nonstock@pradha.co.id',
            'name' => 'Non Stock',
            'password' => Hash::make('123456789'),
            'status' => 'aktif',
            'role' => 'qc',
            'pin' => '9001',
>>>>>>> b06b241449db325b24850c5c2c4580beec9059c1
        ]);
    }
}
