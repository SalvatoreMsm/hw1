
function onSignIN(event){

    event.preventDefault();
    log_container.classList.remove('login_form');
    log_container.classList.add('hidden');
    SignInFormContainer.classList.add('signin_form');
    SignInFormContainer.classList.remove('hidden');

    SignInForm.password.value = '';
    SignInForm.password.style.color = '#4b4f58';
    SignInForm.password.placeholder = 'Inserisci password...';
    SignInForm.confermaPassword.value = '';
    SignInForm.confermaPassword.style.color = '#4b4f58';
    SignInForm.confermaPassword.placeholder = 'Conferma password...';
    SignInForm.username.value = '';
    SignInForm.username.style.color = '#4b4f58';
    SignInForm.username.placeholder = 'Inserisci username...';

}

function SignAccount(event){


    event.preventDefault();
    if(
        SignInForm.username.value.length === 0 ||
        SignInForm.password.value.length === 0 ||
        SignInForm.confermaPassword.value.length === 0
    ){
        console.log("campi vuoti");
        console.log("Valore username: "+SignInForm.username.value +" Valore password: "+ SignInForm.password.value +"");
        return null;
    }


    if(SignInForm.password.value === SignInForm.confermaPassword.value)
    {
        
        if(!/\d/.test(SignInForm.password.value)){
            
            SignInForm.password.value = '';
            SignInForm.password.style.color = 'red';
            SignInForm.password.placeholder = 'Inserisci almeno un numero';
            SignInForm.confermaPassword.value = '';
            SignInForm.confermaPassword.style.color = 'red';
            SignInForm.confermaPassword.placeholder = 'Inserisci almeno un numero';
            return null;
            
        }

        const signinfetchBody = new FormData(SignInForm);

        fetch("signIn.php", {
            method : "POST",
            body: signinfetchBody
         }).then((response) => {return response.text()}).then((text) => {

            const PhpResult = parseInt(text);
            if(PhpResult === 1){

                console.log("Utente registrato con successo");
                SignInExitButton.click();

            }
            else if(PhpResult === 2){

                console.log("Utente non registrato con successo");
                SignInForm.username.value = '';
                SignInForm.username.style.color = 'red';
                SignInForm.username.placeholder = 'Utente già esistente';
                SignInForm.password.value = '';
                SignInForm.confermaPassword.value = '';
                return null;

            }

         })

    }
    else console.log("conferma diversa da password");
}



const SignInFormContainer = document.querySelector('#form_containerSignIn');
const SignInExitButton = SignInFormContainer.querySelector('.form_exit');
const SignInForm = document.forms['sign_in'];


LogInForm.sign_in.addEventListener('click', onSignIN);
SignInForm.crea.addEventListener('click', SignAccount);