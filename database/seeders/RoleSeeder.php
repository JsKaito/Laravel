<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear permisos
        $permissions = [
            'crear-clientes',
            'editar-clientes',
            'eliminar-clientes',
            'ver-clientes',
            'crear-productos',
            'editar-productos',
            'eliminar-productos',
            'ver-productos',
            'crear-categorias',
            'editar-categorias',
            'eliminar-categorias',
            'ver-categorias',
            'crear-ordenes',
            'editar-ordenes',
            'eliminar-ordenes',
            'ver-ordenes',
            'crear-proveedores',
            'editar-proveedores',
            'eliminar-proveedores',
            'ver-proveedores',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Crear rol Admin con todos los permisos
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $adminRole->syncPermissions($permissions);

        // Crear rol Usuario con permisos de crear, editar y ver (sin eliminar)
        $userRole = Role::firstOrCreate(['name' => 'Usuario']);
        $userRole->syncPermissions([
            'crear-clientes',
            'editar-clientes',
            'ver-clientes',
            'crear-productos',
            'editar-productos',
            'ver-productos',
            'crear-categorias',
            'editar-categorias',
            'ver-categorias',
            'crear-ordenes',
            'editar-ordenes',
            'ver-ordenes',
            'crear-proveedores',
            'editar-proveedores',
            'ver-proveedores',
        ]);

        // Crear usuario Admin por defecto
        $admin = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('admin123'),
            ]
        );
        $admin->assignRole('Admin');

        // Crear usuario normal por defecto
        $usuario = User::firstOrCreate(
            ['email' => 'usuario@usuario.com'],
            [
                'name' => 'Usuario Normal',
                'password' => Hash::make('usuario123'),
            ]
        );
        $usuario->assignRole('Usuario');
    }
}
