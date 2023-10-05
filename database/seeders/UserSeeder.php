<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::create([
            'uuid' => Str::uuid(),
            'name' => 'Manager Teknis Lab',
            'email' => 'budisetionugroho0001@gmail.com',
            'role' => 'manager_teknis',
            'password' => Hash::make('teknis123'),
            'no_hp' => '082283646581',
        ]);
        $role = [
            [
                'role' => 'manager_teknis',
                'label' => 'Manager Teknis'
            ],
            [
                'role' => 'supervisor',
                'label' => 'Supervisor'
            ],
            [
                'role' => 'analisis_lab',
                'label' => 'Analisis Laboratorium'
            ],
            [
                'role' => 'admin_frontoffice',
                'label' => 'Admin Front Office'
            ],
            [
                'role' => 'customer',
                'label' => 'Customer'
            ],
        ];
        foreach ($role as $r) {
            Role::create($r);
        }
    }
}
