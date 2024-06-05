<?php

    session_start();


    if(isset($_POST["ApiKey"])){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://newsapi.org/v2/everything?q=web+programming".$_POST["ApiKey"]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $headers = array(
            "user-agent: Mozilla/5.0 (Macintosh; PPC Mac OS X 10_8_7 rv:5.0; en-US) AppleWebKit/533.31.5 (KHTML, like Gecko) Version/4.0 Safari/533.31.5"
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($curl);
        curl_close($curl);


        echo $result;
        exit;
    }

?>