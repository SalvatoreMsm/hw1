    <?php
        session_start();
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>
    <title>tst</title>
    <link rel = "stylesheet" href = "mhw3.css" />
    <link rel = "stylesheet" href = "login.css"/>
    <link rel = "stylesheet" href = "signin.css"/>
    <link rel = "stylesheet" href = "preferiti.css"/>
    <script src = "ajaxNews.js" defer></script>
    <script src = "preferiti.js" defer></script>
    <script src = "mhw3.js" defer></script>
    <script src = "login.js" defer></script>
    <script src = "signin.js" defer></script>

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
            <div class = 'hidden' id = 'search_viewAppend'></div>
            <div id = 'blocco_principale'>
                <h1 class = 'titolo'>Digital Marketing Blog</h1>
                <p>
                    Ciao, benvenuti su My Social Web. Qui trovi articoli dedicati al mondo del digital marketing, 
                    in particolar modo SEO, copywriting, social media marketing e web writing. 
                    Senza dimenticare la guida per blogger completa per aprire un blog da zero e posizionarti su 
                    Google.
                </p>
                <p>
                    In basso trovi gli ultimi post pubblicati. Leggili e fammi sapere se ti piacciono nei commenti.
                    Se vuoi iniziare a dare uno sguardo ai miei contenuti sul digital marketing puoi iniziare dalla pagina 
                    dedicata al libri per gestire un blog o a quella con risorse per fare blogging.
                </p>
                <h2 id = 'secondo_titolo'>Vuoi lavorare con me?</h2>
                <p>
                    C’è bisogno di una ricerca delle keyword per la SEO e una definizione del target. 
                    Hai bisogno di un piano editoriale sul digital marketing. Vuoi iniziare? Chiedimi 
                    un preventivo per il tuo piano editoriale, solo in questo modo puoi fare blogging 
                    come un professionista della scrittura.
                </p>
                <p>
                    Tutto questo non basta? Ecco un corso pensato per chi vuole impostare un piano editoriale adeguato 
                    alle proprie esigenze. Dai una svolta al tuo progetto, prenota il tuo corso per fare blogging e diventa 
                    parte di un mondo fatto per creare contenuti. E leggi gli articoli del blog.
                </p> 
                <div id = 'blocco_secondario'>
                    
                    <div class = 'hidden' id = 'form_container'>

                        <p class = 'form_exit'>X</p>

                        <form name = 'login'>

                            <div id = 'formDisplayLogin'>
                                <div>
                                    <p class = 'usernameLabel'>username</p>    
                                    <input type = 'text' class = 'username' name = 'username' placeholder="Inserisci username..."><br>
                                </div>

                                <div>
                                    <p>password</p>
                                    <input type = 'password' class = 'password' name = 'password' placeholder="Inserisci password..."><br>
                                </div>
                            </div>

                            <button type = 'submit' id = 'submit_button' name = 'Log_in'>Log in</button>
                            <button id = 'sign_in' name = sign_in>Sign in</button>

                        </form>     

                        
                    </div>

                    <div  id = 'form_containerSignIn' class = 'hidden'>

                        <p class = 'form_exit'>X</p>
    
                        <form name = 'sign_in'>
    
                            <div id = 'formDisplaySignin'>
                                <div>
                                    <p class = 'usernameLabel'>username</p>    
                                    <input type = 'text' class = 'username' name = 'username' placeholder="Inserisci username..."><br>
                                </div>
    
                                <div>
                                    <p>Crea password</p>
                                    <input type = 'password' class = 'password' name = 'password' placeholder="Inserisci password..."><br>
                                </div>    
    
                                <div>
                                    <p>Conferma password</p>
                                    <input type = 'password' class = 'password' name = 'confermaPassword' placeholder="Conferma password..."><br>
                                </div>
                            </div>
    
                            <button type = 'submit' id = 'crea' name = 'crea'>Crea</button>
    
    
                        </form>     
    
                   
                    </div>

                    <div class = 'riga'>
                        <div class = 'item_riga' data-index = '0'>                         
                            <div class = 'immagine' data-image = '0'></div>
                        <h1 data-header = '0'></h1>
                            <p data-text = '0'></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>
                        </div>
                        <div class = 'item_riga' data-index = '1'>
                            <div class = 'immagine' data-image = '1'></div>
                            <h1 data-header = '1'></h1>
                            <p data-text = '1'></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>
                        </div>
                        <div class = 'item_riga' data-index = '2'>
                            <div class = 'immagine' data-image = '2'></div>                                            
                            <h1 data-header = '2'></h1>
                            <p data-text = '2'></p>
                            <p class = 'hiddenText'></p>  
                            <div class = 'preferito'>☆</div>
                        </div>
                    </div>
                    <div class = 'riga'>
                        <div class = 'item_riga' data-index = '3'>                         
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>
                        </div>
                        <div class = 'item_riga' data-index = '4'>
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>
                        </div>
                        <div class = 'item_riga' data-index = '5'>
                            <div class = 'immagine'></div>                                            
                            <h1></h1>
                            <p></p>  
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>
                        </div>
                    </div>

                    <div class = 'riga'>
                        <div class = 'item_riga' data-index = '6'>                         
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>
                        </div>
                        <div class = 'item_riga' data-index = '7'>
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>
                        </div>
                        <div class = 'item_riga' data-index = '8'>
                            <div class = 'immagine'></div>                                            
                            <h1></h1>
                            <p></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>  
                        </div>
                    </div>

                    <div class = 'riga'>
                        <div class = 'item_riga' data-index = '9'>                         
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>
                        </div>
                        <div class = 'item_riga' data-index = '10'>
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>
                        </div>
                        <div class = 'item_riga' data-index = '11'>
                            <div class = 'immagine'></div>                                            
                            <h1></h1>
                            <p></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>  
                        </div>
                    </div>

                    <div class = 'riga'>
                        <div class = 'item_riga' data-index = '12'>                         
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>
                        </div>
                        <div class = 'item_riga' data-index = '13'>
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>
                        </div>
                        <div class = 'item_riga' data-index = '14'>
                            <div class = 'immagine'></div>                                            
                            <h1></h1>
                            <p></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>  
                        </div>
                    </div>
                    <div class = 'riga'>
                        <div class = 'item_riga' data-index = '15'>                         
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>
                        </div>
                        <div class = 'item_riga' data-index = '16'>
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>
                        </div>
                        <div class = 'item_riga' data-index = '17'>
                            <div class = 'immagine'></div>                                            
                            <h1></h1>
                            <p></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>  
                        </div>
                    </div>
                    <div class = 'riga'>
                        <div class = 'item_riga' data-index = '18'>                         
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>
                        </div>
                        <div class = 'item_riga' data-index = '19'>
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>
                        </div>
                        <div class = 'item_riga' data-index = '20'>
                            <div class = 'immagine'></div>                                            
                            <h1></h1>
                            <p></p>
                            <p class = 'hiddenText'></p>
                            <div class = 'preferito'>☆</div>  
                        </div>
                    </div>

                    <div class = 'colonna_secondario'>
                        <div class = 'item_colonna'>
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                        </div>
                    </div>

                    <div class = 'colonna_secondario'>
                        <div class = 'item_colonna'>
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                        </div>
                    </div>

                    <div class = 'colonna_secondario'>
                        <div class = 'item_colonna'>
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                        </div>
                    </div>

                    <div class = 'colonna_secondario'>
                        <div class = 'item_colonna'>
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                        </div>
                    </div>

                    <div class = 'colonna_secondario'>
                        <div class = 'item_colonna'>
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                        </div>
                    </div>

                    <div class = 'colonna_secondario'>
                        <div class = 'item_colonna'>
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                        </div>
                    </div>

                    <div class = 'colonna_secondario'>
                        <div class = 'item_colonna'>
                            <div class = 'immagine'></div>
                            <h1></h1>
                            <p></p>
                        </div>
                    </div>

                </div>
                <div id = 'barra_scorrimento'>
                    <div class = 'flex_scorrimento'>
                        <div class = 'link_scorrimento'><a>1</a></div>
                        <div class = 'link_scorrimento'><a>2</a></div>
                        <div class = 'link_scorrimento'><a>...</a></div>
                        <div class = 'link_scorrimento'><a>51</a></div>
                    </div>

                    <a id = 'succ'>Successivo -></a>
                </div>
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