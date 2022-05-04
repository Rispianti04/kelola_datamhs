<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaAsingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa_asing', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_mhs');
            $table->string('npm_mhs')->unique();
            $table->foreignId('id_jurusan');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password_mhs');
            $table->string('tahun_masuk');
            $table->unsignedBigInteger('roles_id');
            $table->rememberToken();
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
        Schema::dropIfExists('mahasiswa_asing');
    }
}
