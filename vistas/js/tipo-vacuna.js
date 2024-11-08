/*=============================================
            EDITAR VACUNA
=============================================*/
$(".tablas").on("click", ".btnEditarVacuna", function(){

    var id = $(this).attr("id");

    var datos = new FormData();

    datos.append("id", id);

    $.ajax({
        url: "ajax/tipo-vacuna.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta){

            console.log(respuesta);
            $("#EditarNombreVacuna").val(respuesta["nombre"]);
            $("#idVacuna").val(respuesta["id"]);
         }

    }) 

}) 

/*=============================================
            ELIMINAR VACUNACIÓN
=============================================*/
$(".tablas").on("click", ".btnEliminarVacuna", function(){

     var id = $(this).attr("id");

     /* console.log(id); */

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

             window.location = "index.php?rutas=tipo-vacuna&id="+id;

         }

     })

})