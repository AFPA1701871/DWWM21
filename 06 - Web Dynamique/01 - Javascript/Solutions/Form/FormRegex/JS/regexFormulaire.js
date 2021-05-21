// on recupere les input et on declecnhe les evnements pour faire les controles
var nom = document.getElementById('nom');
// l'evenement input est declenché chaque fois qu'une touche est enfoncée , 
// permet un controle plus dynamique que blur(perte de focus)
nom.addEventListener("input", verif);
var date = document.getElementById('date');
date.addEventListener("input", verif);
var postal = document.getElementById('postal');
postal.addEventListener("input", verif);
var numero = document.getElementById('numero');
numero.addEventListener("input", verif);
var motPasse = document.getElementById('motDePasse');
motPasse.addEventListener("input", verif);
var confirm = document.getElementById('confirm');
confirm.addEventListener("input", verifConfirm);
// l'evenement paste est déclenché si on tente de coller le presse-papier (par clic droit ou ctrl v)
confirm.addEventListener("paste", annule);
var email = document.getElementById('email');
email.addEventListener("input", verif);
var condition = document.getElementById("condition");
condition.addEventListener("click", verifCondition);
var oeil = document.getElementById("oeil");
// on affiche un petit oeil qui permet de voir de mot de passe 
oeil.addEventListener("mousedown", function (){ affichePassWord(true);});
oeil.addEventListener("mouseup", function (){ affichePassWord(false);});
//Gestion des erreurs
var tabErreur = {// contient 1 si le champ est en erreur; 0 sinon
    "nom": 1,
    "genre": 0, //champ prérenseigné
    "ddn": 1,
    "postal": 1,
    "numero": 1,
    "motDePasse": 1,
    "confirm": 1,
    "mail": 1,
    "condition":0 //champ prérenseigné
}; 


function verif(event) {
    // permet de controller la validité d'un champ du formulaire
    // on recupere l'input sur lequel faire la verification
    var monInput = event.target;
    //on recupere les elements correspondant à l'input
    var imgVerte = (monInput.parentNode).getElementsByClassName("boutonVert")[0];
    var imgRouge = (monInput.parentNode).getElementsByClassName("boutonRouge")[0];
    var message = (monInput.parentNode).getElementsByClassName('message')[0];

    if (monInput.value == '') {
        // si le champ est vide, on affiche rien
        imgRouge.style.visibility = 'hidden';
        imgVerte.style.visibility = 'hidden';
        message.innerHTML = "champ manquant";
    } else if (!monInput.checkValidity()) {
        // force le test du pattern sur l'input
        imgRouge.style.visibility = 'visible';
        imgVerte.style.visibility = 'hidden';
        message.innerHTML = "Format incorrect";
    } else //if (monInput.checkValidity())
    {
        imgVerte.style.visibility = 'visible';
        imgRouge.style.visibility = 'hidden';
        message.innerHTML = "";
        tabErreur[monInput.name]=0;
    }
    if (monInput.id=="motDePasse"){
        oeil.style.visibility="visible";
    }
    verifForm();
}

function verifConfirm(event) {
    // verifie que la confirmation du mot de passe est egale au mot de passe
    var monInput = event.target;
    var pass = motDePasse.value;
    var conf = confirm.value;
    var imgVerte = (monInput.parentNode).getElementsByClassName("boutonVert")[0];
    var imgRouge = (monInput.parentNode).getElementsByClassName("boutonRouge")[0];
    var message = (monInput.parentNode).getElementsByClassName('message')[0];
    if (monInput.value === "") {
        imgRouge.style.visibility = 'hidden';
        imgVerte.style.visibility = 'hidden';
        message.innerHTML = "champ manquant";
    } else if (conf === pass) {
        imgRouge.style.visibility = 'hidden';
        imgVerte.style.visibility = 'visible';
        message.innerHTML = "";
        tabErreur[monInput.name]=0;
    } else {
        imgVerte.style.visibility = 'hidden';
        imgRouge.style.visibility = 'visible';
        message.innerHTML = "la confirmation n'est pas égale au mot de passe";
    }
    verifForm();
}

function annule(event) {
    //methode qui empeche le coller dans l'input confirm 
    event.preventDefault()
    return false;
}

function verifForm() {
    // verifie la validité de tout le formulaire
    document.getElementById('submit').disabled = false;
    for (var key in tabErreur) {
        if (tabErreur[key]==1)
        document.getElementById('submit').disabled =true;
    }

}
function verifCondition(event){
    if (event.target.checked)
    tabErreur[event.target.name]=0;
    else tabErreur[event.target.name]=1;
    verifForm();
}
function affichePassWord(flag){
    inputMDP = document.getElementById("motDePasse");
    if (flag) inputMDP.type="text";
    else inputMDP.type="password";
}
