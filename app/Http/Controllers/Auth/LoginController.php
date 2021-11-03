<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function formlogin()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $attr = request()->validate([
            'username' => 'required|max:20',
            'password' => 'required|max:20'
        ]);

        $username = $request->username;
        $password = $request->password;
        $cekuser = User::where('username',$username)->first();
        if ($cekuser):
            $cekuser = User::where('username',$username)->first();
            if(Hash::check($request->password, $cekuser->password)):
                if($cekuser->employe_id):
                    if($cekuser->employe->jabatan == 'Kepala Tata Usaha'):
                        if($cekuser->employe->active == 1):
                            Auth::attempt($attr);
                            return redirect()->route('admin')->with('status', 'Selamat Datang '.$cekuser->employe->nama);
                        else:
                            return redirect()->route('login')->with('status', 'Anda sudah tidak aktif lagi sebagai pegawai di sini');
                        endif;
                    elseif($cekuser->jabatan != 'Kepala Tata Usaha'):
                        if($cekuser->employe->active == 1):
                            Auth::attempt($attr);
                            return redirect()->route('pegawai')->with('status', 'Selamat Datang '.$cekuser->employe->nama);
                        else:
                            return redirect()->route('login')->with('status', 'Anda sudah tidak aktif lagi sebagai pegawai di sini');
                        endif;
                    else:
                        return redirect()->route('login')->with('status', 'akses dilarang');
                    endif;
                else:
                    if (date('Y-m-d') <= date('Y-m-d', strtotime ($cekuser->expired))):
                        Auth::attempt($attr);
                        return redirect()->route('guest')->with('status', 'Selamat Datang Guest');
                    else:
                        return redirect()->route('login')->with('status', 'Akun Guest Telah Expired');
                    endif;
                endif;
            else:
                return redirect()->route('login')->with('status', 'password salah');
            endif;
        else:
            return redirect()->route('login')->with('status', 'username salah');
        endif;
    }
}
