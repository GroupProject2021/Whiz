// Profile Image Drag and drop
const dropArea = document.querySelector(".form-drag-area");
let dropText = document.querySelector(".description");
const browseButton = document.querySelector(".form-upload");
let inputPath = document.querySelector("#profile_image");

let file;

    // For browse and upload option
browseButton.onclick = ()=>{
    inputPath.click();
}

inputPath.addEventListener("change", function() {
    file = this.files[0];

    showImage();    
});

    // For drag and drop and upload options
dropArea.addEventListener("dragover", (event)=>{
    event.preventDefault();
    dropArea.classList.add("active");
    dropText.textContent = "Release to Upload File"
});

dropArea.addEventListener("dragleave", ()=>{
    dropArea.classList.remove("active");
    dropText.textContent = "Drag & Drop to Upload File"
});

dropArea.addEventListener("drop", (event)=>{
    event.preventDefault();

    // take only one image when multiple inputs - 0 index
    file = event.dataTransfer.files[0];
    // take the single value -> creates a FileList(because input.files only accept FileList) -> then assign the FileList to inputpath.files
    let list = new DataTransfer();
    list.items.add(file)
    inputPath.files = list.files;

    showImage();
    dropArea.classList.remove("active");
});

function showImage() {
    let fileType = file.type;

    let validExtensions = ["image/jpeg", "image/jpg", "image/png"];

    if(validExtensions.includes(fileType)) {
        let fileReader = new FileReader();

        fileReader.onload = ()=>{
            let fileURL = fileReader.result;

            //  change the profile image and display it
            document.querySelector('#profile_image_placeholder').setAttribute('src', fileURL);
        }

        fileReader.readAsDataURL(file);

        // set profile image validation
        let validate = document.querySelector(".profile-image-validation");
        validate.classList.add("active");
    }
    else {
        alert("This is not an Image file");
        dropArea.classList.remove("active");
    }
}