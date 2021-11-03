<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function dashboard()
    {
        return view('pegawai.dashboard');
    }

    public function profil()
    {
        $employe = Employe::where('id', Auth::user()->employe_id)->firstOrFail();
        return view('pegawai.profil', [
            'employe' => $employe
        ]);
    }

// =================================================================================    
public function editdatapegawai()
{
    $employe = Employe::findOrFail(Auth::user()->employe->id);
    if ($employe->portal == 1 ) :
        return view('pegawai.edit.datapegawai', [
            'employe' => $employe
        ]);
    else:
        return redirect()->route('pegawai.profil')->with('status', 'Anda tidak memiliki izin untuk mengedit data. Silahkan hubungi Admin untuk mendapatkan izin.');
    endif;
}
public function updatedatapegawai(Request $request)
{
    $employe = Employe::findOrFail(Auth::user()->employe->id);
    if ($employe->portal == 1 ) :
        $request->validate([
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
        Employe::where('id', Auth::user()->employe->id)->update([
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
        return redirect()->route('pegawai.profil')->with('status', 'Data kepegawaian berhasil disimpan');
    else:
        return redirect()->route('pegawai.profil')->with('status', 'Anda tidak memiliki izin untuk mengedit data. Silahkan hubungi Admin untuk mendapatkan izin.');
    endif;
}

public function editdatapenduduk()
{
    $employe = Employe::findOrFail(Auth::user()->employe->id);
    if ($employe->portal == 1 ) :
        return view('pegawai.edit.datapenduduk', [
            'employe' => $employe
        ]);
    else:
        return redirect()->route('pegawai.profil')->with('status', 'Anda tidak memiliki izin untuk mengedit data. Silahkan hubungi Admin untuk mendapatkan izin.');
    endif;
}
public function updatedatapenduduk(Request $request)
{
    $employe = Employe::findOrFail(Auth::user()->employe->id);
    if ($employe->portal == 1 ) :
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
        Employe::where('id', Auth::user()->employe->id)->update([
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
        return redirect()->route('pegawai.profil')->with('status', 'Data kependudukan berhasil disimpan');
    else:
        return redirect()->route('pegawai.profil')->with('status', 'Anda tidak memiliki izin untuk mengedit data. Silahkan hubungi Admin untuk mendapatkan izin.');
    endif;
}

public function editdatastr()
{
    $employe = Employe::findOrFail(Auth::user()->employe->id);
    if ($employe->portal == 1 ) :
        return view('pegawai.edit.datastr', [
            'employe' => $employe
        ]);
    else:
        return redirect()->route('pegawai.profil')->with('status', 'Anda tidak memiliki izin untuk mengedit data. Silahkan hubungi Admin untuk mendapatkan izin.');
    endif;
}
public function updatedatastr(Request $request)
{
    $employe = Employe::findOrFail(Auth::user()->employe->id);
    if ($employe->portal == 1 ) :
        $request->validate([
            'terbitstr' => 'nullable|date',
            'str' => 'max:30',
            'berlakustr' => 'nullable|date',
            'terbitsip' => 'nullable|date',
            'sip' => 'max:30',
            'berlakusip' => 'nullable|date'
        ]);
        Employe::where('id', Auth::user()->employe->id)->update([
            'terbitstr' => $request->terbitstr,
            'str' => $request->str,
            'berlakustr' => $request->berlakustr,
            'terbitsip' => $request->terbitsip,
            'sip' => $request->sip,
            'berlakusip' => $request->berlakusip
        ]);
        return redirect()->route('pegawai.profil')->with('status', 'Data STR & SIP berhasil disimpan');
    else:
        return redirect()->route('pegawai.profil')->with('status', 'Anda tidak memiliki izin untuk mengedit data. Silahkan hubungi Admin untuk mendapatkan izin.');
    endif;
}

public function editdatapendidikan()
{
    $employe = Employe::findOrFail(Auth::user()->employe->id);
    if ($employe->portal == 1 ) :
        return view('pegawai.edit.datapendidikan', [
            'employe' => $employe
        ]);
    else:
        return redirect()->route('pegawai.profil')->with('status', 'Anda tidak memiliki izin untuk mengedit data. Silahkan hubungi Admin untuk mendapatkan izin.');
    endif;
}
public function updatedatapendidikan(Request $request)
{
    $employe = Employe::findOrFail(Auth::user()->employe->id);
    if ($employe->portal == 1 ) :
        $request->validate([
            'universitas' => 'max:50',
            'jurusan' => 'max:50',
            'tahunlulus' => 'nullable|date'
        ]);
        Employe::where('id', Auth::user()->employe->id)->update([
            'universitas' => $request->universitas,
            'jurusan' => $request->jurusan,
            'tahunlulus' => $request->tahunlulus
        ]);
        return redirect()->route('pegawai.profil')->with('status', 'Data pendidikan berhasil disimpan');
    else:
        return redirect()->route('pegawai.profil')->with('status', 'Anda tidak memiliki izin untuk mengedit data. Silahkan hubungi Admin untuk mendapatkan izin.');
    endif;
}

public function editdatapelatihan()
{
    $employe = Employe::findOrFail(Auth::user()->employe->id);
    if ($employe->portal == 1 ) :
        return view('pegawai.edit.datapelatihan', [
            'employe' => $employe
        ]);
    else:
        return redirect()->route('pegawai.profil')->with('status', 'Anda tidak memiliki izin untuk mengedit data. Silahkan hubungi Admin untuk mendapatkan izin.');
    endif;
}
public function updatedatapelatihan(Request $request)
{
    $employe = Employe::findOrFail(Auth::user()->employe->id);
    if ($employe->portal == 1 ) :
        $request->validate([
            'pelatihan' => 'max:1000'
        ]);
        Employe::where('id', Auth::user()->employe->id)->update([
            'pelatihan' => $request->pelatihan
        ]);
        return redirect()->route('pegawai.profil')->with('status', 'Data pelatihan berhasil disimpan');
    else:
        return redirect()->route('pegawai.profil')->with('status', 'Anda tidak memiliki izin untuk mengedit data. Silahkan hubungi Admin untuk mendapatkan izin.');
    endif;
}

public function editdatapribadi()
{
    $employe = Employe::findOrFail(Auth::user()->employe->id);
    if ($employe->portal == 1 ) :
        return view('pegawai.edit.datapribadi', [
            'employe' => $employe
        ]);
    else:
        return redirect()->route('pegawai.profil')->with('status', 'Anda tidak memiliki izin untuk mengedit data. Silahkan hubungi Admin untuk mendapatkan izin.');
    endif;
}
public function updatedatapribadi(Request $request)
{
    $employe = Employe::findOrFail(Auth::user()->employe->id);
    if ($employe->portal == 1 ) :
        $request->validate([
            'npwp' => 'max:30',
            'bpjskesehatan' => 'max:30',
            'bpjsketenagakerjaan' => 'max:30',
            'phonenumber' => 'max:15',
            'email' => 'max:30',
            'namabank' => 'max:30',
            'norekening' => 'max:30'
        ]);
        Employe::where('id', Auth::user()->employe->id)->update([
            'npwp' => $request->npwp,
            'bpjskesehatan' => $request->bpjskesehatan,
            'bpjsketenagakerjaan' => $request->bpjsketenagakerjaan,
            'phonenumber' => $request->phonenumber,
            'email' => $request->email,
            'namabank' => $request->namabank,
            'norekening' => $request->norekening
        ]);
        return redirect()->route('pegawai.profil')->with('status', 'Data pribadi berhasil disimpan');
    else:
        return redirect()->route('pegawai.profil')->with('status', 'Anda tidak memiliki izin untuk mengedit data. Silahkan hubungi Admin untuk mendapatkan izin.');
    endif;
}
// ===================================================================================

    public function dokumen()
    {
        $documents = Document::where('employe_id', Auth::user()->employe->id)->get();
        return view('pegawai.dokumen', [
            'documents' => $documents
        ]);
    }

    public function inputdokumen(Request $request)
    {
        $idpegawai = Auth::user()->employe->id;
        $request->validate([
            'title' => 'required|max:30',
            'fileinput' => 'required|mimes:pdf,docx,xlsx|max:4096'
        ]);
        $title = $request -> title;
        $fileinput = request()->file('fileinput');
        $file = $fileinput->storeAs("files", "ID-{$idpegawai}-{$title}-{$fileinput->getMtime()}.{$fileinput->getClientOriginalExtension()}");
        Document::create([
            'employe_id' => $idpegawai,
            'title' => $request -> title,
            'file' => $file
            ]);
        return redirect()->route('pegawai.dokumen')->with('dokumen', 'File berhasil diupload'); 
    }

    public function editdokumen($id)
    {
        $documents = Document::where('employe_id', Auth::user()->employe->id)->get();
        $document = Document::where('id', $id)->where('employe_id', Auth::user()->employe->id)->firstOrFail();
        return view('pegawai.editdokumen', [
            'documents' => $documents,
            'document' => $document
        ]);
    }

    public function updatedokumen(Request $request, $id)
    {
        $idpegawai = Auth::user()->employe->id;
        $document = Document::where('id', $id)->where('employe_id', Auth::user()->employe->id)->firstOrFail();
        $request->validate([
            'title' => 'required|max:30',
            'fileinput' => 'nullable|mimes:pdf,docx,xlsx|max:4096'
        ]);

        if ($request->file('fileinput')):
            $title = $request -> title;
            $fileinput = request()->file('fileinput');
            $file = $fileinput->storeAs("files", "ID-{$idpegawai}-{$title}-{$fileinput->getMtime()}.{$fileinput->getClientOriginalExtension()}");
            Document::where('id', $id)->update([
                'title' => $request -> title,
                'file' => $file
                ]);
            \Storage::delete($document->file);
            return redirect()->route('pegawai.dokumen')->with('dokumen', 'File berhasil diubah'); 
        else:
            $title = $request -> title;
            Document::where('id', $id)->update([
                'title' => $request -> title
                ]);
                return redirect()->route('pegawai.dokumen')->with('dokumen', 'Judul file berhasil diubah'); 
        endif;

    }
    public function deletedokumen($id)
    {
        $document = Document::where('id', $id)->where('employe_id', Auth::user()->employe->id)->firstOrFail();
        \Storage::delete($document->file);
        Document::destroy($id);
        return redirect()->route('pegawai.dokumen')->with('dokumen', 'Dokumen berhasil dihapus'); 
    }
    


// ===================================================================================


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
