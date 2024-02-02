let img = document.getElementById("avatar-image");
let fileInput = document.getElementById("file-input");
let textUrl = document.getElementById("image-url");

fileInput.onchange = function(){

    img.src = URL.createObjectURL(fileInput.files[0]);
    textUrl.value= fileInput.value;

}

