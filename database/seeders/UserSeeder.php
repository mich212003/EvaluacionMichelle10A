<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super = Role::firstOrCreate(['name' => 'super_admin']);

        $sa = User::firstOrCreate(
            ['email' => 'sa@example.com'],
            [
                'name' => 'sa',
                'password' => Hash::make('12345678'),
                'role_id' => $super->id,
            ]
            );

            $adminRole = Role::where('name','admin')->first();
        if ($adminRole) {
            User::firstOrCreate(
                ['email' => 'admin@example.com'],
                [
                    'name' => 'Administrador',
                    'password' => Hash::make('admin123'),
                    'role_id' => $adminRole->id,
                ]
            );
        }
    }
}
