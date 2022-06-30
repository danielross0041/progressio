<?php
namespace App\Http\Middleware;
use Closure;
use Auth;
class tutor
{
    public function handle($request, Closure $next)
    {
        if(Auth::user()->user_type==3){
            return $next($request);
        } else {
            return redirect()->route('home')->with('notify_error','You need to login before accessing Tutor Dashboard');
        }
    }
    public function terminate($request, $response){
    	
    }
}
