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

        Schema::create('company', function (Blueprint $table) {
            $table->increments('id_company');
            $table->string('kode_company');
            $table->string('name_company');
            $table->string('address_company');
            $table->string('telp_company');
            $table->string('email_company');
            $table->integer('usercreate_company');
            $table->integer('userupdate_company')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company');
    }
};
