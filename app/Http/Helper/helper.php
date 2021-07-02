<?php

function squidFishing($url){
    $iksm = "6f4b5dee715b03a95265f91e9bfb85fe7364536a";
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