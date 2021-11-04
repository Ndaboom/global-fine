<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array([
            'name' => 'Josaphat Imani Nathan',
            'email' => 'josaphat.imani97@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'created_at' => now(),
        ], [
            'name' => 'Sammy Ndabo',
            'email' => 'samndabo@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'created_at' => now(),
        ], [
            'name' => 'Phineas',
            'email' => 'phineas@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'created_at' => now(),
        ]);

        $role = Role::create(['name' => 'Super Admin']);
        $roleAdmin = Role::create(['name' => 'Main Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        foreach ($users as $key => $data) {
            $user = User::create($data);
            if ($key == count($users) - 1) {
                $user->assignRole([$roleAdmin->id]);
            } else {
                $user->assignRole([$role->id]);
            }
        }
    }
}
