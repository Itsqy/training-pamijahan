<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->Increments('id');
            //unsigned agar angka dimulai dari 1
            $table->integer('id_jabatan')->unsigned();
            $table->string('nama_karyawan');
            // enum : bisa lebih dari 3 tapimilih nya ttp 1 aja , jadi pilihannya lebih banyak dari boolean
            $table->enum('status', ['tetap', 'magang', 'kontrak']);
            $table->date('tanggal_masuk');
            $table->string('nomor_hp')->unique();
            $table->string('username')->unique();
            $table->string('password');
            //cascade agar ketika si tabel dihapus maka tabel yang berelasi tidak akan ikut terhapus
            $table->foreign('id_jabatan')->references('id')->on('jabatan')->onDelete('cascade');
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
        Schema::dropIfExists('karyawan');
    }
}
