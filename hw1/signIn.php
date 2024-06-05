<?php

    session_start();

    error_reporting(E_ALL);
    ini_set('display_errors', 1);   
    
    if(isset($_POST["username"]) && isset($_POST["password"])){
        $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ".mysqli_connect_error());
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $query = "SELECT * FROM `ACCOUT` WHERE USERNAME = '".$username."'";
        $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
        $row = mysqli_fetch_row($res);
        
        if (preg_match('~[0-9]+~', $password) && mysqli_num_rows($res)==0) 
        {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($conn, "INSERT INTO `ACCOUT`(USERNAME, PASS) VALUES(\"$username\",\"$hashed_password\")");   
            mysqli_close($conn);
            echo "1";
            exit;
        }
        else echo "2";
    }

?>