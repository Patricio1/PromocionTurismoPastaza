function mostrarTodosPerfiles()
{
	var tablaPerfiles = $("#tablaPerfiles");
	var ruta = '/perfiles';

	  //<a href="" data-target="#modal-edit-{{$perf->id}}" data-toggle="modal"><button class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button></a>
        //   <a href="" data-target="#modal-delete-{{$perf->id}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button></a>
    // $("#tablaPerfiles tbody").remove();
	$.get(ruta,function(respuesta){
		$(respuesta).each(function(key,value){
			tablaPerfiles.append("<tr><td>"+value.id+"</td><td>"+value.nombre+"</td><td>"+"<a href='' data-target='#modal-edit-"+value.id+"' data-toggle='modal'><button class='btn btn-info'><i class='fa fa-pencil' aria-hidden='true'></i> Editar</button></a><a href='' data-target='#modal-delete-"+value.id+"' data-toggle='modal'><button class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i> Eliminar</button></a></td></tr>");
			$('.mymodaldelete').attr('id','modal-delete-'+value.id);
		});
	});
}

$("#btnAgregarPerfil").click(function()
{
	/**var NOMBRE = $("#txtNombre").val();
	var ruta =  '/admin/perfil';
	var token = $("#token").val();

	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN':token},
		type: 'POST',
		dataType: 'json',
		data:{NOMBRE:NOMBRE},
		success: function(data)
		{
			
			//mostrarTodosPerfiles();
		}

	});*/

	
	//alert('hi');
});

