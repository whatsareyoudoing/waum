<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('user', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('username_user');
            $table->string('password_user');
            $table->string('name_user');
            $table->string('email_user');
            $table->text('address_user')->nullable();
            $table->string('phonenumber_user');
            $table->integer('status_user');
            $table->integer('usercreate_user');
            $table->integer('userupdate_user')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
