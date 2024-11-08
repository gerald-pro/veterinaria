/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarCliente", function(){



    var id = $(this).attr("id");



    var datos = new FormData();
    datos.append("id", id);

    $.ajax({
        url: "ajax/cliente.ajax.php",
        method: "POST",
          data: datos,
          cache: false,
         contentType: false,
         processData: false,
         dataType:"json",
         success: function(respuesta){

             $("#EditarNombre").val(respuesta["nombre"]);
             $("#EditarApellido").val(respuesta["apellido"]);
             $("#EditarCelular").val(respuesta["celular"]);
             $("#EditarDireccion").val(respuesta["direccion"]);
             $("#id").val(respuesta["id"]);

         }

    })


})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarCliente", function(){

     var id = $(this).attr("id");

     swal({
         title: '¿Está seguro de borrar el cliente?',
         text: "¡Si no lo está puede cancelar la acción!",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#007bff',
         cancelButtonColor: '#d33',
         cancelButtonText: 'Cancelar',
         confirmButtonText: 'Si, borrar cliente!'
     }).then(function(result){

         if(result.value){

             window.location = "index.php?rutas=cliente&id="+id;

         }

     })

})