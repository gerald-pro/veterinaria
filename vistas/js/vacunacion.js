/*=============================================
            EDITAR VACUNACIÓN
=============================================*/
$(".tablas").on("click", ".btnEditarVacunacion", function(){

    var id = $(this).attr("id");

    var datos = new FormData();

    datos.append("id", id);

    $.ajax({
        
        url: "ajax/vacunacion.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta){

            console.log(respuesta);
            $("#EditarTipoVacuna").val(respuesta["id_vacuna"]).trigger('change');
            $("#EditarMascota").val(respuesta["id_mascota"]).trigger('change');
            $("#EditarVeterinario").val(respuesta["id_veterinario"]).trigger('change');
            $("#idVacunacion").val(respuesta["id"]);

        }

    }) 

}) 

/*=============================================
            ELIMINAR VACUNACIÓN
=============================================*/
$(".tablas").on("click", ".btnEliminarVacunacion", function(){

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
    }).then(function(result){

        if(result.value){

        window.location = "index.php?rutas=vacunacion&id="+id;

        }

    })

})