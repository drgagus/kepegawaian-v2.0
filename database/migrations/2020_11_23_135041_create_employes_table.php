<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->integer('noduk')->nullable();
            $table->string('nama', 30);
            $table->string('nip', 30)->nullable();
            $table->string('golongan', 50)->nullable();
            $table->date('tmtgolongan')->nullable();
            $table->string('jeniskelamin', 15);
            $table->string('jabatan', 50);
            $table->string('statuskepegawaian', 20);
            $table->date('tmtjabatan')->nullable();
            $table->string('unitkerja', 50)->nullable();
            $table->string('universitas', 50)->nullable();
            $table->string('jurusan', 50)->nullable();
            $table->date('tahunlulus')->nullable();
            $table->string('tempatlahir', 50)->nullable();
            $table->date('tanggallahir')->nullable();
            $table->string('nik', 20)->nullable();
            $table->string('nokk', 20)->nullable();
            $table->string('status', 20)->nullable();
            $table->string('alamat', 70)->nullable();
            $table->string('rt', 3)->nullable();
            $table->string('rw', 3)->nullable();
            $table->string('desa', 50)->nullable();
            $table->string('kecamatan', 50)->nullable();
            $table->string('kabupaten', 50)->nullable();
            $table->string('provinsi', 50)->nullable();
            $table->string('npwp', 30)->nullable();
            $table->string('bpjskesehatan', 30)->nullable();
            $table->string('bpjsketenagakerjaan', 30)->nullable();
            $table->string('phonenumber', 15)->nullable();
            $table->string('email', 30)->nullable();
            $table->string('namabank', 30)->nullable();
            $table->string('norekening', 30)->nullable();
            $table->date('terbitstr')->nullable();
            $table->string('str', 30)->nullable();
            $table->date('berlakustr', 30)->nullable();
            $table->date('terbitsip')->nullable();
            $table->string('sip', 30)->nullable();
            $table->date('berlakusip')->nullable();
            $table->string('pelatihan')->nullable();
            $table->integer('active')->nullable();
            $table->integer('portal')->nullable();
            $table->integer('guest')->nullable();
            $table->string('catatan')->nullable();
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
        Schema::dropIfExists('employes');
    }
}
