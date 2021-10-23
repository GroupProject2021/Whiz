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


// stream change
$('#stream').on("change", function() {
    var streamId = $('#stream').val();

    $.ajax({
        url: URLROOT+"/C_S_Settings/changeStream/"+streamId,
        method: "post"
    }).done (function(res) {
        // console.log(res); // for testing only
        subjects = JSON.parse(res);
        
        // selection options resetting
        isSetSelected = false;
        $('#subject1').children().remove();
        subjects.forEach(function(subject) {
            if(isSetSelected) {
                $('#subject1').append('<option value="'+subject.al_sub_id+'" selected>'+subject.al_sub_name+'</option>');
                isSetSelected = true;
            }
            else {
                $('#subject1').append('<option value="'+subject.al_sub_id+'">'+subject.al_sub_name+'</option>');
            }
        })

        isSetSelected = false;
        $('#subject2').children().remove();
        subjects.forEach(function(subject) {
            if(isSetSelected) {
                $('#subject2').append('<option value="'+subject.al_sub_id+'" selected>'+subject.al_sub_name+'</option>');
            }
            else {
                $('#subject2').append('<option value="'+subject.al_sub_id+'">'+subject.al_sub_name+'</option>')
            }
        })

        isSetSelected = false;
        $('#subject3').children().remove();
        subjects.forEach(function(subject) {
            if(isSetSelected) {
                $('#subject3').append('<option value="'+subject.al_sub_id+'" selected>'+subject.al_sub_name+'</option>');
            }
            else {
                $('#subject3').append('<option value="'+subject.al_sub_id+'">'+subject.al_sub_name+'</option>')
            }
        })

        // called form al_UpgradeAndEdit JS file
        initialUniqueSubjectsSetting();
    })
})

// school
$(document).ready(function() {
    $("#al_school").keyup(function() {
        var searchText = $(this).val();
        
        if(searchText != '') {
            $.ajax({
                url: URLROOT+"/Students_ProfileUpgrade/schoolList/"+searchText,
                method: 'post',
                success: function(response) {
                    $("#show-list").html(response);
                }
            });
        }
        else {
            $("#show-list").html('');
        }
    });

    $(document).on("click", ".show-list-item", function() {
        $("#al_school").val($(this).text());
        $("#show-list").html('');
    })
});