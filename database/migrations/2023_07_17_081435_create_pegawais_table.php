<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('negara_id')->constrained('negara')->onDelete('cascade');
            $table->foreignId('provinsi_id')->constrained('provinsi')->onDelete('cascade');
            $table->foreignId('kota_id')->constrained('kota')->onDelete('cascade');
            $table->foreignId('departemen_id')->constrained('departemen')->onDelete('cascade');
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('alamat');
            $table->char('kode_pos');
            $table->date('tanggal_lahir');
            $table->date('tanggal_masuk');
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
        Schema::dropIfExists('pegawais');
    }
}
