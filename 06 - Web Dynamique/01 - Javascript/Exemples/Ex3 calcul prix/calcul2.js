// var qte = document.getElementById("quantite");
// var pu = document.getElementById("prixUnitaire");
// var p = document.getElementById("prix");
// var qte2 = document.getElementById("quantite2");
// var pu2 = document.getElementById("prixUnitaire2");
// var p2 = document.getElementById("prix2");

// //qte.addEventListener("input",calculPrix);
// lesInputs = document.getElementsByTagName("input");
// for (let i = 0; i < lesInputs.length; i++) {
//     lesInputs[i].addEventListener("input",calculPrix)
// }


// function calculPrix() {
//     p.value = qte.value * pu.value;
//     p2.value = qte2.value * pu2.value;
// }


// V2
// on recupere tous les inputs de la page
lesInputs = document.getElementsByTagName("input");
for (let i = 0; i < lesInputs.length; i++) {
    lesInputs[i].addEventListener("input", calculPrix)
}

function calculPrix(event) {
    //on recupere l'input qui a été modifié
    inputModifie = event.target;
    // on peut mettre autant de parentNode que necessaire
    divParent = inputModifie.parentNode;
    // on recupere les inputs de la div parent
    lesInputsChoisis = divParent.getElementsByTagName("input");
    lesInputsChoisis[2].value = lesInputsChoisis[0].value * lesInputsChoisis[1].value;
    CalculTotal();
}

function CalculTotal() {
    somme = 0;
    lesPrix = document.querySelectorAll("input[disabled]");
    for (let i = 0; i < lesPrix.length - 1; i++) {
        if (lesPrix[i].value != "") {
            somme += parseInt(lesPrix[i].value);
        }
    }
    lesPrix[lesPrix.length - 1].value = somme;
}