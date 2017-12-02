 
@extends ('layouts.admin')

@section ('contenido')
 <!-- Forms Section-->


          <section class="forms" style="margin-bottom: -60px"> 

          @if (Session::has('mensaje'))    
            <div class="row" style="margin-left: 10px">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      {{ Session::get('mensaje') }}
                 </div>
              </div>
            </div>
          @endif

          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">     
            @if (count($errors)>0)
              <div class="alert alert-danger">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
                </ul>
              </div>
            @endif
          </div>

            <div class="container-fluid">
             
               
                <div class="col-lg-6">
                  <div class="card">                  
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Módulos</h3>
                    </div>
                    <div class="card-body">
                      <p>Formulario para gestión de módulos.</p>                    
                    {!!Form::open(array('url'=>'admin/modulo','method'=>'POST','autocomplete'=>'off'))!!}            
                    {{Form::token()}}
                    <div class="form-group">
                          <label class="form-control-label">Nombre</label>
                          <input type="text" id="txtNombre" name="NOMBRE" placeholder="Escriba el nombre del módulo..." required class="form-control">
                    </div> 
                     <div class="form-group">
                          <label class="form-control-label">Descripción</label>
                          <input type="text" id="txtDescripcion" name="DESCRIPCION" placeholder="Escriba la descripción del módulo..." required class="form-control">
                    </div>   
                     <div class="form-group">
                          <label class="form-control-label">Url</label>
                          <input type="text" id="txtPath" name="PATH" placeholder="Escriba la url del módulo..." required class="form-control">
                    </div>     
                       <div class="form-group">                               
                          <button class="btn btn-primary" type="submit"><i class="fa fa-plus" aria-hidden="true"></i> Registrar</button>
                        </div>                                      
                    {!!Form::close()!!} 
                    </div>
                  </div>
                </div>                                            
              </div>
          </section>


<div class="row  card-body">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Listado de Módulos</h3>
 
        <div class="form-group">
          <div class="input-group">
            <input type="text" class="form-control" name="searchText" id="searchText" placeholder="Buscar módulo..">
            <span class="input-group-btn">            
            </span>
          </div>
        </div>

  </div>
</div>


          <div class="row">
  <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
    <div class="table-responsive card-body">
      <table class="table table-bordered table-condensed table-hover" style="background-color: #ffffff">
        <thead>
          <th>Id</th>
          <th>Nombre</th>          
          <th>Descripción</th>
          <th>Url</th>
        </thead>
        <tbody id="fbody">
            @foreach ($modulos as $mod)   
        <tr>
          <td>{{ $mod->id}}</td>
          <td>{{ $mod->nombre}}</td>
          <td>{{ $mod->descripcion}}</td>
          <td>{{ $mod->path}}</td>
          <td>        
             <a href="" data-target="#modal-edit-{{$mod->id}}" data-toggle="modal"><button class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button></a>
           <a href="" data-target="#modal-delete-{{$mod->id}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button></a>
          </td>
        </tr>     
          @include('admin.modulo.modal')         
           @include('admin.modulo.edit_modal') 
     @endforeach
      </tbody>
      </table>
<!--Mostrar la paginacion -->
{!! with(new turismoPastaza\Pagination\HDPresenter($modulos))->render(); !!}
    </div>
  
  </div>
</div>


@stop
