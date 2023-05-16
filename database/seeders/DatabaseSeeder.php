<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   public function run()
    {
        // \App\Models\User::factory(10)->create();
        $admin_role = Role::create(['name' => 'admin']);
        
$permissions = [
    //Permission::create(['name' => 'manage plans']),
    Permission::create(['name' => 'manage users']),
    //Permission::create(['name' => 'manage transactions']),
    //Permission::create(['name' => 'manage properties']),
   // Permission::create(['name' => 'manage contactform']),
    Permission::create(['name' => 'manage admin']),
];
       
foreach ($permissions as $permission) {
    $admin_role->givePermissionTo($permission);
}
        
        $admin = User::create([
            'name' => 'Admin',
             'lastname' => 'Admin',
             'dni' => '00000',
             'phone' => '00000',
            'email' => 'aiosrealestate2023@gmail.com',
            'address' => 'my address',
             'city' => 'my city',
            'province' => 'my province',
            'zipcode' => 'my zipcode',
            'password' => bcrypt('aios2023=')
        ]);

        $admin->assignRole($admin_role);



        $user_role = Role::create(['name' => 'user']);
        $user = User::create([
            'name' => 'user',
            'lastname' => 'user',
            'dni' => '00000',
            'phone' => '00000',
            'email' => 'argenis692@gmail.com',
            'address' => 'my address',
            'city' => 'my city',
            'province' => 'my province',
            'zipcode' => 'my zipcode',
            'password' => bcrypt('password')
        ]);

        $user->assignRole($user_role);

        // $permission = Permission::create(['name' => 'edit articles']);

        
    }
}
