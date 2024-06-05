<?php
session_start();

if(isset($_POST["username"]) && isset($_POST["password"])){
    $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ".mysqli_connect_error());
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    
    $query = "SELECT * FROM `ACCOUT` WHERE USERNAME = '$username'";
    $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
    
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $stored_hash = $row['PASS'];
        
        if (password_verify($password, $stored_hash)) {
            $_SESSION["username"] = $username;
            echo "1"; 
        } else {
            echo "2"; 
        }
    } else {
        echo "3"; 
    }
    
    mysqli_close($conn);
}
?>
