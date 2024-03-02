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

        Schema::create('user_role', function (Blueprint $table) {
            $table->increments('id_userrole');
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('user');
            $table->unsignedInteger('id_role');
            $table->foreign('id_role')->references('id_role')->on('role');
            $table->integer('usercreate_userrole');
            $table->integer('userupdate_userrole')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_role');
    }
};
