function mostrarCampo() {
    var opcionSeleccionada = document.getElementById("select-option").value;
    var campoNombre = document.getElementById("campo-nombre");
    var campoEmail = document.getElementById("campo-email");
    var campoPassword = document.getElementById("campo-password");

    // Oculta todos los campos
    campoNombre.style.display = "none";
    campoEmail.style.display = "none";
    campoPassword.style.display = "none";

    // Muestra el campo correspondiente
    if (opcionSeleccionada == "nombre") {
        campoNombre.style.display = "block";
    } else if (opcionSeleccionada == "email") {
        campoEmail.style.display = "block";
    } else if (opcionSeleccionada == "password") {
        campoPassword.style.display = "block";
    }
}

function validarFormulario() {
    var opcionSeleccionada = document.getElementById("select-option").value;
    var inputValor = document.getElementById("input-valor");
    var inputOldPassword = document.getElementById("input-old-password");
    var inputNewPassword = document.getElementById("input-new-password");
    var inputNewPasswordConfirm = document.getElementById("input-new-password-confirm");

    if (opcionSeleccionada == "nombre") {
        if (inputValor.value.trim() == "") {
            alert("Por favor, introduce un nombre válido.");
            return false;
        }
    } else if (opcionSeleccionada == "email") {
        var inputOldEmail = document.getElementById("input-old-email");
        if (inputOldEmail.value.trim() == "" || inputValor.value.trim() == "") {
            alert("Por favor, introduce un correo electrónico válido.");
            return false;
        }
    } else if (opcionSeleccionada == "password") {
        if (inputOldPassword.value.trim() == "") {
            alert("Por favor, introduce la contraseña actual.");
            return false;
        }
        if (inputNewPassword.value.trim() == "" || inputNewPasswordConfirm.value.trim() == "") {
            alert("Por favor, introduce la nueva contraseña y confírmala.");
            return false;
        }
        if (inputNewPassword.value != inputNewPasswordConfirm.value) {
            alert("Las nuevas contraseñas no coinciden.");
            return false;
        }
    }

    return true;
}
