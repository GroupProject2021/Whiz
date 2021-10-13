// gpa_value range slider
function fetch_gpa_value() {
    var gpa_value = document.getElementById("gpa").value;
    document.getElementById("gpa_value").value = gpa_value;
}

function fetch_gpa() {
    var gpa = document.getElementById("gpa_value").value;
    document.getElementById("gpa").value = gpa;
}