var div1 = document.getElementById("div1");
div1.style.color = "blue";
div1.style.backgroundColor = "lightgrey";
div1.textContent = "TITI";

var logos = document.getElementsByTagName("img");

for (let i = 0; i < logos.length; i++) {
    logos[i].style.width = "40%";

}

var lesLogos = document.querySelectorAll("img");
var logo1er = document.querySelector("img");
logo1er.src = "afpa_noir.jpg";
logo1er.alt = "afpa_noir.jpg";
lesLogos.forEach(element => {
    element.style.border = "black 1px solid";
    element.style.borderRadius = "0.5em";
    //   alert(element.src);
});

var lesTitres = document.querySelectorAll(".titre");
lesTitres.forEach(element => {
    element.style.fontWeight = "900";
    element.style.display = "flex";
    element.style.justifyContent = "center";
});


/* LISTENER */

logo1er.addEventListener("mouseover", changeImage);
function changeImage() {
    if (logo1er.alt == "afpa_noir.jpg") {
        logo1er.src = "logo_Afpa.jpg";
        logo1er.alt = "logo_Afpa.jpg";
    }
    else {
        logo1er.src = "afpa_noir.jpg";
        logo1er.alt = "afpa_noir.jpg";
    }

}
div1.style.fontSize = "0.5em";
div1.addEventListener("click", changeTaille);
function changeTaille() {
    let taille = div1.style.fontSize;
    let nouvelleTaille = 2 * parseFloat(taille.substring( 0,taille.length - 2))
    div1.style.fontSize =nouvelleTaille+"em";
}




















