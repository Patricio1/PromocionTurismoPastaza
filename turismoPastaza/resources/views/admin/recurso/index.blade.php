 
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
             
            {!!Form::open(array('url'=>'admin/recurso','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
                <div class="col-lg-6">
                  <div class="card">                  
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Recursos</h3>
                    </div>
                    <div class="card-body">
                      <p>Formulario para gestión de recursos.</p>                    
                   
                    <div class="form-group">
                          <label class="form-control-label">Sitio</label>
                          <select name="ID_SITIO" class="form-control">
                            @foreach ($sitios as $sitio)
                            <option value="{{$sitio->id}}">{{$sitio->nombre}}</option>
                            @endforeach
                          </select>                         
                    </div> 
                     <div class="form-group">
                          <label class="form-control-label">Servicio</label>
                          <select name="ID_SERVICIO" class="form-control">
                            @foreach ($servicios as $servicio)
                            <option value="{{$servicio->id}}">{{$servicio->nombre}}</option>
                            @endforeach
                          </select>  
                    </div>   
                     <div class="form-group">
                          <label class="form-control-label">Imagen</label>
                         <input type="file" name="PATH" class="form-control">
                    </div> 
                     <div class="form-group">
                          <label class="form-control-label">Descripcion</label>
                          <input type="text" id="txtPath" name="DESCRIPCION" placeholder="Escriba la descripción del recurso..." required class="form-control">
                    </div>    
                       <div class="form-group">                               
                          <button class="btn btn-primary" type="submit"><i class="fa fa-plus" aria-hidden="true"></i> Registrar</button>
                        </div>                                      
                  
                    </div>
                  </div>
                </div>        
                {!!Form::close()!!}                                     
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
          <th>Sitio</th>          
          <th>Servicio</th>
          <th>Imagen</th>
          <th>Descripcion</th>
        </thead>
        <tbody id="fbody">
            @foreach ($recursos as $recurso)   
        <tr>
          <td>{{ $recurso->id}}</td>
          <td>{{ $recurso->idsitio}}</td>
          <td>{{ $recurso->idservicio}}</td>
          <td><img src="{{asset('recursos_publico/images/'.$recurso->path)}}" alt="{{ $recurso->descripcion}}"  height="100px" width="100px" class="img-thumbnail"> </td>
          <td>{{ $recurso->descripcion}}</td>
          <td>        
             <a href="" data-target="#modal-edit-{{$recurso->id}}" data-toggle="modal"><button class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button></a>
           <a href="" data-target="#modal-delete-{{$recurso->id}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button></a>
          </td>
        </tr>     
       
     @endforeach
      </tbody>
      </table>
<!--Mostrar la paginacion -->
{!! with(new turismoPastaza\Pagination\HDPresenter($recursos))->render(); !!}
    </div>
  
  </div>
</div>


@stop
