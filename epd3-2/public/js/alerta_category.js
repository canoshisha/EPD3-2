const botonMostrarFormulario = document.getElementById('crear_show');
const formulario = document.getElementById('crear');
const botonesMostrarAct = document.querySelectorAll('[id^="actualizar_show_"]');



botonMostrarFormulario.onclick = function() {
    console.log("Mostrando formulario...");
    botonMostrarFormulario.style.display = 'none';
    formulario.style.display = 'block';
};



$('button[id=eliminar]').each(function() {
    $(this).click(function(e) {
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
});




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