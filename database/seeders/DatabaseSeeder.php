<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        DB::table('application')->insert([
            'name_application' => 'wau',
            'usercreate_application' => '1',

        ]);

        DB::table('company')->insert([
            'kode_company' => 'wau',
            'name_company' => 'minidev',
            'address_company' => 'gresik',
            'telp_company' => '08',
            'email_company' => 'adminwau@admin.co.id',
            'usercreate_company' => '1',

        ]);

        DB::table('role')->insert([
            'id_application' => '1',
            'id_company' => '1',
            'name_role' => 'superadmin',
            'usercreate_role' => '1',
        ]);

        DB::table('user')->insert([
            'username_user' => 'adminwau',
            'password' => Hash::make('adminwau'),
            'name_user' => 'adminwau',
            'email_user' => 'adminwau@admin.co.id',
            'phonenumber_user' => '08',
            'status_user' => '1',
            'usercreate_user' => '1',
        ]);

        DB::table('user_role')->insert([
            'id_user' => '1',
            'id_role' => '1',
            'usercreate_userrole' => '1',
        ]);
    }
}
