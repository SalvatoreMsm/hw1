const ApiKey = "&apiKey=f01a29d419fe4e4db80309a85338811b";

const data = new FormData();
data.append("ApiKey", ApiKey);
let jsonAjax;
let NumArtMax = 0;
let NumArtCurrent = 0;
const Righe = document.querySelectorAll('.riga');
const ElementiRighe = [];

function ApriArticolo(event){
    console.log(event);
    titolo = event.target.parentElement.querySelector('h1').innerText;
    id = event.target.parentElement.dataset.index;

    fetch("CarcicaPaginaArticolo.php?titolo="+titolo+"&id="+id, {
        method : "GET",
    }).then((response) => {return response.text()}).then((text) => {

        const result = parseInt(text);
        if(result === 0){

            console.log("Errore Articolo non presente nel database");
            return null;

        }
        else{
            window.location.href = "CarcicaPaginaArticolo.php?titolo="+titolo+"&id="+id;
        }

    })
}

async function VerificaPreferitoFunzione(){
    for(let i = 0; i < ElementiRighe.length; i++){

        const VerificaLikedArticoloForm = new FormData();
        VerificaLikedArticoloForm.append("titolo", ElementiRighe[i].querySelector('h1').innerText);
        VerificaLikedArticoloForm.append("immagine", ElementiRighe[i].querySelector('.immagine').style.backgroundImage);
        VerificaLikedArticoloForm.append("testo", ElementiRighe[i].querySelector('.hiddenText').innerText);
        VerificaLikedArticoloForm.append("id", ElementiRighe[i].dataset.index);

        const LikedResult = await fetch("VerificaPreferito.php", {
            method : "POST",
            body : VerificaLikedArticoloForm
            }).then((response) => {return response.text()}).then((text) => {
                
                return parseInt(text);
            
            });
       
        if(LikedResult === 1){

            console.log("Alreaduy liked post:" + ElementiRighe[i].dataset.index);
            ElementiRighe[i].querySelector('.preferito').innerText = '★';
            ElementiRighe[i].querySelector('.preferito').removeEventListener('click', onPreferitoVuoto);
            ElementiRighe[i].querySelector('.preferito').addEventListener('click', onPreferitoPieno);

        }    
    }
    console.log(ElementiRighe);
}

async function FetchNews(){

 await fetch("newsFetch.php", {
        method : 'POST',
        body : data
    }).then((response) => {return response.json()}).then((jsonNews) => {
        console.log(jsonNews.totalResults);
        for(const Riga of Righe){

            const RigaElements = Riga.querySelectorAll('.item_riga');
            for(let i = 0; i < RigaElements.length; i++){
                // RigaElements[i].querySelector('immagine').style.backgroundImage = "url("+jsonAjax.articles[NumArtCurrent].urlToImage+")";
                // RigaElements[i].querySelector(h1).innerText = jsonAjax.articles[NumArtCurrent].title;
                // RigaElements[i].querySelector(p).innerText = jsonAjax.articles[NumArtCurrent].description;
                // NumArtCurrent++;
                // NumArtMax--; 
                RigaElements[i].querySelector('.immagine').style.backgroundImage = "url("+jsonNews.articles[NumArtCurrent].urlToImage+")";
                RigaElements[i].querySelector('h1').innerText = jsonNews.articles[NumArtCurrent].title;
                RigaElements[i].querySelector('p').innerText = jsonNews.articles[NumArtCurrent].description;
                RigaElements[i].querySelector('.hiddenText').innerText = jsonNews.articles[NumArtCurrent].content;
                NumArtCurrent++;
                NumArtMax--; 
                ElementiRighe.push(RigaElements[i]);
            }
        
        }
        return ElementiRighe;});
}

async function CaricaInDatabase(caricaArticoloForm){
    const CheckIfLoaded = await fetch("caricaArticolo.php", {
        method : "POST",
        body : caricaArticoloForm
    }).then((response) => {return response.text()}).then((text) => {return text});
    console.log(CheckIfLoaded);
    return CheckIfLoaded;
}

FetchNews().then(async (response) => {
    console.log("Aoooooo a maggica sei lunga: "+ ElementiRighe.length);

    for(let i = 0; i < ElementiRighe.length; i++){

        const caricaArticoloForm = new FormData();
        caricaArticoloForm.append("titolo", ElementiRighe[i].querySelector('h1').innerText);
        caricaArticoloForm.append("immagine", ElementiRighe[i].querySelector('.immagine').style.backgroundImage);
        caricaArticoloForm.append("testo", ElementiRighe[i].querySelector('.hiddenText').innerText);
        caricaArticoloForm.append("id", ElementiRighe[i].dataset.index);
        // console.log(ElementiRighe[i].dataset.index + " index:" + i);
        const isLoaded = await CaricaInDatabase(caricaArticoloForm);
    }
    
}).then(async (AnotherResponse) => {

    VerificaPreferitoFunzione();
    for(let i = 0; i < ElementiRighe.length; i++){
        ElementiRighe[i].querySelector('.immagine').addEventListener('click', ApriArticolo);
    }
    return null;
})



 

    









