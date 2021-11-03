<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
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
    public function create($id)
    {
        $employe = Employe::findOrFail($id);
        $user = User::where('employe_id',$employe->id)->first();
        if($user):
            return redirect('/admin/pegawai/'.$id)->with('status', 'Sudah ada akun');
        else:
            return view('admin.akun.create', [
                'employe' => $employe
            ]);
        endif;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $employe = Employe::findOrFail($id);
        $user = User::where('employe_id',$employe->id)->first();
        if($user):
            return redirect('/admin/pegawai/'.$id)->with('status', 'Sudah ada akun');
        else:
            $request->validate([
                'username' => 'required|min:4|max:20|unique:users',
                'password' => 'required|min:4|max:30|confirmed'
            ]);
            User::create([
                'employe_id' => $id,
                'username' => $request->username,
                'password' => Hash::make($request -> password),
                'position' => 'pegawai'
            ]);
            return redirect('/admin/pegawai/'.$id)->with('status', 'Akun berhasil dibuat');
        endif;
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
        $user = User::where('employe_id', $id)->firstOrFail();
        if ($user->image):
            \Storage::delete($user->image);
        endif;
        User::destroy($user->id);
        return redirect('/admin/pegawai/'.$id)->with('status', 'Akun berhasil dihapus');
    }
    
    public function reset($id)
    {
        User::where('employe_id', $id)->update([
            'password' => Hash::make('1234')
        ]);
        return redirect('/admin/pegawai/'.$id)->with('status', 'Password akun berhasil direset');
    }

}
