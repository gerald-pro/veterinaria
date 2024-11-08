/*=============================================
            EDITAR CONSULTORIO
=============================================*/
$(".tablas").on("click", ".btnEditarConsultorio", function(){

    var id = $(this).attr("id");

    var datos = new FormData();

    datos.append("id", id);

    $.ajax({
        url: "ajax/consultorio.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta){

            console.log(respuesta);
            $("#EditarNombreEspecialidad").val(respuesta["nombre"]);
            $("#idEspecialidad").val(respuesta["id"]);
         }

    }) 

}) 

/*=============================================
            ELIMINAR CONSULTORIO
=============================================*/
$(".tablas").on("click", ".btnEliminarConsultorio", function(){

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

             window.location = "index.php?rutas=consultorios&id="+id;

         }

     })

})