<?php

use App\Models\Layanan;
use App\Models\Pengujian;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->references('id')->on('users')->cascadeOnDelete();
            $table->foreignIdFor(Layanan::class)->references('id')->on('layanan')->cascadeOnDelete();
            $table->string('nama_perusahaan');
            $table->string('alamat_perusahaan');
            $table->string('telephone');
            $table->string('nama_pic');
            $table->string('no_pic');
            $table->string('email_pic');
            $table->string('jenis_layanan');
            $table->string('jenis_pesanan');
            $table->string('identitas_sampel')->nullable();
            $table->string('status_pesanan');
            $table->dateTime('tanggal_pengantaran')->nullable();
            $table->dateTime('tanggal_pengambilan')->nullable();
            $table->string('volume_uji_coba')->nullable();
            $table->string('alamat_pengambilan_sampel')->nullable();
            $table->float('total_harga', 8, 2)->nullable();
            $table->boolean('is_paid')->nullable();
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
        Schema::dropIfExists('pesanan');
    }
}
