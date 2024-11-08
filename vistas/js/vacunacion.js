/*=============================================
            EDITAR VACUNACIÓN
=============================================*/
$(".tablas").on("click", ".btnEditarVacunacion", function () {
    $("#EditarCliente, #EditarTipoVacuna, #EditarMascota, #EditarVeterinario, #idVacunacion").val("");

    var id = $(this).attr("id");
    var datos = new FormData();
    datos.append("id", id);
    $('#EditarCliente').off('change');

    $.ajax({
        url: "ajax/vacunacion.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#EditarCliente").val(respuesta["id_cliente"]);
            $("#EditarTipoVacuna").val(respuesta["id_vacuna"]).trigger('change');
            $("#EditarVeterinario").val(respuesta["id_veterinario"]).trigger('change');
            $("#idVacunacion").val(respuesta["id"]);

            $('#EditarMascota').empty();
            $('#EditarMascota').append('<option value="">Seleccionar Mascota</option>');


            $.each(respuesta.mascotas, function (index, mascota) {
                $('#EditarMascota').append('<option value="' + mascota.id + '">' + mascota.nombre + '</option>');
            });

            $("#EditarMascota").val(respuesta["id_mascota"]).trigger('change');

            $('#EditarCliente').on('change', cargarMascotasEditar);
        },
        error: function (respuesta) {
            console.log(respuesta);

        }
    })

})

/*=============================================
            ELIMINAR VACUNACIÓN
=============================================*/
$(".tablas").on("click", ".btnEliminarVacunacion", function () {

    var id = $(this).attr("id");

    swal({
        title: '¿Está seguro de borrar este registro?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#007bff',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar registro!'
    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?rutas=vacunacion&id=" + id;

        }

    })

})

$('#NuevoCliente').change(function () {
    var idCliente = $(this).val();

    if (idCliente !== '') {
        $.ajax({
            url: 'ajax/mascota.ajax.php',
            method: 'POST',
            data: { idClienteMascotas: idCliente },
            dataType: 'json',
            success: function (response) {
                console.log(response);

                $('#NuevoMascota').empty();
                $('#NuevoMascota').append('<option value="">Seleccionar Mascota</option>');

                $.each(response, function (index, mascota) {
                    $('#NuevoMascota').append('<option value="' + mascota.id + '">' + mascota.nombre + '</option>');
                });
            },
            error: function (xhr, status, error) {
                console.log("Error: " + error);
                console.log("Status: " + status);
                console.log(xhr);
            }
        });
    } else {
        // Si no hay cliente seleccionado, limpia el select de mascotas
        $('#NuevoMascota').empty();
        $('#NuevoMascota').append('<option value="">Seleccionar Mascota</option>');
    }
});

function cargarMascotasEditar() {
    var idCliente = $(this).val();

    if (idCliente !== '') {
        $.ajax({
            url: 'ajax/mascota.ajax.php',
            method: 'POST',
            data: { idClienteMascotas: idCliente },
            dataType: 'json',
            success: function (response) {
                $('#EditarMascota').empty();
                $('#EditarMascota').append('<option value="">Seleccionar Mascota</option>');

                $.each(response, function (index, mascota) {
                    $('#EditarMascota').append('<option value="' + mascota.id + '">' + mascota.nombre + '</option>');
                });
            },
            error: function (xhr, status, error) {
                console.log("Error: " + error);
                console.log("Status: " + status);
                console.log(xhr);
            }
        });
    } else {
        $('#EditarMascota').empty();
        $('#EditarMascota').append('<option value="">Seleccionar Mascota</option>');
    }
}


$('#EditarCliente').on('change', cargarMascotasEditar);