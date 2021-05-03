var qte = document.getElementById("quantite");
var pu = document.getElementById("prixUnitaire");
var p = document.getElementById("prix");
var qte2 = document.getElementById("quantite2");
var pu2 = document.getElementById("prixUnitaire2");
var p2 = document.getElementById("prix2");

//qte.addEventListener("input",calculPrix);

qte.addEventListener("input", function () {
    calculPrixAvecParametre(qte, pu, p)
});
// qte.addEventListener("click", message);
pu.addEventListener("input", function () {
    calculPrixAvecParametre(qte, pu, p)
});

qte2.addEventListener("input", function () {
    calculPrixAvecParametre(qte2, pu2, p2)
});
pu2.addEventListener("input", function () {
    calculPrixAvecParametre(qte2, pu2, p2)
});

function calculPrix() {
    p.value = qte.value * pu.value;
}

// function calculPrix2() {
//     p2.value = qte2.value * pu2.value;
// }
/**
 * Calcul et met à jour le prix en fonction de l'input quantité et l'input prix unitaire
 * @param {} qte input contenant la quantite
 * @param {} pu 
 * @param {} p 
 */
function calculPrixAvecParametre(quantite, prixU, prix) {
    prix.value = quantite.value * prixU.value;
}

// function message() {
//     console.log("saisir un nombre");
// }