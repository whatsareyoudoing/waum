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

        Schema::create('attempt', function (Blueprint $table) {
            $table->increments('id_attempt');
            $table->unsignedInteger('id_user');
            $table->integer('total_attempt')->default(0);
            $table->integer('blocked_attempt')->default(0);
            $table->dateTime('lastlogin_attempt');
            $table->dateTime('lastlogout_attempt');
            $table->integer('usercreate_attempt');
            $table->integer('userupdate_attempt')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attempt');
    }
};
