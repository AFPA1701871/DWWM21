document.addEventListener("click",colorChange);
window.addEventListener("load",colorfixe);

function colorfixe(){
    document.querySelectorAll("h1").forEach(element => {
        element.style.color='#ff0000';
        console.log(element);
    });
    document.querySelectorAll("h2").forEach(element => {
        element.style.color='#00ff00';
    })
    document.querySelectorAll("h3").forEach(element => {
        element.style.color='#0000ff';
    });
}

function colorChange(event){
    let theElement=event.target;
    let theName=theElement.tagName;
    if(theName=="P"){
        
        if(theElement.style.color=='rgb(204, 204, 204)'){
            theElement.style.color='#000';
            
        }else{
            theElement.style.color='#ccc';
        }
    }else{
        document.querySelectorAll(theName).forEach(element => {
            if (element.style.color=='rgb(255, 0, 0)') {
                element.style.color='#00ff00';
            } else if (element.style.color=='rgb(0, 255, 0)'){
                element.style.color='#0000ff'
            } else{
                element.style.color='#ff0000'
            }
        });
    }
}