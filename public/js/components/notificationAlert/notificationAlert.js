// notifications
$(document).ready(function() {
    // onload show notificaitons
    $.ajax({
        url: URLROOT+"/Notifications/getNotifications/"+USER_ID,
        dataType: "html",
        success: function(results) {
            $('#notifications').html(results);
        }
    })
})


// obselute
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