//Version 1

// var amp = document.getElementById("ampoule");
// amp.addEventListener("click", function () {
//     if (amp.getAttribute("src") == "AmpouleHS.gif") {
//         amp.src = "AmpouleOK.gif";
//     } else {
//         amp.src = "AmpouleHS.gif";
//     }
// });


//avec interrupteur
// var etatAmpoule = "off";
// var lesBoutons = document.getElementsByTagName("button");
// for(let i=0;i<lesBoutons.length;i++)
// {
//     lesBoutons[i].addEventListener("click",changeAmpoule);
// }
// function changeAmpoule()
// {   
//     var amp = document.getElementById("ampoule");
//     if (etatAmpoule=="off")
//     {
//         amp.src = "AmpouleOK.gif";
//         etatAmpoule="on";
//     }
//     else{
//         amp.src = "AmpouleHS.gif";
//         etatAmpoule="off";
//     }
// }

//avec interrupteur et toto

var lesBoutons = document.getElementsByTagName("button");
for(let i=0;i<lesBoutons.length;i++)
{
    lesBoutons[i].addEventListener("click",changeAmpoule);
}
function changeAmpoule()
{   
    var amp = document.getElementById("ampoule");
    if (amp.getAttribute("toto")=="off")
    {
        amp.src = "AmpouleOK.gif";
        amp.setAttribute("toto","on");
    }
    else{
        amp.src = "AmpouleHS.gif";
        amp.setAttribute("toto","off");
    }
}
