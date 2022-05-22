<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeleksiMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seleksi_mahasiswa', function (Blueprint $table) {
            $table->increments('id_penilaian');
            $table->year('tahun_akademik');
            $table->string('jml_calon_mhs');
            $table->string('jml_calon_mhs_baru');
            $table->string('jml_calon_mhs_aktif');
            $table->string('daya_tampung');
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
        Schema::dropIfExists('seleksi_mahasiswa');
    }
}
