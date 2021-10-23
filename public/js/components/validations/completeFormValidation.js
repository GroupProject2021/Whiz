/* 
    --- Regular Expressions - IMPORTANT NOTES ---
    
    \d or [0-9]- match any number
    \w or [a-zA-Z0-9&_] - match any word character
    \s - match whitespaces (tabs & spaces)
    \t - match tab only

    ^ - excluding the folowwing characters
    $ - end of the regular expresstion
*/

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


// First name valdation
_id("first_name").addEventListener("keyup", function() {
    let name = _id("first_name").value;
    let pattern = /[0-9!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

    if(!(name.match(pattern)) && name.length >= 3) {
        _class("first_name-validation")[0].classList.add("active");
    }
    else {
        _class("first_name-validation")[0].classList.remove("active");
    }
});

_id("last_name").addEventListener("keyup", function() {
    let name = _id("last_name").value;
    let pattern = /[0-9!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

    if(!(name.match(pattern)) && name.length >= 3) {
        _class("last_name-validation")[0].classList.add("active");
    }
    else {
        _class("last_name-validation")[0].classList.remove("active");
    }
});

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



// Phone number validation
_id("phn_no").addEventListener("keyup", function() {
    let phn_no = _id("phn_no").value;
    let pattern = /^[0][0-9]{9}$/;

    if(phn_no.match(pattern) && phn_no.length != 0) {
        _class("phn_no-validation")[0].classList.add("active");
    }
    else {
        _class("phn_no-validation")[0].classList.remove("active");
    }
});