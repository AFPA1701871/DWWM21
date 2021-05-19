input = document.getElementById("champ1");
input.addEventListener("input", verifInput);
erreur = document.getElementById("erreur");

function verifInput() {
    if (input.checkValidity()) 
    { erreur.innerHTML = "ok" }
    else {
        erreur.innerHTML = "KO"
    }
}