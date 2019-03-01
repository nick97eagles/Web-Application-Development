// this is the place to put form validation code

// Grab the form element
var frm = document.getElementById("MyForm");

// Name field should not contain special characters
function validateName() {
    var name = frm.cname;
    if (name.value.match(/[^A-Za-z\s]/)) {
        alert("The name field may not contain special characters");
        name.value = "";
    }
}
frm.cname.onblur = validateName;

// If student is checked, sliently check CommUnity
function setCommunity() {
    var attends = frm.attends;
    var status = frm.MyStatus;
    if (status[0].checked) {
        attends[1].selected = true;
    }
}
frm.MyStatus[0].onchange = setCommunity;

// If student is checked ComUnity must also be selected
function validateAttends() {
    var attends = frm.attends;
    var status = frm.MyStatus;
    if (status[0].checked && (!attends[1].selected)) {
        alert('All students must attend CommUnity');
        attends[1].selected = true;
    }
}
frm.attends.onchange = validateAttends;

// Age should be positive integer less than 130
function validateAge() {
    age = frm.age;
    if (age.value.match(/\D/) || age.value < 1 || age.value > 130) {
        alert('Your age must be a positive integer less than 130.');
    }
}
frm.age.onblur = validateAge;

// Validate the entire form before submission
function validateFinal() {

    // variable to keep track of validity and reasons
    var valid = true;
    var reasons = "Before you submit the form, please ensure that:\n";

    // validate the name field
    if (!frm.cname.value) {
        valid = false;
        reasons += "   * You have not entered a name\n";
    }

    // validate status field
    var IsChecked = false;
    for (var i = 0; i < frm.MyStatus.length; i++) {
        if (frm.MyStatus[i].checked) { IsChecked = true; }
    }
    if (!IsChecked) {
        valid = false;
        reasons += "   * You have not selected a status\n";
    }

    // validate attends field
    validateAttends();

    // validate age field
    if (!frm.age.value) {
        valid = false;
        reasons += "   * You have not entered your age\n";
    }

    // prompt with messages and return validity
    if (!valid) {
        alert(reasons);
    }
    return valid;
}
// frm.onsubmit = validateFinal;