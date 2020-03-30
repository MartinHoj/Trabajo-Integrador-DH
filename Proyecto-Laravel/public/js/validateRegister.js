let form = document.querySelector('form');
let elements = Array.from(form.elements);
elements.pop();elements.shift();
let name = elements[0];
let surname = elements[1];
let email = elements[2];
let password = elements[3];
let confPass = elements[4];
let username = elements[5];
let phone = elements[6];
let hobbie = elements[7];
let errors = [];
var regExpre = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
let smalls = document.querySelectorAll('.alert-danger');
smalls = Array.from(smalls);

name.onblur = function() {
    if (name.value.trim().length < 2) {
        errors[0] = ('The name needs at least 3 characters');
    } else {
        errors[0] = null;
    }
}
surname.onblur = function(){
    if (surname.value.trim().length < 2) {
        errors[1] = ('The surname needs at least 3 characters');
    } else {
        errors[1] = null;
    }
}
email.onblur = function() {
    if ((!regExpre.test(email.value)) && email.value.trim().length < 0) {
        errors[2] = ('Invalid Email');
    } else {
        errors[2] = null;
    }
}
password.onblur = function(){
    if (password.value.trim().length < 5) {
        errors[3] = ('The password needs at least 6 characters. We recommend to chose a difficult password');
    } else {
        errors[3] = null;
    }
}
confPass.onblur = function(){
    if (confPass.value != password.value) {
        errors[4] = ('Is not the same password');
    } else {
        errors[4] = null;
    }
}
username.onblur = function() {
    if (username.value.trim().length < 2) {
        errors[5] = ('The username needs at least 3 characters');
    } else {
        errors[5] = null;
    }
}
phone.onblur = function(){
    if (isNaN(phone.value.trim()) || phone.value.trim().lenght < 7) {
        errors[6] = ('The phone needs to be a number, at least with 8 characters');
    } else {
        errors[6] = null;
    }
}
hobbie.onblur = function(){
    if (hobbie.value.trim() == '') {
        errors[7] = ('This field is required');
    } else {
        errors[7] = null;
    }
}
form.onsubmit = function(event){
    console.log(errors);
    for (let i = 0; i < errors.length; i++) {
        if (errors[i] !== null) {
            smalls[i].textContent = errors[i];
            smalls[i].removeAttribute('hidden');
            event.preventDefault();
        } else {
            smalls[i].setAttribute('hidden','');
        }
        
    }
}
