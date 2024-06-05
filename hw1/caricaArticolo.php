<?php

    session_start();

    if(!isset($_POST["titolo"]) || !isset($_POST["testo"])){
        echo "0";
        exit;
    }

    $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ".mysqli_connect_error());


    $titolo = mysqli_real_escape_string($conn, $_POST['titolo']);
    $immagine = mysqli_real_escape_string($conn, $_POST['immagine']);
    $testo = mysqli_real_escape_string($conn, $_POST['testo']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $ControlQuery = "SELECT * FROM `ARTICOLO` WHERE TITLE = '$titolo' AND TESTO = '$testo';";
    $InsertQuery = "INSERT INTO `ARTICOLO`(ID_ARTICOLO, TITLE, IMMAGINE, TESTO) VALUES (\"$id\",\"$titolo\",\"$immagine\", \"$testo\")";

    $res = mysqli_query($conn, $ControlQuery) or die("Errore: ".mysqli_error($conn));
    if(mysqli_num_rows($res)==0){
        mysqli_query($conn, $InsertQuery) or die("Errore: ".mysqli_error($conn));
        echo "Article inserted in the database correctly";
        mysqli_close($conn);
        exit;        
    }
    else{
        echo "Already existing article";
    }

    mysqli_close($conn);
    exit;
?>  