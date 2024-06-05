<?php 

    session_start();

    if(!isset($_SESSION["username"])){
        header("Location: login.php");
        exit;
    }

    if(isset($_GET["id_utente"])){
        $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ".mysqli_connect_error());
        $id_utente = mysqli_real_escape_string($conn, $_GET["id_utente"]);
        $query = "DELETE FROM `ACCOUT` WHERE ID =".$id_utente;
        mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
        
    }
?>