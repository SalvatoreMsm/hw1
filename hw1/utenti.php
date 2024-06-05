<?php 

    session_start();

    if(!isset($_SESSION["username"])){
        header("Location: login.php");
        exit;
    }

    $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ".mysqli_connect_error());
    $query = "SELECT * FROM `ACCOUT`";
    $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
    $utenti = array();
    while($row = mysqli_fetch_assoc($res)){
        $utenti[] = $row;
    }
    echo json_encode($utenti);
?>