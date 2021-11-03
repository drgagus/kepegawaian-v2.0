<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->integer('nip')->nullable();
            $table->integer('pangkat')->nullable();
            $table->integer('jeniskelamin')->nullable();
            $table->integer('jabatan')->nullable();
            $table->integer('unitkerja')->nullable();
            $table->integer('pendidikan')->nullable();
            $table->integer('lahir')->nullable();
            $table->integer('nik')->nullable();
            $table->integer('nokk')->nullable();
            $table->integer('status')->nullable();
            $table->integer('alamat')->nullable();
            $table->integer('npwp')->nullable();
            $table->integer('bpjs')->nullable();
            $table->integer('kontak')->nullable();
            $table->integer('bank')->nullable();
            $table->integer('str')->nullable();
            $table->integer('sip')->nullable();
            $table->integer('pelatihan')->nullable();
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
        Schema::dropIfExists('guests');
    }
}
