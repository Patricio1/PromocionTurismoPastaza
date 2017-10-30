@extends ('layouts.admin')

@section ('contenido')
	
<div class="row"> 
<div class="col-lg-8 col-md-8 col-sm-8 col-sx-12">
	<h3> Perfiles Disponibles <a href="perfil/create"><button class="btn btn-success">Nuevo</button></a></h3>
 

	
</div>
</div>
<div class="row">
	
	<div class="col-lg-8 col-md-8 col-sm-8 col-sx-12" >
		
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condesed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
				</thead>
               @foreach ($categorias as $per)
				<tr>
					 <td> {{ $per->$id}} </td>
					 <td> {{ $per->$nombre}}</td>
					 <td> <a href=""><button class="btn btn-info"> Editar</button></a>
<a href=""><button class="btn btn-danger"> Eliminar</button></a>
					 </td>
				</tr>
            @endforeach
			</table>


		</div>
	
	</div>
</div>
@endsection