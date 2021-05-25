
/**
 * Affiche le message d'erreur, change les couleurs et affiche les coches
 * @param {élément de type input} input 
 * @param {*} isValid 
 */
function impactValidity(input, isValid) {
    let invalide = input.previousElementSibling.textContent;
    requis = invalide.substr(0, invalide.length - 1) + " est requis";
    invalide = invalide.substr(0, invalide.length - 1) + " est invalide";
    switch (isValid) {
        case true:
            erreur.innerHTML = erreur.innerHTML.replace("<br>" + invalide, "");
            erreur.innerHTML = erreur.innerHTML.replace("<br>" + requis, "");
            break;
        case 0:
            erreur.innerHTML = erreur.innerHTML.replace("<br>" + invalide, "");
            if (erreur.innerHTML.indexOf(requis) == -1)
                erreur.innerHTML += "<br>" + requis;
            break;
        case false:
            erreur.innerHTML = erreur.innerHTML.replace("<br>" + requis, "");
            if (erreur.innerHTML.indexOf(invalide) == -1)
                erreur.innerHTML += "<br>" + invalide;
            break;
    }

}

/**
 * Activation du bouton de formulaire
 * Vérification de tous les champs
 */
function checkAllValidity() {
    var pasErreur = true;
    i = 0;
    j = 0;
    k = 0;
    // on vérifie les listeInput un à un
    while (pasErreur && i < listeInputAVerifier.length) {
        pasErreur = valideInput(listeInputAVerifier[i]);
        i++;
    }
    while (pasErreur && k < listeTextAreaAVerifier.length) {
        pasErreur = valideInput(listeTextAreaAVerifier[k]);
        k++;
    }
    while (listeSelectAVerifier != null && pasErreur && j < listeSelectAVerifier.length) {
        pasErreur = (listeSelectAVerifier[j].value != "")
        j++
    }
    // On teste qu'aucun message d'erreur n'est géré par un autre script
    if (pasErreur && erreur.innerHTML == "") {
        valider.disabled = false;
    } else {
        valider.disabled = true;
    }
}