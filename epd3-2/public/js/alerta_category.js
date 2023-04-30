var botonMostrarFormulario = document.getElementById('mostrar-formulario');
var formulario = document.getElementById('crear');
const swal = window.swal;
$('#crear_btn').click(function(e) {
    e.preventDefault();
    var form = this.form;
    swal({
            title: "¿Estás seguro de crear esta categoría?",
            icon: "warning",
            buttons: ["Cancelar", "Crear"],
            dangerMode: true,
        })
        .then((willBuy) => {
            if (willBuy) {
                swal("¡La categría se ha realizado con éxito!", {
                        icon: "success",
                    })
                    .then(() => {
                        form.submit();
                    });
            }
        });
});
botonMostrarFormulario.onclick = function() {
    botonMostrarFormulario.style.display = 'none';
    formulario.style.display = 'block';
};

formulario.onsubmit = function() {
    botonMostrarFormulario.style.display = 'block';
    formulario.style.display = 'none';
};