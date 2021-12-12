// gpa_value range slider
function fetch_skill1() {
    var skill1 = document.getElementById("skill1_value").value;
    document.getElementById("skill1_value_text").innerHTML = skill1 + " %";
}

function fetch_skill2() {
    var skill2 = document.getElementById("skill2_value").value;
    document.getElementById("skill2_value_text").innerHTML = skill2 + " %";
}

function fetch_skill3() {
    var skill3 = document.getElementById("skill3_value").value;
    document.getElementById("skill3_value_text").innerHTML = skill3 + " %";
}

function fetch_skill4() {
    var skill4 = document.getElementById("skill4_value").value;
    document.getElementById("skill4_value_text").innerHTML = skill4 + " %";
}

// expieriences
function enableCusEXP() {
    document.getElementById('custom_exp').hidden = false;

    document.getElementById('exp1_job').value = '';
    document.getElementById('exp1_com').value = '';
    document.getElementById('exp2_job').value = '';
    document.getElementById('exp2_com').value = '';
}

function disableCusEXP() {
    document.getElementById('custom_exp').hidden = true;

    document.getElementById('exp1_job').value = 'dummy';
    document.getElementById('exp1_com').value = 'dummy';
    document.getElementById('exp2_job').value = 'dummy';
    document.getElementById('exp2_com').value = 'dummy';
}