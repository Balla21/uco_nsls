/*
    Verify the login connection in order to access the admin page
*/
const loginButton = document.getElementById("login-button");
let loginInput = document.getElementById("user_login");
let passwordInput = document.getElementById("user_password");
loginButton.addEventListener('click',(event)=>{
    if(loginInput.value != "nslsuco" || passwordInput.value != "society123nslsuco" ){
        console.log(loginInput.value, typeof loginInput);
        console.log(passwordInput.value, typeof passwordInput);

        alert("Wrong login or password");
        event.preventDefault();
    }
});


/*
    Verify input for update request
*/



