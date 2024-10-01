const form = document.querySelector("#form");
const prenom = document.querySelector("#prenom");
const nom = document.querySelector("#nom");
const adresse = document.querySelector("#adresse");
const email = document.querySelector("#email");
const mdp1 = document.querySelector("#mdp1");
const mdp2 = document.querySelector("#mdp2");

form.addEventListener('submit',e=>{

 e.preventDefault();

form_verify();
})


function form_verify() {

const prenomValue = prenom.value.trim();
const nomValue = nom.value.trim();
const emailValue = email.value.trim();
const adresseValue = adresse.value.trim();
const pwdValue = mdp1.value.trim();
const pwd2Value = mdp2.value.trim();
if (prenomValue === "") {
 let message ="prenom ne peut pas être vide";
 setError(prenom,message);
}else if(!prenomValue.match(/^[a-zA-Z]/)){
 let message ="prenom doit commencer par une lettre";
 setError(prenom,message)
}else{
 let letterNum = prenomValue.length;
 if (letterNum < 3) {
     let message ="prenom doit avoir au moins 3 caractères";
     setError(prenom,message)
 } else {
     setSuccess(prenom);
 }
}

//nom verify
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
if (adresseValue === "") {
    let message ="adresse ne peut pas être vide";
    setError(adresse,message);
   }else if(!adresseValue.match(/^[a-zA-Z]/)){
    let message ="adesse doit commencer par une lettre";
    setError(adresse,message)
   }else{
    let letterNum = adresseValue.length;
    if (letterNum < 3) {
        let message ="adresse doit avoir au moins 3 caractères";
        setError(adresse,message)
    } else {
        setSuccess(adresse);
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

// password verify
if (pwdValue ==="") {
 let message ="Le passeword ne peut pas être vide";
 setError(mdp1,message)
}else if(!password_verify(pwdValue)){
 let message = "Le mot de passe est trop faible (8 à 12 caractères)";
 setError(mdp1,message)
}else{
 setSuccess(mdp1);
}
// pwd confirm
if (pwd2Value ==="") {
 let message ="Le passeword confirm ne peut pas être vide";
 setError(mdp2,message)
}else if( pwdValue !== pwd2Value){
 let message ="Les mot de passes ne correspondent pas";
 setError(mdp2,message)
}else{
 setSuccess(mdp2)
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

