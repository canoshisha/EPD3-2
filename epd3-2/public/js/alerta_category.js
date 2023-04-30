const botonMostrarFormulario = document.getElementById('crear_show');
const formulario = document.getElementById('crear');
const botonMostrarAct = document.getElementById('actualizar_show');
const form_update = document.getElementById('actualizar_form');
//me falta poner la confirmacion con el formulario de actualizar

const swal = window.swal;

botonMostrarFormulario.onclick = function() {
    console.log("Mostrando formulario...");
    botonMostrarFormulario.style.display = 'none';
    formulario.style.display = 'block';
};

botonMostrarAct.onclick = function() {
    console.log("Mostrando formulario...");
    botonMostrarAct.style.display = 'none';
    form_update.style.display = 'block';
}


$('#eliminar').click(function(e) {
    e.preventDefault();
    var form = this.form;
    swal({
            title: "¿Estás seguro de eliminar este type?",
            text: "No podrás revertir esto",
            icon: "warning",
            buttons: ["Cancelar", "Eliminar"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Type borrado correctamente", {
                    icon: "success",
                }).then(() => {
                    form.submit();
                });

            }
        });
});

form_update.onsubmit = function(event) {
    event.preventDefault();

    swal("¡La actualización se ha realizado con éxito!", {
        icon: "success",
    }).then(() => {
        fetch(form_update.action, {
                method: form_update.method,
                body: new FormData(form_update)
            })
            .then(response => {
                if (response.ok) {
                    form_update.style.display = 'none';
                    botonMostrarAct.style.display = 'block';
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