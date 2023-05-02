const swal = window.swal;
$('button[type="submit"]').each(function() {
    $(this).click(function(e) {
        e.preventDefault();
        var form = this.form;
        swal({
                title: "¿Estás seguro de eliminar este usuario?",
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