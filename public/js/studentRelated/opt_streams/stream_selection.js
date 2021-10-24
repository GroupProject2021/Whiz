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