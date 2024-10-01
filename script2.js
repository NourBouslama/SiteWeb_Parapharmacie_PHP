const form = document.querySelector("#form");
const nom = document.querySelector("#nom");
const email = document.querySelector("#email");
const email2 = document.querySelector("#email2");
const message1 = document.querySelector("#message");

form.addEventListener('submit',e=>{

 e.preventDefault();

form_verify();
})


function form_verify() {

const nomValue = nom.value.trim();
const emailValue = email.value.trim();
const email2Value = email2.value.trim();
const messageValue = message1.value.trim();
if (nomValue === "") {
 let message ="nom ne peut pas être vide";
 setError(nom,message);
}else if(!nomValue.match(/^[a-zA-Z]/)){
 let message ="nom doit commencer par une lettre";
 setError(nom,message)
}else{
 let letterNum = nomValue.length;
 if (letterNum < 3) {
     let message ="nom doit avoir au moins 3 caractères";
     setError(nom,message)
 } else {
     setSuccess(nom);
 }
}

//nom verify
if (messageValue === "") {
 let message ="message ne peut pas être vide";
 setError(message1,message);
}else if(!messageValue.match(/^[a-zA-Z]/)){
 let message ="message doit commencer par une lettre";
 setError(message1,message)
}else{
 let letterNum = messageValue.length;
 if (letterNum < 5) {
     let message ="message doit avoir au moins 5 caractères";
     setError(message1,message)
 } else {
     setSuccess(message1);
 }
}

// email verify
if (emailValue === "") {
 let message = "Email ne peut pas être vide";
 setError(email,message);
}else if(!email_verify(emailValue)){
 let message = "Email non valide";
 setError(email,message);
}else{
 setSuccess(email)
}


// pwd confirm
if (email2Value ==="") {
 let message ="Le Email confirm ne peut pas être vide";
 setError(email2,message)
}else if(!email_verify(email2Value)){
    let message = "Email non valide";
    setError(email2,message);
}else if( emailValue !== email2Value){
 let message ="Les 2 email ne correspondent pas";
 setError(email2,message)
}else{
 setSuccess(email2)
}
}


function setError(elem,message) {
const formControl = elem.parentElement;
const small = formControl.querySelector('small');

// Ajout du message d'erreur
small.innerText = message 

// Ajout de la classe error
formControl.className = "form-control error";
}

function setSuccess(elem) {
const formControl = elem.parentElement;
formControl.className ='form-control success';
}

function email_verify(email) {
/*
* r_rona.22-t@gmail.com
 /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/
*/
return /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/.test(email);
}
function password_verify(passeword) {
return /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,12}$/.test(passeword);
}

