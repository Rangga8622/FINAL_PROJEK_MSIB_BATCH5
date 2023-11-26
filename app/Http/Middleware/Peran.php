<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;


class Peran
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $peran): Response
    {
        //return $next($request);
        //multiple peran
        if (Auth::check()) {
            $perans = explode('-', $peran);
            foreach ($perans as $p) {
                if (Auth::user()->role == $p) {
                    return $next($request);
                }
            }
        }
        //jika tidak ada hak aksesnya
        //dilempar ke halaman access denied
        return redirect('/access-denied');
    }
}
