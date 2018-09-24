<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $admin_role = Role::create(['name' => 'admin']);
        $merchant_role = Role::create(['name' => 'merchant']);

        //for super admin
        $admin = factory(User::class)->create([
                    'name' => 'Super Admin',
                    'email' => 'admin@admin.com',
                    'password' => Hash::make('adminadmin'),
                    'slug' => str_slug('Super Admin')
                 ]);
        $admin->assignRole($admin_role );

        //for merchant
        $merchant = factory(User::class)->create([
                        'name' => 'Merchant User',
                        'email' => 'merchant@merchant.com',
                        'password' => Hash::make('merchantmerchant'),
                        'slug' => str_slug('Merchant User')
                    ]);
        $merchant->assignRole($merchant_role );

        for($i=0; $i<30; $i++) {
            $merchant = factory(User::class)->create();
            $merchant->assignRole($merchant_role );
        }


        //for user
        factory(User::class, 60)->create();
    }
}
