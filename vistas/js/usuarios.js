

/*=============================================
EDITAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEditarUsuario", function () {

	var id = $(this).attr("id");

	var datos = new FormData();
	datos.append("id", id);

	$.ajax({

		url: "ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			$("#EditarNombre").val(respuesta["nombre"]);
			$("#EditarUsuario").val(respuesta["usuario"]);
			$("#EditarPerfil").html(respuesta["perfil"]);
			$("#PasswordActual").val(respuesta["password"]);

		}

	});

})

/*=============================================
ACTIVAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnActivar", function () {

	var id = $(this).attr("id");
	var estadoUsuario = $(this).attr("estadoUsuario");

	var datos = new FormData();
	datos.append("activarId", id);
	datos.append("activarUsuario", estadoUsuario);

	$.ajax({

		url: "ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function (respuesta) {

			if (window.matchMedia("(max-width:767px)").matches) {

				swal({
					title: "El usuario ha sido actualizado",
					type: "success",
					confirmButtonText: "¡Cerrar!"
				}).then(function (result) {
					if (result.value) {

						window.location = "usuario_v";

					}


				});

			}


		}

	})

	if (estadoUsuario == 0) {

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoUsuario', 1);

	} else {

		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html('Activado');
		$(this).attr('estadoUsuario', 0);

	}

})

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoUsuario").change(function () {

	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	$.ajax({
		url: "ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			if (respuesta) {

				$("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

				$("#nuevoUsuario").val("");

			}

		}

	})
})

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEliminarUsuario", function () {

	var id = $(this).attr("id");
	var usuario = $(this).attr("usuario");

	swal({
		title: '¿Está seguro de borrar el usuario?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar usuario!'
	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?rutas=usuarios&id=" + id + "&usuario=" + usuario;

		}

	})

})




