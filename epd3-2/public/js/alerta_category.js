const botonMostrarFormulario = document.getElementById('crear_show');
const formulario = document.getElementById('crear');
const botonesMostrarAct = document.querySelectorAll('.actualizar_show');
const form_update = document.getElementById('actualizar_form');



botonMostrarFormulario.onclick = function() {
    console.log("Mostrando formulario...");
    botonMostrarFormulario.style.display = 'none';
    formulario.style.display = 'block';
};

botonesMostrarAct.forEach(boton => {
    boton.onclick = function() {
        console.log("Mostrando formulario...");
        boton.style.display = 'none';
        form_update.style.display = 'block';
    }
});


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
                form.submit();

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
                    this.style.display = 'block'; // Hacer referencia al botón actual usando "this"
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
