<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user->employe_id){
            if ($user->employe->jabatan == 'Kepala Tata Usaha' ){
                return $next($request);
            }else{
                return abort('401');
            }
        }else{
            return abort('401');
        }
    }
}
