<?php

    session_start();

    if(!isset($_SESSION['username'])){
        echo "Session not setted";
        exit;
    }

    $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ".mysqli_connect_error());


    $username = mysqli_real_escape_string($conn, $_SESSION['username']);

    
    $LoadPreferitiQuery = "SELECT ARTICOLO.ID_ARTICOLO, ARTICOLO.TITLE 
                           FROM ARTICOLO JOIN PREFERITO ON ARTICOLO.ID_ARTICOLO = PREFERITO.ID_ARTICOLO AND ARTICOLO.TITLE = PREFERITO.TITLE
                           WHERE PREFERITO.USERNAME = '".$username."'";

    $res = mysqli_query($conn, $LoadPreferitiQuery) or die("Errore: ".mysqli_error($conn));



?>


<!DOCTYPE html>
<html>
<head>
<title>tst</title>
    <link rel = "stylesheet" href = "mhw3.css" />
    <link rel = "stylesheet" href = "login.css"/>
    <link rel = "stylesheet" href = "signin.css"/>
    <link rel = "stylesheet" href = "preferiti.css"/>
    <link rel = "stylesheet" href = "pref.css"/>
    <script src = "mhw3.js" defer></script>
    <script src = "login.js" defer></script>
    <script src = "PaginaPreferiti.js" defer></script>


<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
</head>

<body>
<header id = 'header_iniziale'>
    <div id = 'barra'>
        <div class = 'container_h_in'>
            
            <div class = 'container_img'>
            <div class = 'item_h_in_img'></div>
            </div>              

            <div class = 'item_h_in'>
                <a>Chi Sono</a>
            </div>
            <div class = 'item_h_in'>
                <a id = 'Articoli_salvati'>Preferiti</a>
            </div>
            <div class = 'item_h_in'>
                <a>Cosa Scrivo</a>
            </div>
            <div class = 'item_h_in'>
                <a>Glossario</a>
            </div>
            <div class = 'item_h_in'>
                <a>Contatti</a>
            </div>
            <div class = 'item_h_in_lente'>
                <img src = 'sito.png'>
            </div>
            <div class = 'item_h_in hidden' id = 'search_bar'>
                <form>   
                    <input type = 'text' placeholder="Cerca..." id = 'ricerca'/>
                    <input type = 'submit' value = 'Cerca'>
                </form> 
                <div class = 'container_x' data></div>
            </div>
        </div>
    </div>
    <?php 
            if(!isset($_SESSION['username'])){
                echo "<button id = 'login'>Log in</button>";
            }else{
                $username = $_SESSION['username'];
                echo "<button id = 'login'>$username</button>";
            }
            ?>
</header>
<div class = 'hidden' id = 'UserAppend'></div>
<div id = 'content'>
    <div class = 'riga_pref'>
    <?php while($row = mysqli_fetch_assoc($res)){
        $id = $row['ID_ARTICOLO'];
        $titolo = $row['TITLE'];
        echo "<div class = 'item_riga_pref' data-index = '$id'>                         
                <div class = 'immagine' data-image = '$id'></div>
                <h1 data-header = '$id'>$titolo</h1>
                <div class = 'preferito'>☆</div>
            </div>";

    }
    ?>    
    </div>
</div>

<footer>
        <div id = 'flex_f1'>
            <div class = 'footer_item'>
                <p class = 'hm'>Contatti</p>
                <p class = 'text'>
                    Riccardo Esposito: webwriter, copy, blogger freelance, 
                    formatore. Ufficio Capri: Via Traversa la Vigna 4, Anacapri – 80071 (NA).
                    Ufficio Napoli: Via Pallonetto Santa Chiara 8, Napoli. P. IVA 07103711219 – Email: 
                    info@mysocialweb.it – Tel: 340 7974009
                </p>
                <p class = 'text'>
                    Seguimi sui vari canali social e partecipa alle discussioni online.
                </p>
            </div>
            <div class = 'footer_item'>
                <p class = 'hm'>Contatti</p>
                <p class = 'text'>
                    Riccardo Esposito: webwriter, copy, blogger freelance, 
                    formatore. Ufficio Capri: Via Traversa la Vigna 4, Anacapri – 80071 (NA).
                    Ufficio Napoli: Via Pallonetto Santa Chiara 8, Napoli. P. IVA 07103711219 – Email: 
                    info@mysocialweb.it – Tel: 340 7974009
                </p>
                <p class = 'text'>
                    Seguimi sui vari canali social e partecipa alle discussioni online.
                </p>
            </div>
                
            <div class = 'footer_item'>
                <p class = 'hm'>Contatti</p>
                <p class = 'text'>
                    Riccardo Esposito: webwriter, copy, blogger freelance, 
                    formatore. Ufficio Capri: Via Traversa la Vigna 4, Anacapri – 80071 (NA).
                    Ufficio Napoli: Via Pallonetto Santa Chiara 8, Napoli. P. IVA 07103711219 – Email: 
                    info@mysocialweb.it – Tel: 340 7974009
                </p>
                <p class = 'text'>
                    Seguimi sui vari canali social e partecipa alle discussioni online.
                </p>
            </div>
        </div>
        <div id = 'flex_f2'>
            <div class = 'footer_item'>
                <p>© 2024 My Social Web - Tutti i diritti riservati</p>
            </div>
        </div>
</footer>
</body>

</html>
<?php mysqli_close($conn); ?>