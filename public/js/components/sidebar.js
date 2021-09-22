const sidebar = document.querySelector(".sidebar");
const main_content = document.querySelector(".main-content");
const header = document.querySelector("header");
const sidebarHandler = document.querySelector(".sidebar-handle");

function hider() {
    sidebar.style.left= "-100%";
    main_content.style.marginLeft = "0";
    header.style.left = "0";
    header.style.width = "100%";
}

function shower() {
    sidebar.style.left= "0";
    main_content.style.marginLeft = "280px";
    header.style.left = "280px";
    header.style.width = "calc(100% - 280px)";
}

let x = true;
sidebarHandler.addEventListener("click", () => {
    if(x) {
        hider();
        x = false;
    }
    else {
        shower();
        x = true;
    }
});