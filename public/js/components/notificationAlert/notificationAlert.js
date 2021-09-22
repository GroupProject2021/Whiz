const alertMsg = document.querySelector(".alert");
const closeBtn = document.querySelector(".close-btn");

closeBtn.addEventListener("click", () => {
    hideAlert();
});

function hideAlert() {
    alertMsg.classList.remove("show");
    alertMsg.classList.add("hide");
}

function showAlert() {
    alertMsg.classList.remove("hide");
    alertMsg.classList.add("show");
    alertMsg.classList.add("showAlert");
}