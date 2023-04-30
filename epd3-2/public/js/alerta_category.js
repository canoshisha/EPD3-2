const botonMostrarFormulario = document.getElementById('crear_show');
const formulario = document.getElementById('crear');

const swal = window.swal;

botonMostrarFormulario.onclick = function() {
    console.log("Mostrando formulario...");
    botonMostrarFormulario.style.display = 'none';
    formulario.style.display = 'block';
};

formulario.onsubmit = function(event) {
    event.preventDefault();

    swal("¡La categoría se ha realizado con éxito!", {
        icon: "success",
    }).then(() => {
        fetch(formulario.action, {
                method: formulario.method,
                body: new FormData(formulario)
            })
            .then(response => {
                if (response.ok) {
                    botonMostrarFormulario.style.display = 'block';
                    formulario.style.display = 'none';
                    console.log("Formulario enviado correctamente.");
                    window.location.href = "/categories"; // Redireccionar a la ruta correspondiente
                } else {
                    console.error("Ha habido un error al enviar el formulario.");
                }
            })
            .catch(error => {
                console.error("Ha habido un error al enviar el formulario.", error);
            });
    });
};