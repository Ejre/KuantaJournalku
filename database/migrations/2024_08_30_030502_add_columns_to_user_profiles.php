<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('user_profiles', function (Blueprint $table) {
        $table->string('nama_panggilan')->nullable();
        $table->string('nomor_wa')->nullable();
    });
}

public function down()
{
    Schema::table('user_profiles', function (Blueprint $table) {
        $table->dropColumn('nama_panggilan');
        $table->dropColumn('nomor_wa');
    });
}

};
