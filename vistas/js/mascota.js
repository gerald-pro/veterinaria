/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarMascota", function(){

    var id = $(this).attr("id");

    var datos = new FormData();

    datos.append("id", id);

    $.ajax({
        url: "ajax/mascota.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta){

            /* console.log(mascota); */

             $("#EditarNombre").val(respuesta["nombre"]);
             $("#EditarSexo").val(respuesta["sexo"]);
             $("#EditarRaza").val(respuesta["raza"]);
             $("#EditarEspecie").val(respuesta["especie"]);
             $("#EditarFechanacimiento").val(respuesta["fechanacimiento"]);
             $("#id").val(respuesta["id"]);

         }

    })


})

/*=============================================
ELIMINAR MASCOTA
=============================================*/
$(".tablas").on("click", ".btnEliminarMascota", function(){

     var id = $(this).attr("id");

     swal({
         title: '¿Está seguro de borrar la mascota?',
         text: "¡Si no lo está puede cancelar la acción!",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#007bff',
         cancelButtonColor: '#d33',
         cancelButtonText: 'Cancelar',
         confirmButtonText: 'Si, borrar mascota!'
     }).then(function(result){

         if(result.value){

             window.location = "index.php?rutas=mascota&id="+id;

         }

     })

})