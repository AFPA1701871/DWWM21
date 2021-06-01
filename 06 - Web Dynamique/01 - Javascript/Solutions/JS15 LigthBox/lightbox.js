listeImages = document.querySelectorAll("img");
lightbox = document.querySelector("#lightbox");
imageLigthBox = document.getElementById("imageLigthBox");

listeImages.forEach(element => {
    element.addEventListener("click", function () {
        lightbox.style.display = "flex"
        imageLigthBox.src = element.src;
    })
});

lightbox.addEventListener("click", function () {
    lightbox.style.display = "none";
})