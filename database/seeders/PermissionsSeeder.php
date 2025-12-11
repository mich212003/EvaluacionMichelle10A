<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $perms = [
            'ver_usuarios',
            'ver_roles',
            'ver_permisos',

            'crear_usuario',
            'crear_role',
            'crear_permiso',

            'editar_usuario',
            'editar_role',
            'editar_permiso',

            'eliminar_usuario',
            'eliminar_role',
            'eliminar_permiso',
        ];

        foreach ($perms as $p) {
            Permission::firstOrCreate(['name' => $p]);
        }
    }
}