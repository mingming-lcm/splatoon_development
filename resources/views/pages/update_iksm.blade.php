@extends('layouts.app')

@section('title', __(""))


@section('content')
<?php

    $result = json_decode(getSessionTokenCode());


        $session_token_code_verifier = $result->auth_code_verifier;

        // $session_token_code = urlsafe_b64encode(hex2bin(hash("sha256", $session_token_code_verifier)));


        dump($result);

        $parts = explode("&",parse_url($result->auth_url)['query']);

        $session_token_code = editQuery("session_token_code_challenge", parse_url($result->auth_url)['query']);


        // dump(getSessionToken($session_token_code, $session_token_code_verifier));

        ?>

        <div class="col-xs-12"><a href="<?=$result->auth_url;?>" target="_blank"><?=$result->auth_url;?></a></div>

        <form action="get_iksm" method="get">
            <input type="test" name="url"/>
            <input type="hidden" name="session_token_code_verifier" value="<?=$session_token_code_verifier;?>" />
            <button type="submit">Update</button>
        </form>

<?php
    function editQuery($get,$query){
        $parts = explode("&",$query);
        $return = "";
        foreach($parts as $p){
            $paramData = explode("=",$p);
            if($paramData[0] == $get){
                $return = $paramData[1];
            }
            
           
        }
       
        return $return;
    }

function getSessionTokenCode()
    {
        $auth_state = urlsafe_b64encode(random_bytes(36));
// $auth_state = "L5bjEkl1rgC4ASIK8ut2LRQL84zEpg-MMxZrPMoQMwyW_qnM";
$auth_code_verifier = urlsafe_b64encode(random_bytes(32));
// $auth_code_verifier = "Cor2PmOlGq1trB3uqWouVG7QPQHprPTGVhGRbTF-9DU";
$auth_cv_hash = hash("sha256", $auth_code_verifier);
$auth_code_challenge = urlsafe_b64encode(hex2bin($auth_cv_hash));
// $auth_code_challenge = "ZYVT7hgxHpTgmJy4nM9yTbF5tMJPJY2zkJQidXegAdk";

$base_url = "https://accounts.nintendo.com/connect/1.0.0/authorize?";

$param = array( 
    "state" => $auth_state,
    "redirect_uri" => "npf71b963c1b7b6d119://auth",
    "client_id" => "71b963c1b7b6d119",
    "scope" => "openid user user.birthday user.mii user.screenName",
    "response_type" => "session_token_code",
    "session_token_code_challenge" => $auth_code_challenge,
    "session_token_code_challenge_method" => "S256",
    "theme" => "login_form"
);
$auth_url = $base_url . http_build_query($param);
$response = array(
    "auth_code_verifier" => $auth_code_verifier,
    "auth_url" => $auth_url);

header('content-type: application/json; charset=utf-8');
return(json_encode($response, JSON_UNESCAPED_SLASHES));
    }


    function getSessionToken($session_token_code, $session_token_code_verifier)
    {
        $curl = curl_init();

        $body = json_encode(array(
            "client_id" => "71b963c1b7b6d119",
            "session_token_code" => $session_token_code,
            "session_token_code_verifier" => $session_token_code_verifier
        ));
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://accounts.nintendo.com/connect/1.0.0/api/session_token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => array(
                "Host: accounts.nintendo.com",
                "Content-Type: application/json",
            ),
        ));

        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);

        switch (!empty($response["error"])) {
            case true:
                http_response_code(400);
                return $response["error"];
                return (json_encode(array("from" => "salmonia api", "error" => "invalid_request", "error_description" => "The provided session_token_code is expired")));
                break;
            case false:
                return (json_encode(array("session_token" => $response["session_token"])));
                break;
            default:
                break;
        }
    }

    function getAccessToken($session_token)
    {
        $curl = curl_init();

        $body = json_encode(array(
            "client_id" => "71b963c1b7b6d119",
            "session_token" => $session_token,
            "grant_type" => "urn:ietf:params:oauth:grant-type:jwt-bearer-session-token"
        ));
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://accounts.nintendo.com/connect/1.0.0/api/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => array(
                "Host: accounts.nintendo.com",
                "Content-Type: application/json"
            ),
        ));

        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);

        switch (!empty($response["error"])) {
            case true:
                http_response_code(400);
                return (json_encode(array("from" => "salmonia api", "error" => "invalid_request", "error_description" => "The provided session_token is expired")));
                break;
            case false:
                return (json_encode(array("access_token" => $response["access_token"])));
                break;
            default:
                break;
        }
    }

    function callS2SAPI($access_token, $timestamp)
    {
        $curl = curl_init();

        $body = http_build_query(array(
            "naIdToken" => $access_token,
            "timestamp" => $timestamp
        ));
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://elifessler.com/s2s/api/gen2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => array(
                "Host: elifessler.com",
                "User-Agent: Salmonia for ReactNative/0.0.1",
                "Content-Type: application/x-www-form-urlencoded"
            ),
        ));

        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);

        switch (!empty($response["error"])) {
            case true:
                http_response_code(400);
                return (json_encode(array("from" => "salmonia api", "error" => "invalid_request", "error_description" => "Too many requests")));
                break;
            case false:
                return $response["hash"];
                // return (json_encode(array("hash" => $response["hash"])));
                break;
            default:
                break;
        }
    }

    function callFlapgAPI($access_token, $type)
    {
        $curl = curl_init();

        $timestamp = time();
        // 常に同じ値を利用する
        $guid = "037239ef-1914-43dc-815d-178aae7d8934";
        // Call s2s API
        $hash = callS2SAPI($access_token, $timestamp);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://flapg.com/ika2/api/login?public",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-token: ${access_token}",
                "x-time: ${timestamp}",
                "x-guid: ${guid}",
                "x-hash: ${hash}",
                "x-ver: 3",
                "x-iid: ${type}",
                "User-Agent: Salmonia for ReactNative/0.0.1",
            ),
        ));
        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);

        switch (!empty($response["error"])) {
            case true:
                http_response_code(400);
                return (json_encode(array("from" => "salmonia api", "error" => "invalid_request", "error_description" => "NSO application need to update")));
                break;
            case false:
                return json_encode($response["result"]);
                break;
            default:
                break;
        }
    }

    function getSplatoonToken($flapg_nso)
    {
        $curl = curl_init();

        $body = array(
            "parameter" => array(
                "f" => $flapg_nso["f"],
                "naIdToken" => $flapg_nso["p1"],
                "timestamp" => $flapg_nso["p2"],
                "requestId" => $flapg_nso["p3"],
                "naCountry" => "JP",
                "naBirthday" => "1990-01-01",
                "language" => "ja-JP"
            )
        );
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api-lp1.znc.srv.nintendo.net/v1/Account/Login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => array(
                "Host: api-lp1.znc.srv.nintendo.net",
                "Accept: */*",
                "X-ProductVersion: 1.8.0",
                "Accept-Language: en-US",
                "Content-Type: application/json",
                "Connection: keep-alive",
                "Authorization: Bearer",
                "X-Platform: Android"
            ),
        ));

        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);

        switch (!empty($response["error"])) {
            case true:
                http_response_code(400);
                return (json_encode(array("from" => "salmonia api", "error" => "invalid_request", "error_description" => "The request does not satisfy the schema")));
                break;
            case false:
                return json_encode(array("splatoon_token" => $response["result"]["webApiServerCredential"]["accessToken"], "user" => array("name" => $response["result"]["user"]["name"], "image" => $response["result"]["user"]["imageUri"])));
                break;
            default:
                break;
        }
    }

    function getSplatoonAccessToken($flapg_app, $splatoon_token)
    {
        $curl = curl_init();

        $body = array(
            "parameter" => array(
                "id" => "5741031244955648",
                "f" => $flapg_app["f"],
                "registrationToken" => $flapg_app["p1"],
                "timestamp" => $flapg_app["p2"],
                "requestId" => $flapg_app["p3"],
            )
        );

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api-lp1.znc.srv.nintendo.net/v2/Game/GetWebServiceToken",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => array(
                "Host: api-lp1.znc.srv.nintendo.net",
                "Accept: */*",
                "X-ProductVersion: 1.8.0",
                "Accept-Language: en-US",
                "Content-Type: application/json",
                "Connection: keep-alive",
                "Authorization: Bearer ${splatoon_token}",
                "X-Platform: Android"
            ),
        ));

        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);

        switch (!empty($response["error"])) {
            case true:
                http_response_code(400);
                return (json_encode(array("from" => "salmonia api", "error" => "invalid_request", "error_description" => "The request does not satisfy the schema")));
                break;
            case false:
                return json_encode(array("splatoon_access_token" => $response["result"]["accessToken"]));
                break;
            default:
                break;
        }
    }

    function getIksmSession($splatoon_access_token)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://app.splatoon2.nintendo.net",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            // CURLOPT_NOBODY => true,
            CURLOPT_HEADER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Host: app.splatoon2.nintendo.net",
                "X-GameWebToken: ${splatoon_access_token}",
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        preg_match("/data-unique-id=\"[0-9]{20}/", $response, $uid);
        preg_match("/data-nsa-id=[a-z0-9]{16}/", $response, $nsaid);
        preg_match("/iksm_session=[a-z0-9]{40}/", $response, $cookie);
        $response = array(
            "uid" => substr($uid[0], 16, 20),
            "nsaid" => substr($nsaid[0], 12, 16),
            "iksm_session" => substr($cookie[0], 13, 40)
        );
        return json_encode($response);
    }

    function getResults($iksm_session, $id)
    {
        $url = "https://app.splatoon2.nintendo.net/api/{$id}";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cookie: iksm_session=${iksm_session}"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }


    function squidFishing($url)
    {
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

    function urlsafe_b64encode($val)
    {
        $val = base64_encode($val);
        return str_replace(["/", "+", "="], ["_", "-", ""], $val);
    }

?>

@endsection