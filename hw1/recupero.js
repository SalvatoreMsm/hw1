const PHOTO_LIST_BACKGROUND_NEXT = [
    /*"url(https://www.mysocialweb.it/wp-content/uploads/2024/03/recupero-sito-web.webp)",
    "url(https://www.mysocialweb.it/wp-content/uploads/2024/02/creare-link.webp)",
    "url(https://www.mysocialweb.it/wp-content/uploads/2024/02/anafora.webp)",
    "url(https://www.mysocialweb.it/wp-content/uploads/2024/02/punto-esclamativo-1.webp)"
    "url(https://www.mysocialweb.it/wp-content/uploads/2024/02/web-copywriter.webp)",
    "url(https://www.mysocialweb.it/wp-content/uploads/2024/02/immagini-blog.webp)"*/
];

const fetchUrl = "https://api.thecatapi.com/v1/images/search?size=med&mime_types=jpg&format=json&has_breeds=true&order=RANDOM&page=0&limit=3";
const api_key = "live_CwvnHQiPVuH4fgPe2KAOCixd8RursYqNmP20inbVyBkWk2ZBU1hxTuSAnpLfNKBJ";

let PHOTO_LIST_BACKGROUND_BACK = [];

/* FUNZIONI DELLA FETCH SU > */

function onSuccess(response){
    console.log(response.status);
    if (!response.ok){
        console.log("response non valida!");
        return null;
    }
    else
    return response.json();
}
function onError(response){
    console.log("errore: " + Error);
    return null
}

function onJson(json){
    console.log(json);
    for(let indice = 0; indice < 3; indice++)
    PHOTO_LIST_BACKGROUND_NEXT[indice] = "url(" + json[indice].url + ")";
}

/*    FUNZIONE CLICK SU LENTE  */

function onLente(event){
    const l = event.currentTarget;
    l.classList.add('hidden');
    for(let items of item){
        items.classList.add('hidden');
    }
    searchBar.classList.remove('hidden'); 
    blocco_x.classList.remove('hidden');
    blocco_x.classList.add('inlineBlock');
    const x = document.createElement('img');
        x.setAttribute('id','x');
        x.src = 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Red_X.svg/2048px-Red_X.svg.png';
        blocco_x.appendChild(x);
        x.addEventListener("click", onX); 
}

/* FUNZIONE CLICK SU X */

function onX(event){
    blocco_x.innerHTML = '';
    blocco_x.classList.add('hidden');
    blocco_x.classList.remove('inlineBlock');
    for(let items of item){
        items.classList.remove('hidden');
    }
    console.log(event.  currentTarget);  
    console.log(event);
    searchBar.classList.add('hidden');
    lente.classList.remove('hidden');
    
}

/* FUNZIONE CLICK SU > */

function forward(event){

        /* FETCH DELLE TRE IMMAGINI DI GATTI */

        fetch(fetchUrl, {headers:{
            'x-api-key': api_key
        }}).then(onSuccess, onError).then(onJson);

        for(let i = 0; i < 3; i++){

                let item = item_riga[i];
                let image = item.querySelector('.immagine');
                PHOTO_LIST_BACKGROUND_BACK.push(image.style.backgroundImage);
                image.style.backgroundImage = PHOTO_LIST_BACKGROUND_NEXT[i];
                


        }
        /*event.currentTarget.removeEventListener("click", forward);
        event.currentTarget.classList.add('hidden');
        bottone_premuto = event.currentTarget;*/

}

/* FUNZIONE CLICK SU < */

function backward(event){

    for(let i = 0; i < 3; i++){
        let item = item_riga[i];
        let image = item.querySelector('.immagine');
        image.style.backgroundImage = PHOTO_LIST_BACKGROUND_BACK.pop();

    }
   /* next_button.addEventListener("click", forward);
    bottone_premuto.classList.remove('hidden');*/

}


/* SELEZIONE ELEMENTI */

const lente = document.querySelector('.item_h_in_lente');
const searchBar = document.querySelector('#search_bar');
const item = document.querySelectorAll('.item_h_in');
let bottone_premuto;
const item_riga = Array.from(document.querySelectorAll('.item_riga'));
console.log(item_riga);
//const x = document.querySelector('#x');
const blocco_x = document.querySelector('.container_x');
blocco_x.classList.add('hidden');
next_button = document.querySelector('#next_button');
const previous_button = document.querySelector('#previous_button');

/* CREAZIONE LISTENER */

lente.addEventListener("click", onLente);
next_button.addEventListener("click", forward);
previous_button.addEventListener("click", backward);