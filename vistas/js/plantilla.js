/*=============================================
SideBar Menu
=============================================*/

$.widget.bridge('uibutton', $.ui.button)

/*=============================================
Data Table
=============================================*/

$(function () {
	$(".example1").DataTable({
		"responsive": true, "lengthChange": false, "autoWidth": false,
		"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
	  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('.example2').DataTable({
    	"paging": true,
        "lengthChange": true, 
        "aProcessing": true,       
        "aServerSide": true,   
        "responsive": true, 
        "bInfo": true,
        "iDisplayLength": 10,
        "autoWidth": false,

       	"language": {
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
        	},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
      	},

		"buttons": [{ text: 'Copiar', extend: 'copy' }, 
			{ extend: 'pdf' },
		  	{ extend: 'excel'},
		  	{ text: 'Imprimir', extend: 'print' },
		  	{
				extend: 'colvis',
			  	text: 'Visor de columnas',
			  	collectionLayout: 'fixed'
		  	}
	  	],
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

});