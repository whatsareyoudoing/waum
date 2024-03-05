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

        //role owner
            DB::table('role')->insert([
                'id_application' => '2',
                'id_company' => '1',
                'name_role' => 'owner',
                'usercreate_role' => '1',
            ]);

            DB::table('user')->insert([
                'username_user' => 'ownerbarbershop',
                'password' => Hash::make('ownerbarbershop'),
                'name_user' => 'ownerbarbershop',
                'email_user' => 'ownerbarbershop@barbershop.co.id',
                'phonenumber_user' => '08',
                'status_user' => '1',
                'usercreate_user' => '1',
            ]);

            DB::table('user_role')->insert([
                'id_user' => '2',
                'id_role' => '2',
                'usercreate_userrole' => '1',
            ]);
        //

        //role kasir
            DB::table('role')->insert([
                'id_application' => '2',
                'id_company' => '1',
                'name_role' => 'kasir',
                'usercreate_role' => '1',
            ]);

            DB::table('user')->insert([
                'username_user' => 'kasirbarbershop',
                'password' => Hash::make('kasirbarbershop'),
                'name_user' => 'kasirbarbershop',
                'email_user' => 'kasirbarbershop@barbershop.co.id',
                'phonenumber_user' => '08',
                'status_user' => '1',
                'usercreate_user' => '1',
            ]);

            DB::table('user_role')->insert([
                'id_user' => '3',
                'id_role' => '3',
                'usercreate_userrole' => '1',
            ]);
        //

        //role kasir
            DB::table('role')->insert([
                'id_application' => '2',
                'id_company' => '1',
                'name_role' => 'kasir',
                'usercreate_role' => '1',
            ]);

            DB::table('user')->insert([
                'username_user' => 'kasirbarbershop',
                'password' => Hash::make('kasirbarbershop'),
                'name_user' => 'kasirbarbershop',
                'email_user' => 'kasirbarbershop@barbershop.co.id',
                'phonenumber_user' => '08',
                'status_user' => '1',
                'usercreate_user' => '1',
            ]);

            DB::table('user_role')->insert([
                'id_user' => '3',
                'id_role' => '3',
                'usercreate_userrole' => '1',
            ]);
        //

        //role pelanggan
            DB::table('role')->insert([
                'id_application' => '2',
                'id_company' => '1',
                'name_role' => 'pelanggan',
                'usercreate_role' => '1',
            ]);

            DB::table('user')->insert([
                'username_user' => 'pelangganbarbershop',
                'password' => Hash::make('pelangganbarbershop'),
                'name_user' => 'pelangganbarbershop',
                'email_user' => 'pelangganbarbershop@barbershop.co.id',
                'phonenumber_user' => '08',
                'status_user' => '1',
                'usercreate_user' => '1',
            ]);

            DB::table('user_role')->insert([
                'id_user' => '4',
                'id_role' => '4',
                'usercreate_userrole' => '1',
            ]);
        //
    }
}
