<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

class BarbershopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('application')->insert([
            'name_application' => 'barbershop',
            'usercreate_application' => '1',

        ]);

        DB::table('role')->insert([
            'id_application' => '2',
            'id_company' => '1',
            'name_role' => 'pelanggan',
            'usercreate_role' => '1',
        ]);

        DB::table('user')->insert([
            'username_user' => 'adminbarbershop',
            'password_user' => Hash::make('adminbarbershop'),
            'name_user' => 'adminbarbershop',
            'email_user' => 'adminbarbershop@admin.co.id',
            'phonenumber_user' => '08',
            'status_user' => '1',
            'usercreate_user' => '1',
        ]);
    }
}
