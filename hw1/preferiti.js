
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
        DataPreferito.append("immagine", event.target.parentElement.querySelector('.immagine').style.backgroundImage);
        DataPreferito.append("testo", event.target.parentElement.querySelector('.hiddenText').innerText);
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
        DataRemovePreferito.append("immagine", event.target.parentElement.querySelector('.immagine').style.backgroundImage);
        DataRemovePreferito.append("testo", event.target.parentElement.querySelector('.hiddenText').innerText);
        DataRemovePreferito.append("id", event.target.parentElement.dataset.index);

        fetch("RimuoviPreferito.php", {

            method : "POST",

            body: DataRemovePreferito

        }).then((response) => {return response.text()}).then((text) => {
            console.log(text);
        })

    event.currentTarget.innerHTML = '☆';
    event.currentTarget.removeEventListener('click', onPreferitoPieno);
    event.currentTarget.addEventListener('click', onPreferitoVuoto);

}

async function onPreferitiPage(event){

    const result = await fetch("checkIfLogged.php").then((response) => {return response.text()}).then((text) => {
        return parseInt(text);
    })

    if(result === 1){
        fetch("CaricaPaginaPreferiti.php").then((response) => {return parseInt(response.text())}).then((result) => {

            if(result === 0){
                console.log("Errore non sono presenti articoli preferiti per questo utente");
                return null;
            }
            else{
                window.location.href = "CaricaPaginaPreferiti.php";
            }

        })
    }
    else{
        console.log("utente non loggato");
        return null;
    }

}

const PreferitiButton = document.querySelectorAll('.preferito');
let globalEventVar;
const PreferitiPage = document.querySelector('#Articoli_salvati');

for(const PrefBottone of PreferitiButton){
    PrefBottone.addEventListener('click', onPreferitoVuoto);
}
PreferitiPage.addEventListener('click', onPreferitiPage);