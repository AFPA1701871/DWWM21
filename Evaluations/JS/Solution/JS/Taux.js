/****  Fonctions *****/
function verif(event) {
    // permet de controler la validité d'un champ du formulaire
    // on recupere l'input sur lequel faire la verification
    var monInput = event.target;
    //on recupere les elements correspondant à l'input
    var inputMessage = (monInput.parentNode.parentNode).getElementsByClassName('message')[0];

    if (!monInput.checkValidity()) {
        // force le test du pattern sur l'input
        inputMessage.innerHTML = monInput.validationMessage //"Format incorrect";
        tabErreur[monInput.id] = -1;
        inputMens.value = "";
        inputCout.value = "";
    } else //if (monInput.checkValidity())
    {
        inputMessage.innerHTML = "";
        tabErreur[monInput.id] = 1;
    }
    verifForm();
}

function verifForm() {
    // verifie la validité de tout le formulaire
    for (var key in tabErreur) {
        if (tabErreur[key] <= 0)
            return false;
    }
    //lance le calcul
    calcul();
    document.getElementById("calcul").disabled = false;
    return true;
}

function calcul() {
    //calcul des mensualité et du cout total
    var cap = document.getElementById("cap").value;
    var taux = parseFloat(document.getElementById("taux").value) / 100;
    var nbMois = document.getElementById("duree").value * 12;
    
    
    //on effectue les calculs
    var mens = parseFloat((cap * taux / 12) / (1 - Math.pow(1 + taux / 12, -nbMois))).toFixed(2);
    var cout = parseFloat(mens * nbMois).toFixed(2);
    //affichage du résultat
    inputMens.value = mens;
    inputCout.value = cout;
}

function reset() {
    //remise à 0 des inputs
    for (i = 0; i < lesInputs.length; i++) {
        lesInputs[i].value = "";
    }
    var lesMessages = document.getElementsByClassName("message");
    for (let i = 0; i < lesMessages.length; i++) {
         lesMessages[i].innerHTML="";  
    }
    document.getElementById("calcul").disabled = true;
}

/**** Variables *****/
//on récupere les valeurs ds inputs
var inputMens = document.getElementById("mens");
var inputCout = document.getElementById("cout");
var tabErreur = { // contient 0 si le champ est vide; 1 s'il est OK; -1 s'il y a une erreur
    "cap": 0,
    "taux": 0,
    "duree": 0
};
//on affecte les inputs
var lesInputs = document.getElementsByTagName("input");
for (i = 0; i < lesInputs.length; i++) {
    lesInputs[i].addEventListener("input", verif);
}
//on affecte le bouton nouveau calcul
document.getElementById("reset").addEventListener("click", reset);