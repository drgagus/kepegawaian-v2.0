<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function pengaturan()
    {
        return view('auth.pengaturan');
    }
   
    public function password(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:4|max:20',
            'new_password' => 'required|min:4|max:30|confirmed'
        ]);
        
        $id = Auth::user()->id;
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $current_password = Auth::user()->password;

        if (Hash::check($old_password, $current_password)):
            if (Hash::check($new_password, $current_password)):
                return redirect()->route('pengaturan')->with('password', 'Password Baru Sama Dengan Password Lama!');
            else:
                user::where('id', $id)->update([
                    'password' => Hash::make($new_password)
                ]);
                return redirect()->route('pengaturan')->with('password', 'Password Berhasil Diganti');
            endif;
        else:
            return redirect()->route('pengaturan')->with('password', 'Password Lama Salah!');
        endif;

    }
    
    public function username(Request $request)
    {
        $request->validate([
            'username' => 'required|min:4|max:20',
            'password' => 'required|min:4|max:30'
        ]);
        
        $id = Auth::user()->id;
        $usernamebaru = $request->username;
        $password = $request->password;
        $usernamelama = Auth::user()->username;
        $current_password = Auth::user()->password;

        if ($usernamebaru == $usernamelama):
            return redirect()->route('pengaturan')->with('username', 'Username baru tidak boleh sama dengan username lama');
        else:
            if (Hash::check($password, $current_password)):
                user::where('id', $id)->update([
                    'username' => $usernamebaru
                ]);
                return redirect()->route('pengaturan')->with('username', 'Username berhasil diganti');
            else:
                return redirect()->route('pengaturan')->with('username', 'Password salah');
            endif;
        endif;
    }

    public function photoprofil(Request $request)
    {
        $id = Auth::user()->id;
        $idpegawai = Auth::user()->employe->id;
        $current_password = Auth::user()->password;

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'passsword' => 'required'
        ]);

        if (Hash::check($request->passsword, $current_password)):
            $oldimage = Auth::user()->image;
            if($oldimage):
                \Storage::delete($oldimage);
            endif;
            $filephoto = request()->file('photo');
            $file = $filephoto->storeAs("images/profil", "ID-{$idpegawai}-photo-{$filephoto->getMtime()}.{$filephoto->getClientOriginalExtension()}");
            user::where('id', $id)->update([
                'image' => $file
            ]);
            return redirect()->route('pengaturan')->with('photo', 'Photo profil berhasil diganti');
        else:
            return redirect()->route('pengaturan')->with('photo', 'Password salah');
        endif;
    }
    
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
