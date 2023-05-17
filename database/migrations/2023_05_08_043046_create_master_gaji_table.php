<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterGajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_gaji', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('absensi_id');
            $table->string('nm_karyawan', 50);
            $table->string('jabatan', 50);
            $table->string('total_gaji', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_gaji');
    }
}
