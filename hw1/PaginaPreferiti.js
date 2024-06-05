async function VerificaPreferitoPaginaPreferiti(){
    for(let i = 0; i < ElementiPref.length; i++){

        const VerificaLikedArticoloForm = new FormData();
        VerificaLikedArticoloForm.append("titolo", ElementiPref[i].querySelector('h1').innerText);
        VerificaLikedArticoloForm.append("id", ElementiPref[i].dataset.index);

        const LikedResult = await fetch("VerificaPreferito.php", {
            method : "POST",
            body : VerificaLikedArticoloForm
            }).then((response) => {return response.text()}).then((text) => {
                
                return parseInt(text);
            
            });
       
        if(LikedResult === 1){

            console.log("Alreaduy liked post:" + ElementiPref[i].dataset.index);
            ElementiPref[i].querySelector('.preferito').innerText = '★';
            ElementiPref[i].querySelector('.preferito').removeEventListener('click', onPreferitoVuoto);
            ElementiPref[i].querySelector('.preferito').addEventListener('click', onPreferitoPieno);

        }    
    }
    console.log(ElementiPref);
}


async function onPreferitoVuoto(event){
    
    const result = await fetch("checkIfLogged.php").then((response) => {return response.text()}).then((text) => {
        return parseInt(text);
    })

    console.log(result);

    if(result === 1){
        globalEventVar = event;
        console.log(globalEventVar);    
        const DataPreferito = new FormData();
        DataPreferito.append("titolo", event.target.parentElement.querySelector('h1').innerText);
        DataPreferito.append("id", event.target.parentElement.dataset.index);

        fetch("AggiungiPreferito.php", {

            method : "POST",

            body: DataPreferito

        }).then((response) => {return response.text()}).then((text) => {
            console.log(text);
        })

        event.target.innerHTML = '★';
        event.target.removeEventListener('click', onPreferitoVuoto);
        event.target.addEventListener('click', onPreferitoPieno);
    }

}

function onPreferitoPieno(event){

        const DataRemovePreferito = new FormData();
        globalEventVar = event;
        console.log(globalEventVar);
        DataRemovePreferito.append("titolo", event.target.parentElement.querySelector('h1').innerText);
        DataRemovePreferito.append("id", event.target.parentElement.dataset.index);

        fetch("RimuoviPreferito.php", {

            method : "POST",

            body: DataRemovePreferito

        }).then((response) => {return response.text()}).then((text) => {
            console.log(text);
            location.reload();
        })


}

async function VerificaPreferitoFunzione(){
    for(let i = 0; i < ElementiPref.length; i++){

        const VerificaLikedArticoloForm = new FormData();
        VerificaLikedArticoloForm.append("titolo", ElementiPref[i].querySelector('h1').innerText);
        VerificaLikedArticoloForm.append("id", ElementiPref[i].dataset.index);

        const LikedResult = await fetch("VerificaPreferito.php", {
            method : "POST",
            body : VerificaLikedArticoloForm
            }).then((response) => {return response.text()}).then((text) => {
                
                return parseInt(text);
            
            });
       
        if(LikedResult === 1){

            console.log("Alreaduy liked post:" + ElementiPref[i].dataset.index);
            ElementiPref[i].querySelector('.preferito').innerText = '★';
            ElementiPref[i].querySelector('.preferito').removeEventListener('click', onPreferitoVuoto);
            ElementiPref[i].querySelector('.preferito').addEventListener('click', onPreferitoPieno);

        }    
    }
    console.log(ElementiPref);
}

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



const PreferitiButton = document.querySelectorAll('.preferito');
let globalEventVar;
const PreferitiPage = document.querySelector('#Articoli_salvati');

for(const PrefBottone of PreferitiButton){
    PrefBottone.addEventListener('click', onPreferitoVuoto);
}


const ElementiPref = document.querySelectorAll(".item_riga_pref");
VerificaPreferitoFunzione();

for(let i = 0; i < ElementiPref.length; i++){
    ElementiPref[i].querySelector('.immagine').addEventListener('click', ApriArticolo);
}
