
/* Column height */

var heightBody = $("body").height();

if(heightBody < 1020 && window.innerWidth > 767){
    
	$("#col1").css({"height":"150vh"})
}
if(heightBody > 1020 && window.innerWidth > 767){
	$("#col1").css({"height":heightBody+"px"})
}


$("p#member span").click(function(){
	$("#cabezote #admin").slideToggle("fast")
	$("p#member span").toggleClass("fa-chevron-down");
	$("p#member span").toggleClass("fa-chevron-up");
});


/*Tables configuration*/

$('#tableOrders').DataTable({
    "language": {
        "sProcessing":     "Cargando...",
        "sLengthMenu":     "Mostrar _MENU_ Pedidos",
        "sZeroRecords":    "Búsqueda no encontrada",
        "sEmptyTable":     "No existe el registro en tabla",
        "sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Registros del 0 al 0 de un total de 0 registros",
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
            "sSortAscending":  ": Ordenar columna de forma ascendente",
            "sSortDescending": ": Ordenar la columna de forma descendente"
        }
    }
});

$('#tableComments').DataTable({
    "language": {
        "sProcessing":     "Cargando...",
        "sLengthMenu":     "Mostrar _MENU_ Comentarios",
        "sZeroRecords":    "Búsqueda no encontrada",
        "sEmptyTable":     "No existe el registro en tabla",
        "sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Registros del 0 al 0 de un total de 0 registros",
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
            "sSortAscending":  ": Ordenar columna de forma ascendente",
            "sSortDescending": ": Ordenar la columna de forma descendente"
        }
    }
});

$('#tableSlider').DataTable({
    "language": {
        "sProcessing":     "Cargando...",
        "sLengthMenu":     "Mostrar _MENU_ Comentarios",
        "sZeroRecords":    "Búsqueda no encontrada",
        "sEmptyTable":     "No existe el registro en tabla",
        "sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Registros del 0 al 0 de un total de 0 registros",
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
            "sSortAscending":  ": Ordenar columna de forma ascendente",
            "sSortDescending": ": Ordenar la columna de forma descendente"
        }
    }
});



