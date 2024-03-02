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

        Schema::create('role', function (Blueprint $table) {
            $table->increments('id_role');
            $table->unsignedInteger('id_application');
            $table->foreign('id_application')->references('id_application')->on('application');
            $table->unsignedInteger('id_company');
            $table->foreign('id_company')->references('id_company')->on('company');
            $table->string('name_role');
            $table->integer('usercreate_role');
            $table->integer('userupdate_role')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role');
    }
};
