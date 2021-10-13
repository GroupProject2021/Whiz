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

sub1 = null;
sub2 = null;
sub3 = null;

$(document).ready(function() {
    initialUniqueSubjectsSetting();

    isValidSubjectSelection();
})

$('#subject1').on("change", function() {
    if(isValidSubjectSelection()) {
        sub1 = this.value;
    }
});

$('#subject2').on("change", function() {
    if(isValidSubjectSelection()) {
        sub2 = this.value;
    }
});

$('#subject3').on("change", function() {
    if(isValidSubjectSelection()) {
        sub3 = this.value;
    }
});

function initialUniqueSubjectsSetting() {
    sub1 = $('#subject1').children('option:selected').val();
    $('#subject2 option[value='+sub1+']').remove();
    $('#subject3 option[value='+sub1+']').remove();

    sub2 = $('#subject2').children('option:selected').val();
    $('#subject1 option[value='+sub2+']').remove();
    $('#subject3 option[value='+sub2+']').remove();

    sub3 = $('#subject3').children('option:selected').val();
    $('#subject1 option[value='+sub3+']').remove();
    $('#subject2 option[value='+sub3+']').remove();
}

function isValidSubjectSelection() {
    sub1 = $('#subject1').children('option:selected').val();
    sub2 = $('#subject2').children('option:selected').val();
    sub3 = $('#subject3').children('option:selected').val();

    if((sub1 == sub2) || (sub1 == sub3) || (sub2 == sub3)) {
        alert('Please select different subjects');        
        $('.subjects-validation')[0].classList.remove('active');
        $('#subjects_validity').val('not valid');
        return false;
    }
    else {
        // alert('valid');
        $('.subjects-validation')[0].classList.add('active');        
        $('#subjects_validity').val('valid');
        // return true;
    }
}

