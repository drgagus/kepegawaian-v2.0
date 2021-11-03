<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Guest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Employe::where('guest', 1)->where('active', 1)->get();
        $guest = Guest::where('id', 1)->firstOrFail();
        return view('admin.guest.index', [
            'employes' => $employes,
            'guest' => $guest
        ]);
    }

    public function hakakses()
    {
        $employes = Employe::where('active', 1)->get();
        $guest = Guest::where('id', 1)->firstOrFail();
        return view('admin.guest.hakakses', [
            'employes' => $employes,
            'guest' => $guest
        ]);
    }
    
    public function akses(Request $request)
    {
        $guest = Guest::where('id', 1)->firstOrFail();
        if($request->nip):
            if($request->nip == 1):
                Guest::where('id', 1)->update([
                    'nip' => 1
                ]);
            else:
                Guest::where('id', 1)->update([
                    'nip' => 0
                ]);
            endif;
        else:
            Guest::where('id', 1)->update([
                'nip' => 0
            ]);
        endif;
        if($request->jeniskelamin):
            if($request->jeniskelamin == 1):
                Guest::where('id', 1)->update([
                    'jeniskelamin' => 1
                ]);
            else:
                Guest::where('id', 1)->update([
                    'jeniskelamin' => 0
                ]);
            endif;
        else:
            Guest::where('id', 1)->update([
                'jeniskelamin' => 0
            ]);
        endif;
        if($request->pangkat):
            if($request->pangkat == 1):
                Guest::where('id', 1)->update([
                    'pangkat' => 1
                ]);
            else:
                Guest::where('id', 1)->update([
                    'pangkat' => 0
                ]);
            endif;
        else:
            Guest::where('id', 1)->update([
                'pangkat' => 0
            ]);
        endif;
        if($request->jabatan):
            if($request->jabatan == 1):
                Guest::where('id', 1)->update([
                    'jabatan' => 1
                ]);
            else:
                Guest::where('id', 1)->update([
                    'jabatan' => 0
                ]);
            endif;
        else:
            Guest::where('id', 1)->update([
                'jabatan' => 0
            ]);
        endif;
        if($request->unitkerja):
            if($request->unitkerja == 1):
                Guest::where('id', 1)->update([
                    'unitkerja' => 1
                ]);
            else:
                Guest::where('id', 1)->update([
                    'unitkerja' => 0
                ]);
            endif;
        else:
            Guest::where('id', 1)->update([
                'unitkerja' => 0
            ]);
        endif;
        if($request->pendidikan):
            if($request->pendidikan == 1):
                Guest::where('id', 1)->update([
                    'pendidikan' => 1
                ]);
            else:
                Guest::where('id', 1)->update([
                    'pendidikan' => 0
                ]);
            endif;
        else:
            Guest::where('id', 1)->update([
                'pendidikan' => 0
            ]);
        endif;
        if($request->lahir):
            if($request->lahir == 1):
                Guest::where('id', 1)->update([
                    'lahir' => 1
                ]);
            else:
                Guest::where('id', 1)->update([
                    'lahir' => 0
                ]);
            endif;
        else:
            Guest::where('id', 1)->update([
                'lahir' => 0
            ]);
        endif;
        if($request->nik):
            if($request->nik == 1):
                Guest::where('id', 1)->update([
                    'nik' => 1
                ]);
            else:
                Guest::where('id', 1)->update([
                    'nik' => 0
                ]);
            endif;
        else:
            Guest::where('id', 1)->update([
                'nik' => 0
            ]);
        endif;
        if($request->nokk):
            if($request->nokk == 1):
                Guest::where('id', 1)->update([
                    'nokk' => 1
                ]);
            else:
                Guest::where('id', 1)->update([
                    'nokk' => 0
                ]);
            endif;
        else:
            Guest::where('id', 1)->update([
                'nokk' => 0
            ]);
        endif;
        if($request->status):
            if($request->status == 1):
                Guest::where('id', 1)->update([
                    'status' => 1
                ]);
            else:
                Guest::where('id', 1)->update([
                    'status' => 0
                ]);
            endif;
        else:
            Guest::where('id', 1)->update([
                'status' => 0
            ]);
        endif;
        if($request->alamat):
            if($request->alamat == 1):
                Guest::where('id', 1)->update([
                    'alamat' => 1
                ]);
            else:
                Guest::where('id', 1)->update([
                    'alamat' => 0
                ]);
            endif;
        else:
            Guest::where('id', 1)->update([
                'alamat' => 0
            ]);
        endif;
        if($request->npwp):
            if($request->npwp == 1):
                Guest::where('id', 1)->update([
                    'npwp' => 1
                ]);
            else:
                Guest::where('id', 1)->update([
                    'npwp' => 0
                ]);
            endif;
        else:
            Guest::where('id', 1)->update([
                'npwp' => 0
            ]);
        endif;
        if($request->bpjs):
            if($request->bpjs == 1):
                Guest::where('id', 1)->update([
                    'bpjs' => 1
                ]);
            else:
                Guest::where('id', 1)->update([
                    'bpjs' => 0
                ]);
            endif;
        else:
            Guest::where('id', 1)->update([
                'bpjs' => 0
            ]);
        endif;
        if($request->kontak):
            if($request->kontak == 1):
                Guest::where('id', 1)->update([
                    'kontak' => 1
                ]);
            else:
                Guest::where('id', 1)->update([
                    'kontak' => 0
                ]);
            endif;
        else:
            Guest::where('id', 1)->update([
                'kontak' => 0
            ]);
        endif;
        if($request->bank):
            if($request->bank == 1):
                Guest::where('id', 1)->update([
                    'bank' => 1
                ]);
            else:
                Guest::where('id', 1)->update([
                    'bank' => 0
                ]);
            endif;
        else:
            Guest::where('id', 1)->update([
                'bank' => 0
            ]);
        endif;
        if($request->str):
            if($request->str == 1):
                Guest::where('id', 1)->update([
                    'str' => 1
                ]);
            else:
                Guest::where('id', 1)->update([
                    'str' => 0
                ]);
            endif;
        else:
            Guest::where('id', 1)->update([
                'str' => 0
            ]);
        endif;
        if($request->sip):
            if($request->sip == 1):
                Guest::where('id', 1)->update([
                    'sip' => 1
                ]);
            else:
                Guest::where('id', 1)->update([
                    'sip' => 0
                ]);
            endif;
        else:
            Guest::where('id', 1)->update([
                'sip' => 0
            ]);
        endif;
        if($request->pelatihan):
            if($request->pelatihan == 1):
                Guest::where('id', 1)->update([
                    'pelatihan' => 1
                ]);
            else:
                Guest::where('id', 1)->update([
                    'pelatihan' => 0
                ]);
            endif;
        else:
            Guest::where('id', 1)->update([
                'pelatihan' => 0
            ]);
        endif;
        return redirect('/admin/guest/hakakses')->with('status', 'Hakakses berhasil diubah');
    }

    public function hakaksespegawai(Request $request)
    {
        // dd($request);
        $employes = Employe::where('active', 1)->get();
        foreach($employes as $employe):
            $guestid = 'guest'.$employe->id;
            if($request->$guestid):
                if($request->$guestid == '1'):
                    Employe::where('id', $employe->id)->update([
                        'guest' => 1
                    ]);
                else:
                    Employe::where('id', $employe->id)->update([
                        'guest' => 0
                    ]);
                endif;
            else:
                Employe::where('id', $employe->id)->update([
                    'guest' => 0
                ]);
            endif;
        endforeach;
        return redirect('/admin/guest/hakakses')->with('aksespegawai', 'Hakakses berhasil diubah');

    }

    public function pengaturan()
    {
        $guestaccount = User::where('id', 2)->firstOrFail();
        return view('admin.guest.pengaturan', [
            'guestaccount' => $guestaccount
        ]);
    }
    
    public function ubahpengaturan(Request $request)
    {
        $request->validate([
            'password' => 'nullable',
            'expired' => 'date',
        ]);

        if($request->password):
            User::where('id', 2)->update([
                'password' => Hash::make($request -> password),
                'expired' => $request->expired
            ]);
            return redirect('/admin/guest/pengaturan')->with('status', 'Pengaturan akun Guest telah diubah');
        else:
            User::where('id', 2)->update([
                'expired' => $request->expired
            ]);
            return redirect('/admin/guest/pengaturan')->with('status', 'Pengaturan akun Guest telah diubah');
        endif;
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
