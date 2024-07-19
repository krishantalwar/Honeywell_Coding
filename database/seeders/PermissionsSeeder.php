<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash; // <-- import it at the top


class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permission = Permission::create(['name' => 'productAdd']);
        $permission = Permission::create(['name' => 'orderDetail']);
        $permission = Permission::create(['name' => 'productList']);
        $permission = Permission::create(['name' => 'checkout']);


        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo('productAdd');
        $roleAdmin->givePermissionTo('orderDetail');


        $roleCustomer = Role::create(['name' => 'customer']);
        $roleCustomer->givePermissionTo('productList');
        $roleCustomer->givePermissionTo('checkout');

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' =>  Hash::make('admin'),
        ]);
        $user->assignRole($roleAdmin);

        $user = \App\Models\User::factory()->create([
            'name' => 'Customer User',
            'email' => 'customer@gmail.com',
            'password' =>  Hash::make('customer'),
        ]);
        $user->assignRole($roleCustomer);
    }
}