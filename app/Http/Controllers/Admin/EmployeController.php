<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Document;
use App\Models\User;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $activeall = Employe::where('active', 1)->count();
        // $activenonmedic = Employe::where('active', 1)->where('str', null)->count();
        // $activemedic = Employe::where('active', 1)->where('str', '!=', null)->count();
        // $nonactiveall = Employe::where('active', 0)->count();

        // return view('admin.pegawai.index', [
        //     'activeall' => $activeall,
        //     'activemedic' => $activemedic,
        //     'activenonmedic' => $activenonmedic,
        //     'nonactiveall' => $nonactiveall
        // ]);
    }

    public function dashboard()
    {
        $activeall = Employe::where('active', 1)->count();
        $activemedic = Employe::where('active', 1)->where('str', '!=', null)->count();
        $activenonmedic = Employe::where('active', 1)->where('str', null)->count();
        $nonactiveall = Employe::where('active', 0)->count();
        $nonactivemedic = Employe::where('active', 0)->where('str', '!=', null)->count();
        $nonactivenonmedic = Employe::where('active', 0)->where('str', null)->count();

        return view('admin.dashboard', [
            'activeall' => $activeall,
            'activemedic' => $activemedic,
            'activenonmedic' => $activenonmedic,
            'nonactiveall' => $nonactiveall,
            'nonactivemedic' => $nonactivemedic,
            'nonactivenonmedic' => $nonactivenonmedic
        ]);
    }
    
    public function aktif()
    {
        $employes = Employe::where('active', 1)->orderBy('noduk', 'asc')->get();
        return view('admin.pegawai.list.aktif', [
            'employes' => $employes
        ]);
    }

    public function nakes()
    {
        $employes = Employe::where('str', '!=', null)->where('active', 1)->orderBy('noduk', 'asc')->get();
        return view('admin.pegawai.list.nakes', [
            'employes' => $employes
        ]);
    }
    
    public function nonnakes()
    {
        $employes = Employe::where('str', null)->where('active', 1)->orderBy('noduk', 'asc')->get();
        return view('admin.pegawai.list.nonnakes', [
            'employes' => $employes
        ]);
    }
    
    public function nonaktif()
    {
        $employes = Employe::where('active', 0)->orderBy('noduk', 'asc')->get();
        return view('admin.pegawai.list.nonaktif', [
            'employes' => $employes
        ]);
    }
    
    public function nonaktifnakes()
    {
        $employes = Employe::where('str', '!=', null)->where('active', 0)->orderBy('noduk', 'asc')->get();
        return view('admin.pegawai.list.nonaktifnakes', [
            'employes' => $employes
        ]);
    }
    
    public function nonaktifnonnakes()
    {
        $employes = Employe::where('str', '=', null)->where('active', 0)->orderBy('noduk', 'asc')->get();
        return view('admin.pegawai.list.nonaktifnonnakes', [
            'employes' => $employes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pegawai.create');
    }
    public function form()
    {
        return view('admin.pegawai.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'noduk' => 'required|integer',
            'nama' => 'required|max:30',
            'nip' => 'max:30',
            'golongan' => 'max:50',
            'tmtgolongan' => 'nullable|date',
            'jeniskelamin' => 'required|max:15',
            'jabatan' => 'required|max:50',
            'statuskepegawaian' => 'required|max:20',
            'tmtjabatan' => 'nullable|date',
            'unitkerja' => 'max:50',
            'universitas' => 'max:50',
            'jurusan' => 'max:50',
            'tahunlulus' => 'nullable|date',
            'tempatlahir' => 'max:50',
            'tanggallahir' => 'nullable|date',
            'nik' => 'max:20',
            'nokk' => 'max:20',
            'status' => 'max:20',
            'alamat' => 'max:70',
            'rt' => 'max:3',
            'rw' => 'max:3',
            'desa' => 'max:50',
            'kelurahan' => 'max:50',
            'kecamatan' => 'max:50',
            'kabupaten' => 'max:50',
            'provinsi' => 'max:50',
            'provinsi' => 'max:50',
            'npwp' => 'max:30',
            'bpjskesehatan' => 'max:30',
            'bpjsketenagakerjaan' => 'max:30',
            'phonenumber' => 'max:15',
            'email' => 'max:30',
            'namabank' => 'max:30',
            'norekening' => 'max:30',
            'terbitstr' => 'nullable|date',
            'str' => 'max:30',
            'berlakustr' => 'nullable|date',
            'terbitsip' => 'nullable|date',
            'sip' => 'max:30',
            'berlakusip' => 'nullable|date',
            'pelatihan' => 'max:10000'
        ]);

        Employe::create([
            'noduk' => $request->noduk,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'golongan' => $request->golongan,
            'tmtgolongan' => $request->tmtgolongan,
            'jeniskelamin' => $request->jeniskelamin,
            'jabatan' => $request->jabatan,
            'statuskepegawaian' => $request->statuskepegawaian,
            'tmtjabatan' => $request->tmtjabatan,
            'unitkerja' => $request->unitkerja,
            'universitas' => $request->universitas,
            'jurusan' => $request->jurusan,
            'tahunlulus' => $request->tahunlulus,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir' => $request->tanggallahir,
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'status' => $request->status,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'npwp' => $request->npwp,
            'bpjskesehatan' => $request->bpjskesehatan,
            'bpjsketenagakerjaan' => $request->bpjsketenagakerjaan,
            'phonenumber' => $request->phonenumber,
            'email' => $request->email,
            'namabank' => $request->namabank,
            'norekening' => $request->norekening,
            'terbitstr' => $request->terbitstr,
            'str' => $request->str,
            'berlakustr' => $request->berlakustr,
            'terbitsip' => $request->terbitsip,
            'sip' => $request->sip,
            'berlakusip' => $request->berlakusip,
            'pelatihan' => $request->pelatihan,
            'active' => 1,
            'portal' => 0,
            'guest' => 0
        ]);

        $new_employe = Employe::latest()->first();

        return redirect('/admin/pegawai/'.$new_employe->id)->with('status', 'Pegawai baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employe = Employe::findOrFail($id);
        $user = User::where('employe_id', $employe->id)->first();
        $documents = Document::where('employe_id', $employe->id)->get();
        return view('admin.pegawai.show', [
            'employe' => $employe,
            'user' => $user,
            'documents' => $documents
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

// =================================================================================    
    public function portal($id)
    {
        $employe = Employe::findOrFail($id);
        if ($employe->portal == 1):
            Employe::where('id', $id)->update([
                'portal' => 0
            ]);
            return redirect('/admin/pegawai/'.$id)->with('status', 'Portal berhasil ditutup');
        else:
            Employe::where('id', $id)->update([
                'portal' => 1
            ]);
            return redirect('/admin/pegawai/'.$id)->with('status', 'Portal berhasil dibuka');
        endif;
        
    }
    
    public function active(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'max:255'
        ]);

        $employe = Employe::findOrFail($id);
        if ($employe->active == 1):
            Employe::where('id', $id)->update([
                'active' => 0,
                'catatan' => $request->catatan
            ]);
            return redirect('/admin/pegawai/'.$id)->with('status', 'Pegawai telah dinonaktifkan');
        else:
            Employe::where('id', $id)->update([
                'active' => 1,
                'catatan' => $request->catatan
            ]);
            return redirect('/admin/pegawai/'.$id)->with('status', 'Pegawai telah diaktifkan');
        endif;
        
    }
// =================================================================================    
    public function editdatapegawai($id)
    {
        $employe = Employe::findOrFail($id);
        $user = User::where('employe_id', $id)->first();
        return view('admin.pegawai.edit.datapegawai', [
            'employe' => $employe,
            'user' => $user
        ]);
    }
    public function updatedatapegawai(Request $request, $id)
    {
        $request->validate([
            'noduk' => 'required|integer',
            'nama' => 'required|max:30',
            'nip' => 'max:30',
            'golongan' => 'max:50',
            'tmtgolongan' => 'nullable|date',
            'jeniskelamin' => 'required|max:15',
            'jabatan' => 'required|max:50',
            'statuskepegawaian' => 'required|max:20',
            'tmtjabatan' => 'nullable|date',
            'unitkerja' => 'max:50'
        ]);
        Employe::where('id', $id)->update([
            'noduk' => $request->noduk,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'golongan' => $request->golongan,
            'tmtgolongan' => $request->tmtgolongan,
            'jeniskelamin' => $request->jeniskelamin,
            'jabatan' => $request->jabatan,
            'statuskepegawaian' => $request->statuskepegawaian,
            'tmtjabatan' => $request->tmtjabatan,
            'unitkerja' => $request->unitkerja
        ]);
        return redirect('/admin/pegawai/'.$id)->with('status', 'Data kepegawaian berhasil disimpan');
    }

    public function editdatapenduduk($id)
    {
        $employe = Employe::findOrFail($id);
        $user = User::where('employe_id', $id)->first();
        return view('admin.pegawai.edit.datapenduduk', [
            'employe' => $employe,
            'user' => $user
        ]);
    }
    public function updatedatapenduduk(Request $request, $id)
    {
        $request->validate([
            'nik' => 'max:20',
            'nokk' => 'max:20',
            'tempatlahir' => 'max:50',
            'tanggallahir' => 'nullable|date',
            'status' => 'max:20',
            'alamat' => 'max:70',
            'rt' => 'max:3',
            'rw' => 'max:3',
            'desa' => 'max:50',
            'kecamatan' => 'max:50',
            'kabupaten' => 'max:50',
            'provinsi' => 'max:50'
        ]);
        Employe::where('id', $id)->update([
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir' => $request->tanggallahir,
            'status' => $request->status,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi
        ]);
        return redirect('/admin/pegawai/'.$id)->with('status', 'Data kependudukan berhasil disimpan');
    }
    
    public function editdatastr($id)
    {
        $employe = Employe::findOrFail($id);
        $user = User::where('employe_id', $id)->first();
        return view('admin.pegawai.edit.datastr', [
            'employe' => $employe,
            'user' => $user
        ]);
    }
    public function updatedatastr(Request $request, $id)
    {
        $request->validate([
            'terbitstr' => 'nullable|date',
            'str' => 'max:30',
            'berlakustr' => 'nullable|date',
            'terbitsip' => 'nullable|date',
            'sip' => 'max:30',
            'berlakusip' => 'nullable|date'
        ]);
        Employe::where('id', $id)->update([
            'terbitstr' => $request->terbitstr,
            'str' => $request->str,
            'berlakustr' => $request->berlakustr,
            'terbitsip' => $request->terbitsip,
            'sip' => $request->sip,
            'berlakusip' => $request->berlakusip
        ]);
        return redirect('/admin/pegawai/'.$id)->with('status', 'Data STR & SIP berhasil disimpan');
    }
    
    public function editdatapendidikan($id)
    {
        $employe = Employe::findOrFail($id);
        $user = User::where('employe_id', $id)->first();
        return view('admin.pegawai.edit.datapendidikan', [
            'employe' => $employe,
            'user' => $user
        ]);
    }
    public function updatedatapendidikan(Request $request, $id)
    {
        $request->validate([
            'universitas' => 'max:50',
            'jurusan' => 'max:50',
            'tahunlulus' => 'nullable|date'
        ]);
        Employe::where('id', $id)->update([
            'universitas' => $request->universitas,
            'jurusan' => $request->jurusan,
            'tahunlulus' => $request->tahunlulus
        ]);
        return redirect('/admin/pegawai/'.$id)->with('status', 'Data pendidikan berhasil disimpan');
    }
    
    public function editdatapelatihan($id)
    {
        $employe = Employe::findOrFail($id);
        $user = User::where('employe_id', $id)->first();
        return view('admin.pegawai.edit.datapelatihan', [
            'employe' => $employe,
            'user' => $user
        ]);
    }
    public function updatedatapelatihan(Request $request, $id)
    {
        $request->validate([
            'pelatihan' => 'max:1000'
        ]);
        Employe::where('id', $id)->update([
            'pelatihan' => $request->pelatihan
        ]);
        return redirect('/admin/pegawai/'.$id)->with('status', 'Data pelatihan berhasil disimpan');
    }
    
    public function editdatapribadi($id)
    {
        $employe = Employe::findOrFail($id);
        $user = User::where('employe_id', $id)->first();
        return view('admin.pegawai.edit.datapribadi', [
            'employe' => $employe,
            'user' => $user
        ]);
    }
    public function updatedatapribadi(Request $request, $id)
    {
        $request->validate([
            'npwp' => 'max:30',
            'bpjskesehatan' => 'max:30',
            'bpjsketenagakerjaan' => 'max:30',
            'phonenumber' => 'max:15',
            'email' => 'max:30',
            'namabank' => 'max:30',
            'norekening' => 'max:30'
        ]);
        Employe::where('id', $id)->update([
            'npwp' => $request->npwp,
            'bpjskesehatan' => $request->bpjskesehatan,
            'bpjsketenagakerjaan' => $request->bpjsketenagakerjaan,
            'phonenumber' => $request->phonenumber,
            'email' => $request->email,
            'namabank' => $request->namabank,
            'norekening' => $request->norekening
        ]);
        return redirect('/admin/pegawai/'.$id)->with('status', 'Data pribadi berhasil disimpan');
    }
// ===================================================================================
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
