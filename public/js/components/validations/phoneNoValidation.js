function _id(name) {
    return document.getElementById(name);
}

function _class(name) {
    return document.getElementsByClassName(name);
}

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