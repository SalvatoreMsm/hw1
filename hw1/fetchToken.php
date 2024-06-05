<?php

    session_start();

    if(!isset($_SESSION["username"])){
        echo "0";
        exit;
    }

    $client_id = 'ae6d306e13e94f9e9afebcfc60552c2f';
    $client_secret = '0c549dcc3e0243cca37f2e5cea4523e8';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://accounts.spotify.com/api/token");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS,"grant_type=client_credentials");
    $headers = array("Authorization: Basic ".base64_encode($client_id.":".$client_secret));
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($curl);
    curl_close($curl);
    $_SESSION["token"] = $result->access_token;
    echo $_SESSION["token"];
    exit;

?>