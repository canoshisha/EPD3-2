const swal = window.swal;
$('button[type="submit"]').click(function(e) {
    e.preventDefault();
    var form = this.form;
    swal({
            title: "¿Estás seguro de eliminar este pedido?",
            text: "No podrás revertir esto",
            icon: "warning",
            buttons: ["Cancelar", "Eliminar"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Pedido borrado correctamente", {
                    icon: "success",
                }).then(() => {
                    form.submit();
                });

            }
        });
});