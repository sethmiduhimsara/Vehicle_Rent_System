
const email = document.getElementById('email');
const password = document.getElementById('password');
const form = document.getElementById('form');

const name_error = document.getElementById('email_error');
const password_error = document.getElementById('password_error');


form.addEventListener('submit',(e)=>{


    var email_check = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    if(!email.value.match(email_check)){
        e.preventDefault();
        email_error.innerHTML = "Invalid Email address";

    }
    
    else{
        email_error.innerHTML = "";
    }

    if(password.value.length < 6){
        e.preventDefault();
        password_error.innerHTML = "Password (least 6 characters)";

    }
    
    else{
        password_error.innerHTML = "";
    }

    if(password.value.length > 20){
        e.preventDefault();
        password_error.innerHTML = "Password (maximum 20 characters)";

    }

})