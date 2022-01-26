// notifications
$(document).ready(function() {
    // onload show notificaitons
    getNotifications(OWN_USER_ID);

    // onload get notificaiton amount
    getNotificationAmount(OWN_USER_ID);
})

function getNotifications(receiverId) {
    $.ajax({
        url: URLROOT+"/Notifications/getNotifications/"+receiverId,
        dataType: "html",
        success: function(results) {
            $('#notifications').html(results);
        }
    })
}

function getNotificationAmount(receiverId) {
    $.ajax({
            url: URLROOT+"/Notifications/getNotificationAmount/"+receiverId,
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(amount) {
                $('#red-notification-count').text(amount);

                if(amount > 0) {
                    $('#red-notification-count').show();
                    $('#red-notification-count').css('padding', '1px');
                }
                else {
                    $('#red-notification-count').hide();
                }
            }
    })
}

function deleteNotification(notificaitonId) {
    $.ajax({
        url: URLROOT+"/Notifications/deleteNotification/"+notificaitonId,
        method: "post",
        data: $('form').serialize(),
        dataType: "text",
        success: function(amount) {
            // update
            getNotifications(OWN_USER_ID);
            getNotificationAmount(OWN_USER_ID);
        }
})
}


// obselute
// const alertMsg = document.querySelector(".alert");
// const closeBtn = document.querySelector(".close-btn");

// closeBtn.addEventListener("click", () => {
//     hideAlert();
// });

// function hideAlert() {
//     alertMsg.classList.remove("show");
//     alertMsg.classList.add("hide");
// }

// function showAlert() {
//     alertMsg.classList.remove("hide");
//     alertMsg.classList.add("show");
//     alertMsg.classList.add("showAlert");
// }