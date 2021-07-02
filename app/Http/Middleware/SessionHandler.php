<?php

namespace App\Http\Middleware;

use App\Models\SystemSettings;
use Closure;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class SessionHandler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        date_default_timezone_set("Asia/Hong_Kong");



        return $next($request);
    }

    public function handleRegion($request)
    {
        date_default_timezone_set("Asia/Hong_Kong");
    }

    
    function squidFishing($url){
        $iksm = "8a615c6a18a7067d739cb5c8a2932142f563daa0";
        $header = array(
            "Cookie: iksm_session=" . $iksm,
            "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 14_4_2 like Mac OS X)  
                        AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148"
        );
        $context = array(
            "http" => array(
                "method" => "GET",
                "header" => implode("\r\n", $header)
            )
        );
        return json_decode(file_get_contents($url, false, stream_context_create($context)));
    }
}
