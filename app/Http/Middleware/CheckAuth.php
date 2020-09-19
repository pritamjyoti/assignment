<?php
namespace App\Http\Middleware;
use Closure;
use Auth;

class CheckAuth
{
    public function handle($request, Closure $next)
    {
		if(isset(auth::font->user()->id) && Auth::user()->id > 0)
		{
			$current_url 			= substr(url()->current(),strlen(asset('/')));
		//	$all_available_url		= json_decode(file_get_contents('public/menus/url_0.txt'));
			
			
					return redirect('/dashboard');
			
		}
        return $next($request);
    }
}