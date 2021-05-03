var fermerParent=document.getElementById("fermerParent");

fermerParent.addEventListener("click",function(){
    var parent=window.opener;
    parent.close();
});

var fermerEnfant=document.getElementById("fermerEnfant");

fermerEnfant.addEventListener("click",function(){
    window.close();
});