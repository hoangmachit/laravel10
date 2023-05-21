<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserSeeder extends Seeder
{
    public const roles = [
        'Supper',
        'Admin',
        'Write',
        'Editor',
        'View'
    ];
    public const permissions = [
        'user',
        'user_list',
        'user_create',
        'user_update',
        'user_delete',
        'role',
        'role_list',
        'role_create',
        'role_update',
        'role_delete',
        'permission',
        'permission_list',
        'permission_create',
        'permission_update',
        'permission_delete'
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role
        $this->createRole();
        // Permission
        $this->createPermission();
        // User
        $this->createUser();
        //User Role Permisson 
        $this->createUserRolePermisson();
    }
    private function createRole()
    {
        foreach (self::roles as $key => $role) {
            Role::create(['name' => $role]);
        }
    }
    private function createPermission()
    {
        foreach (self::permissions as $key => $permission) {
            Permission::create(['name' => $permission]);
        }
    }
    private function createUser()
    {
        $users = [
            [
                'name' => 'User 01',
                'email' => 'user01@gmail.com',
                'password' => bcrypt('user01')
            ],
            [
                'name' => 'User 02',
                'email' => 'user02@gmail.com',
                'password' => bcrypt('user02')
            ],
            [
                'name' => 'User 03',
                'email' => 'user03@gmail.com',
                'password' => bcrypt('user03')
            ]
        ];
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
    private function createUserRolePermisson()
    {
        $user01 = User::whereEmail('user01@gmail.com')->first();
        $user02 = User::whereEmail('user02@gmail.com')->first();
        $user03 = User::whereEmail('user03@gmail.com')->first();

        $role01 = Role::whereName('Supper')->first();
        $role02 = Role::whereName('Admin')->first();
        $role03 = Role::whereName('Write')->first();
        $role04 = Role::whereName('Editor')->first();
        $role05 = Role::whereName('View')->first();
        $permisson1 = Permission::whereName('user')->first();
        $permisson2 = Permission::whereName('user_list')->first();
        $permisson3 = Permission::whereName('user_create')->first();
        $permisson4 = Permission::whereName('user_update')->first();
        $permisson5 = Permission::whereName('user_delete')->first();
        $permisson6 = Permission::whereName('role')->first();
        $permisson7 = Permission::whereName('role_list')->first();
        $permisson8 = Permission::whereName('role_create')->first();
        $permisson9 = Permission::whereName('role_update')->first();
        $permisson10 = Permission::whereName('role_delete')->first();
        $permisson11 = Permission::whereName('permission')->first();
        $permisson12 = Permission::whereName('permission_list')->first();
        $permisson13 = Permission::whereName('permission_create')->first();
        $permisson14 = Permission::whereName('permission_update')->first();
        $permisson15 = Permission::whereName('permission_delete')->first();

        $role01->givePermissionTo($permisson1);
        $role01->givePermissionTo($permisson2);
        $role01->givePermissionTo($permisson3);
        $role01->givePermissionTo($permisson4);
        $role01->givePermissionTo($permisson5);
        $role01->givePermissionTo($permisson6);
        $role01->givePermissionTo($permisson7);
        $role01->givePermissionTo($permisson8);
        $role01->givePermissionTo($permisson9);
        $role01->givePermissionTo($permisson10);
        $role01->givePermissionTo($permisson11);
        $role01->givePermissionTo($permisson12);
        $role01->givePermissionTo($permisson13);
        $role01->givePermissionTo($permisson14);
        $role01->givePermissionTo($permisson15);
        $user01->assignRole($role01);

        $role02->givePermissionTo($permisson7);
        $role02->givePermissionTo($permisson8);
        $role02->givePermissionTo($permisson9);
        $role02->givePermissionTo($permisson10);
        $role01->givePermissionTo($permisson14);
        $role01->givePermissionTo($permisson15);
        $user02->assignRole($role02);


        $role03->givePermissionTo($permisson1);
        $role03->givePermissionTo($permisson2);
        $role03->givePermissionTo($permisson3);
        $role03->givePermissionTo($permisson4);
        $role03->givePermissionTo($permisson5);
        $role03->givePermissionTo($permisson6);
        $role03->givePermissionTo($permisson7);
        $role03->givePermissionTo($permisson8);
        $role03->givePermissionTo($permisson9);
        $role03->givePermissionTo($permisson10);
        $user03->assignRole($role03);
    }
}