<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanan', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('nama_layanan');
            $table->string('kode_sampel');
            $table->string('jenis_sampel');
            $table->string('acuan_pengambilan_sampel');
            $table->string('identitas_layanan');
            $table->boolean('antar_lab');
            $table->boolean('datang_ke_lokasi');
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
        Schema::dropIfExists('layanan');
    }
}