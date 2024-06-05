<?php

    session_start();
    if(!isset($_SESSION["username"])){
        echo "Not logged";
        exit;
    }

    if(!isset($_POST["titolo"]) && !isset($_POST["testo"])){
        echo "Absent Post camp";
        exit;
    }

    $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ".mysqli_connect_error());


    $titolo = mysqli_real_escape_string($conn, $_POST['titolo']);
    $immagine = mysqli_real_escape_string($conn, $_POST['immagine']);
    $testo = mysqli_real_escape_string($conn, $_POST['testo']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $username = mysqli_real_escape_string($conn, $_SESSION["username"]);

    $ControlQuery = "SELECT * FROM `PREFERITO` WHERE ID_ARTICOLO = '$id' AND TITLE = '$titolo' AND  USERNAME = '$username'";
    $InsertQuery = "INSERT INTO `PREFERITO`(USERNAME, ID_ARTICOLO, TITLE) VALUES (\"$username\",\"$id\",\"$titolo\")";

    $res = mysqli_query($conn, $ControlQuery) or die("Errore: ".mysqli_error($conn));

    if(mysqli_num_rows($res)==0){
        mysqli_query($conn, $InsertQuery) or die("Errore: ".mysqli_error($conn));  
    }
    else{
        echo "Already liked article";
        exit;
    }

    mysqli_close($conn);
    echo "Added to favorite";
    exit;

?>