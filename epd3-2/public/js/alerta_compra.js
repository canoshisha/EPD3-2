const swal = window.swal;
$('#compra').click(function(e) {
    e.preventDefault();
    var form = this.form;
    swal({
            title: "¿Estás seguro de realizar la compra?",
            text: "Se realizará el cobro en la tarjeta asociada.",
            icon: "warning",
            buttons: ["Cancelar", "Realizar Compra"],
            dangerMode: true,
        })
        .then((willBuy) => {
            if (willBuy) {
                swal("¡Compra realizada con éxito!", {
                        icon: "success",
                    })
                    .then(() => {
                        form.submit();
                    });
            }
        });
});