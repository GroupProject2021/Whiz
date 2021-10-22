// const browseButton = document.querySelector(".profpic");
const editProfPicBtn = document.getElementById("edit_profpic_click");
const saveChanges = document.getElementById("save_profilepic_click");            
const cancelChanges = document.getElementById("canceledit_profpic_click");

let tempPreviousImage;

let inputPath = document.querySelector("#profile_image");

let file;

function toggleBrowse() {
    inputPath.click();
}

function cancelProfPicChange() {
    editProfPicBtn.style.display = "block";
    saveChanges.style.display = "none";
    cancelChanges.style.display = "none";

    document.querySelector('#profile_image_placeholder').setAttribute('src', tempPreviousImage);
    inputPath.value = null;
}

inputPath.addEventListener("change", function() {
    file = this.files[0];

    editProfPicBtn.style.display = "none";
    saveChanges.style.display = "block";
    cancelChanges.style.display = "block";

    showImage();    
});

function showImage() {
    let fileType = file.type;

    let validExtensions = ["image/jpeg", "image/jpg", "image/png"];

    if(validExtensions.includes(fileType)) {
        let fileReader = new FileReader();

        fileReader.onload = ()=>{
            let fileURL = fileReader.result;

            //  change the profile image and display it
            tempPreviousImage = document.querySelector('#profile_image_placeholder').getAttribute('src');

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