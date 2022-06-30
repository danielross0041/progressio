<?php
namespace App\Http\Middleware;
use Closure;
use Auth;
class pupil
{
    public function handle($request, Closure $next)
    {
        if(Auth::user()->user_type==2){
            return $next($request);
        } else {
            return redirect()->route('home')->with('notify_error','You need to login before accessing Pupil Dashboard');
        }
    }
    public function terminate($request, $response){
    	
    }
}
