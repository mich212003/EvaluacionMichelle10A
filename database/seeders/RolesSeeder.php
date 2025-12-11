<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permissions;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super = Role::firstOrCreate(['name' => 'super_admin']);
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $user  = Role::firstOrCreate(['name' => 'usuario']);
        $allPermissions = Permission::all();
$super->permissions()->sync($allPermissions->pluck('id')->toArray());
$admin->permissions()->sync($allPermissions->pluck('id')->toArray());
 $usuarioPerms = Permission::whereIn('name', ['ver_usuarios','ver_roles','ver_permisos'])->get();
        $user->permissions()->sync($usuarioPerms->pluck('id')->toArray());
    }
}
