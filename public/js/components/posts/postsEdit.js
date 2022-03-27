const addImageBtn = document.getElementById("addImageBtn");
const removeImageBtn = document.getElementById("removeImageBtn");
const imageplaceholder = document.getElementById("image_placeholder");
const isImageRemoved = document.getElementById("isImageRemoved");

let inputPath = document.querySelector("#image");

let file;

// if image exists
if(imageplaceholder.getAttribute('src') != ''){
    addImageBtn.style.display = "none";
    removeImageBtn.style.display = "block";
    imageplaceholder.style.display = "block";
}

function toggleBrowse() {
    inputPath.click();
}



function removeImage() {
    addImageBtn.style.display = "block";
    removeImageBtn.style.display = "none";
    imageplaceholder.style.display = "none";
    isImageRemoved.value = "removed";

    imageplaceholder.setAttribute('src', '');

    inputPath.value = null;
}

inputPath.addEventListener("change", function() {
    file = this.files[0];

    addImageBtn.style.display = "none";
    removeImageBtn.style.display = "block";
    imageplaceholder.style.display = "block";
    isImageRemoved.value = "";

    showImage();    
});

function showImage() {
    let fileType = file.type;

    let validExtensions = ["image/jpeg", "image/jpg", "image/png"];

    if(validExtensions.includes(fileType)) {
        let fileReader = new FileReader();

        fileReader.onload = ()=>{
            let fileURL = fileReader.result;

            imageplaceholder.setAttribute('src', fileURL);
        }

        fileReader.readAsDataURL(file);

    }
    else {
        alert("This is not an Image file");
    }
}