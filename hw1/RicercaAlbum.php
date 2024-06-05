<?php
require_once 'auth.php';


if (!isset($_SESSION["username"])) exit;


header('Content-Type: application/json');

spotify();

function spotify() {
    // ACCESS TOKEN 

    // QUERY EFFETTIVA
    $query = ($_POST["album"]);
    $token = $_POST["token"];
    $url = 'https://api.spotify.com/v1/search?type=album&q='.$query;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token)); 
    $res=curl_exec($ch);
    curl_close($ch);

    echo $res;
}
?>