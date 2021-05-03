var image=document.getElementById("image");
var nouvelleFenetre="";
image.addEventListener("click",function(){
    var nouvelleFenetre=window.open("2.html");
});

var fermerFille=document.getElementById("image");

fermerFille.addEventListener("click",function(){
    nouvelleFenetre.close();
});