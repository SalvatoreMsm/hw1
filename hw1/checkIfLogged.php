<?php 

    session_start();

    if(!isset($_SESSION["username"])){
        echo '0';
        exit;
    }

    echo '1';

?>