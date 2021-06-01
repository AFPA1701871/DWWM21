//variables 
// on récupère la liste cachée dans un input
liste = document.getElementById("liste").value.split(',');


positionDebut = 0;        // début de la liste à afficher
nombreOccurence = 5;     // nombre d'élément par page
pageActuelle = 1;       // page actuellement affichée
maxPages = Math.ceil(liste.length / nombreOccurence);  // nombre maximal de pages

//listener
document.getElementById("lastPage").addEventListener("click", lastPage);
document.getElementById("firstPage").addEventListener("click", firstPage);
document.getElementById("previous").addEventListener("click", previous);
document.getElementById("nextPage").addEventListener("click", nextPage);

//affichage départ
affichePage();

//function
function affichePage() {
    let affichage = ""; // contient le contenu à afficher
    //on affiche les éléments de la liste. 
    // cette partie peut être remplacée par une API qui précise la tranche de données à envoyer
    for (let i = positionDebut; i < positionDebut + nombreOccurence; i++) {
        if (i < liste.length) {
            affichage += '<div>' + liste[i] + '</div>';
        }
    }
    document.getElementById('espaceListe').innerHTML = affichage;
    numPage();
}
function nextPage() {
    if (positionDebut + nombreOccurence <= liste.length) {
        positionDebut += nombreOccurence;
        pageActuelle++;
        affichePage();
    }
}
function previous() {
    if (positionDebut - nombreOccurence >= 0) {
        positionDebut -= nombreOccurence
        pageActuelle--;
        affichePage();
    }
}
function firstPage() {
    positionDebut = 0
    pageActuelle = 1;
    affichePage();
}

function lastPage() {
    positionDebut = (maxPages - 1) * nombreOccurence;
    pageActuelle = maxPages;
    affichePage();
}
function numPage() {
    document.getElementById('numPage').innerHTML = 'Page ' + pageActuelle + ' / ' + maxPages;
}