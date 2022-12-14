<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();

        $out->writeln(AdminAuthenticate::class);

        if(!Session::has('username')){
            $out->writeln('unauthenticated');
            return redirect()->route('auth.ask');
        }else{
            $out->writeln('authenticate: '.Session::get('username'));
        }

        return $next($request);
    }
}
