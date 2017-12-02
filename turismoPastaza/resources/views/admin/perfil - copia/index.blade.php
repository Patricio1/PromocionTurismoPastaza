 
@extends ('layouts.admin')

@section ('contenido')
 <!-- Forms Section-->

     @section('scripts')
     <script src="../recursos_admin/js/funcionesAJAX.js"></script>
    @endsection

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
                      <h3 class="h4">Perfiles</h3>
                    </div>
                    <div class="card-body">
                      <p>Formulario para gestión de perfiles.</p>
                   
                    {!!Form::open(array('url'=>'admin/perfil','method'=>'POST','autocomplete'=>'off'))!!}        
                    {{Form::token()}}
                    <input type="hidden" name="token" value="{{ csrf_token() }}" id="token">
                    <div class="form-group">
                          <label class="form-control-label">Nombre</label>
                          <input type="text" id="txtNombre" name="NOMBRE" placeholder="Escriba el nombre de perfil..." required class="form-control">
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
    <h3>Listado de Perfiles</h3>
 
        <div class="form-group">
          <div class="input-group">
            <input type="text" class="form-control" name="searchText" id="searchText" placeholder="Buscar perfil..">
            <span class="input-group-btn">            
            </span>
          </div>
        </div>

  </div>
</div>


          <div class="row">
  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <div class="table-responsive card-body">
      <table class="table table-bordered table-condensed table-hover" style="background-color: #ffffff" id="tablaPerfiles">
        <thead>
          <th>Id</th>
          <th>Nombre</th>          
          <th>Opciones</th>
        </thead>
        <tbody id="fbody">
            @foreach ($perfiles as $perf)   
        <tr>
          <td>{{ $perf->id}}</td>
          <td>{{ $perf->nombre}}</td>          
          <td>        
             <a href="" data-target="#modal-edit-{{$perf->id}}" data-toggle="modal"><button class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button></a>
           <a href="" data-target="#modal-delete-{{$perf->id}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button></a>
          </td>
        </tr>     
          @include('admin.perfil.modal')         
           @include('admin.perfil.edit_modal') 
     @endforeach
      </tbody>
      </table>
<!--Mostrar la paginacion -->
{!! with(new turismoPastaza\Pagination\HDPresenter($perfiles))->render(); !!}
    </div>
  
  </div>
</div>

@stop
