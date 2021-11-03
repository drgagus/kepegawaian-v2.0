<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    Protected $fillable = ['noduk', 'nama', 'nip', 'golongan', 'tmtgolongan', 'jeniskelamin', 'jabatan', 'statuskepegawaian', 'tmtjabatan', 'unitkerja', 'universitas', 'jurusan', 'tahunlulus', 'tempatlahir', 'tanggallahir', 'nik', 'nokk', 'status', 'alamat', 'rt', 'rw', 'desa', 'kecamatan', 'kabupaten', 'provinsi', 'npwp', 'bpjskesehatan', 'bpjsketenagakerjaan', 'phonenumber', 'email', 'namabank', 'norekening', 'terbitstr', 'str', 'berlakustr', 'terbitsip', 'sip', 'berlakusip', 'pelatihan', 'active', 'portal', 'guest'];

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }

    public function document()
    {
        return $this->hasOne('App\Models\Document');
    }
    
}
