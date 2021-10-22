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