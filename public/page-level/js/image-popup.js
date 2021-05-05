let modal = document.getElementById("imageModal");

let img = document.getElementsByClassName("img-popup");
let modalImg = document.getElementById("img01");
let captionText = document.getElementById("caption");

$('body').delegate('.img-popup' , 'click', function () {
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
});

let span = document.getElementsByClassName("close")[0];

span.onclick = function() {
    modal.style.display = "none";
};
