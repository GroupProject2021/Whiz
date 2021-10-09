var stream = document.getElementById("stream");


stream.addEventListener("change", function() {
    // alert(this.value);
    // a.placeholder = this.value;

    var selected_stream = this.value;

});

// general_test_grade_value range slider
function fetch_general_test_grade_value() {
    var general_test_grade_value = document.getElementById("general_test_grade").value;
    document.getElementById("general_test_grade_value").value = general_test_grade_value;
}

function fetch_general_test_grade() {
    var general_test_grade = document.getElementById("general_test_grade_value").value;
    document.getElementById("general_test_grade").value = general_test_grade;
}

    // z_score_value range slider
    function fetch_z_score_value() {
    var z_score_value = document.getElementById("z_score").value;
    document.getElementById("z_score_value").value = z_score_value;
}

function fetch_z_score() {
    var z_score = document.getElementById("z_score_value").value;
    document.getElementById("z_score").value = z_score;
}