let select = document.querySelector('select');
let title = select.getAttribute('data-country');
let options = document.querySelectorAll('option');
for (let option of options) {
    if (option.value == title) {
        option.setAttribute('selected','');
    }
}