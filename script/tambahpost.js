const dropArea = document.getElementById("drop-area");
const inputFile = document.getElementById("input-file");
const uploadedImage = document.getElementById("upload-image");
const uploadText = document.getElementById("upload-text");

inputFile.addEventListener("change", uploadImage);

function uploadImage(){
    let imgLink = URL.createObjectURL(inputFile.files[0]);
    uploadedImage.src = imgLink;
    uploadedImage.style.borderRadius = "20px";
    uploadedImage.style.width = "50%";
    uploadText.style.display = "none";
}