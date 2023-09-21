<?php

use App\Models\Layanan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengujianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengujian', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignIdFor(Layanan::class)->references('id')->on('layanan')->cascadeOnDelete();
            $table->string('nama_pengujian');
            $table->string('jenis_parameter');
            $table->string('satuan')->nullable();
            $table->string('metode')->nullable();
            $table->string('baku_mutu')->nullable();
            $table->string('acuan_metoda_pengujian');
            $table->float('tarif');
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
        Schema::dropIfExists('pengujian');
    }
}
