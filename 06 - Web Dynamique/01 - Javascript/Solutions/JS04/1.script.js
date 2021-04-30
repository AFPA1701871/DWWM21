var q1=document.getElementById("q1");
var pu1=document.getElementById("pu1");
var p1=document.getElementById("p1");
var q2=document.getElementById("q2");
var pu2=document.getElementById("pu2");
var p2=document.getElementById("p2");
var pTot=document.getElementById("pTot");

// q1.addEventListener("change",calcul);
// pu1.addEventListener("change",calcul);
// q2.addEventListener("change",calcul);
// pu2.addEventListener("change",calcul);

var lesInputs = document.getElementsByTagName("input");
for(let i=0;i<lesInputs.length;i++)
{
    lesInputs[i].addEventListener("change",calcul);
}

function calcul(){
    p1.value = q1.value* pu1.value;
    p2.value = q2.value* pu2.value;
    pTot.value = parseInt(p1.value) + parseInt(p2.value);
}