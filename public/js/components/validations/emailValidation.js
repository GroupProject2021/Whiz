function _id(name) {
    return document.getElementById(name);
}

function _class(name) {
    return document.getElementsByClassName(name);
}

// Email validation
_id("email").addEventListener("keyup", function() {
    let email = _id("email").value;
    let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if(email.match(pattern) && email.length != 0) {
        _class("email-validation")[0].classList.add("active");
    }
    else {
        _class("email-validation")[0].classList.remove("active");
    }
});