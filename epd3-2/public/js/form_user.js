const selectOption = document.getElementById('select-option');
const nombreSection = document.getElementById('nombre-section');
const emailSection = document.getElementById('email-section');
const passwordSection = document.getElementById('password-section');
const passwordNuevo = document.getElementById('input-password-nuevo');
const passwordNuevoConfirm = document.getElementById('input-password-nuevo-confirm');

function showSelectedSection() {
    const selectedOption = selectOption.value;

    nombreSection.classList.add('d-none');
    emailSection.classList.add('d-none');
    passwordSection.classList.add('d-none');

    switch (selectedOption) {
        case 'nombre':
            nombreSection.classList.remove('d-none');
            break;
        case 'email':
            emailSection.classList.remove('d-none');
            break;
        case 'password':
            passwordSection.classList.remove('d-none');
            break;
    }
}

selectOption.addEventListener('change', showSelectedSection);
showSelectedSection();

function validatePassword() {
    if (passwordNuevo.value !== passwordNuevoConfirm.value) {
        passwordNuevoConfirm.setCustomValidity('Las contraseñas no coinciden');
    } else {
        passwordNuevoConfirm.setCustomValidity('');
    }
}

passwordNuevo.addEventListener('input', validatePassword);
passwordNuevoConfirm.addEventListener('input', validatePassword);
