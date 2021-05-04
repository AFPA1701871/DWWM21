listeLabel = document.querySelectorAll("label");

for (let i = 0; i < listeLabel.length; i++) {
    listeLabel[i].addEventListener("click",function () {checkSibling(listeLabel[i])})   
};

function checkSibling(label) {
    input = label.previousElementSibling
    if (input.checked == false) {
        input.checked = true;
        label.style.color = 'white';
    }else{
        input.checked = false;
        label.style.color = 'black';
    }
};