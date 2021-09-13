function _id(name) {
    return document.getElementById(name);
}

function _class(name) {
    return document.getElementsByClassName(name);
}

// show/ hide eye toggle
_class("toggle-password")[0].addEventListener("click", function() {
    _class("toggle-password")[0].classList.toggle("active");

    if(_id("password").getAttribute("type") == "password") {
        _id("password").setAttribute("type", "text");
    }
    else {
        _id("password").setAttribute("type", "password");
    }
});

// Password policies check on password
_id("password").addEventListener("keyup", function() {
    let password = _id("password").value;

    if(password.length >= 8) {
        _class("policy-length")[0].classList.add("active");
    }
    else {
        _class("policy-length")[0].classList.remove("active");
    }
    
    if(/[0-9]/.test(password)) {
        _class("policy-number")[0].classList.add("active");
    }
    else {
        _class("policy-number")[0].classList.remove("active");
    }

    if(/[A-Z]/.test(password)) {
        _class("policy-uppercase")[0].classList.add("active");
    }
    else {
        _class("policy-uppercase")[0].classList.remove("active");
    }

    if(/[^a-zA-Z0-9]/.test(password)) {
        _class("policy-special")[0].classList.add("active");
    }
    else {
        _class("policy-special")[0].classList.remove("active");
    }
});

// show/ hide eye toggle on confirm password
_class("toggle-confirm-password")[0].addEventListener("click", function() {
    _class("toggle-confirm-password")[0].classList.toggle("active");

    if(_id("confirm_password").getAttribute("type") == "password") {
        _id("confirm_password").setAttribute("type", "text");
    }
    else {
        _id("confirm_password").setAttribute("type", "password");
    }
});

// Password matching check on both password and confirm password - BI-DIRECTIONAL PASSWORD MATCH
_id("password").addEventListener("keyup", function() {
    let password = _id("password").value;
    let confirm_password = _id("confirm_password").value;

    if(password == confirm_password && password.length != 0) {
        _class("policy-password-match")[0].classList.add("active");
    }
    else {
        _class("policy-password-match")[0].classList.remove("active");
    }
});

_id("confirm_password").addEventListener("keyup", function() {
    let password = _id("password").value;
    let confirm_password = _id("confirm_password").value;

    if(password == confirm_password && confirm_password.length != 0) {
        _class("policy-password-match")[0].classList.add("active");
    }
    else {
        _class("policy-password-match")[0].classList.remove("active");
    }
});