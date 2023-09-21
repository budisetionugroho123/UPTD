<?php

use App\Models\Pengujian;
use App\Models\Pesanan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pesanan::class)->references('id')->on('pesanan')->cascadeOnDelete();
            $table->foreignIdFor(Pengujian::class)->references('id')->on('pengujian')->cascadeOnDelete();
            $table->integer('id_penguji')->nullable();
            $table->string('nama_pengujian');
            $table->string('satuan')->nullable();
            $table->float('hasi_uji')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('analisis');
    }
}
