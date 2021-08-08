<?php

namespace App\Models;

// use App\Observers\AdminObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class IksmSession extends Model
{
    public static function boot()
    {
        parent::boot();

        $class = get_called_class();
        // $class::observe(new AdminObserver());

    }


    public static function getIksmSession()
    {
        return self::get();
    }


    public static function squidFishing($url){
        $iksm = "3d714190265569a6a50e63858078deb5d3f26c3c";
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
