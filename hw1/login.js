function onLogButton(event){
    event.preventDefault();
    fetch("checkIfLogged.php").then((response) => {return response.text()}).then((text) =>{
        console.log(text);
        if(parseInt(text) === 0){
            log_container.classList.add('login_form');
            log_container.classList.remove('hidden');
            log_top_button.classList.add('hidden');
        }
        else{
            log_top_button.removeEventListener('click', onLogButton);
            log_top_button.addEventListener('click', UserOptions);
        }
    })

}

function onExitButton(event){
    if(log_container.classList.contains('login_form'))
    {
        log_container.classList.remove('login_form');
        log_container.classList.add('hidden');
    }
    if(SignInFormContainer.classList.contains('signin_form')){
        SignInFormContainer.classList.remove('signin_form');
        SignInFormContainer.classList.add('hidden');
    }
    if(log_top_button.classList.contains('hidden')) log_top_button.classList.remove('hidden');
}

function onLogIN(event){
    event.preventDefault();

    const fetchBody = new FormData(LogInForm);
    console.log(fetchBody);
    fetch('login.php', {
        method : "POST",
        body : fetchBody
    }).then((response) => { return (response.text())}).then((text) => {
        
        // log_top_button.textContent = text;
        // log_top_button.removeEventListener('click', onLogButton);
        // log_container.classList.add('hidden');
        // log_top_button.classList.remove('hidden');
        // log_top_button.addEventListener('click', UserOptions);
        const logResult = parseInt(text);
        console.log(text);
        if(logResult === 1){
            window.location.reload();
        }
        else{
            LogInForm.username.value = '';
            LogInForm.username.style.color = 'red';
            LogInForm.username.placeholder = 'Utente o pass errata';
            LogInForm.password.value = '';
            LogInForm.password.style.color = 'red';
            LogInForm.password.placeholder = 'Utente o pass errata';
        }
    });
}

function UserOptions(event){
    
    UserAppendBox.classList.add('UserBox'); 
    UserAppendBox.classList.remove('hidden');
    const button1 = document.createElement('button');
    const button2 = document.createElement('button');
    button1.textContent = 'Modifica Account';
    button2.textContent = 'Esci';
    button1.classList.add('UserButtons');
    button2.classList.add('UserButtons')
    UserAppendBox.appendChild(button1);
    UserAppendBox.appendChild(button2);
    button1.addEventListener('click', OpenModAccountPage);
    button2.addEventListener('click', logout);
    event.currentTarget.removeEventListener('click', UserOptions);
    event.currentTarget.addEventListener('click', closeUserOptions);    
}

function closeUserOptions(event){
    UserAppendBox.innerHTML = '';
    UserAppendBox.classList.remove('UserBox');
    UserAppendBox.classList.add('hidden');
    event.currentTarget.removeEventListener('click', closeUserOptions);
    event.currentTarget.addEventListener('click', UserOptions);
}

function logout(event){
    fetch('logout.php').then((response) => {return response.text()}).then((text) => {
        if(Number(text) === 1){
            window.location.href = 'index.php';
        }
    })
}

function OpenModAccountPage(event){

    

}


const log_top_button = document.querySelector('#login');
const log_container = document.querySelector('#form_container');
const exit_buttons = document.querySelectorAll('.form_exit');
const UserAppendBox = document.querySelector('#UserAppend');
const LogInForm = document.forms['login'];

log_top_button.addEventListener('click', onLogButton);
for( const exit_button of exit_buttons )
    {
    exit_button.addEventListener('click', onExitButton);
    }
console.log(exit_buttons);
LogInForm.Log_in.addEventListener('click', onLogIN);
