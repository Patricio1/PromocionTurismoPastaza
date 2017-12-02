@extends ('layouts.admin')

@section ('contenido')
 <!-- Forms Section-->
          <section class="forms"> 
            <div class="container-fluid">
              <div class="row">
               
                <div class="col-lg-6">
                  <div class="card">
                    <!--<div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>-->
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Perfiles</h3>
                    </div>
                    <div class="card-body">
                      <p>Formulario para gestión de perfiles.</p>
                      <form>
                        <div class="form-group">
                          <label class="form-control-label">Nombre</label>
                          <input type="email" placeholder="Escriba el nombre de perfil..." class="form-control">
                        </div>                    
                        <div class="form-group">       
                          <input type="submit" value="Guardar" class="btn btn-primary">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
               
               
                
              </div>
            </div>
          </section>


<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Listado de Perfiles <a href="#"><button class="btn btn-success">Nuevo</button></a></h3>
    @include('admin.perfil.search')
  </div>
</div>


          <div class="row">
  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <div class="table-responsive card-body">
      <table class="table table-bordered table-condensed table-hover" style="background-color: #ffffff">
        <thead>
          <th>Id</th>
          <th>Nombre</th>          
          <th>Opciones</th>
        </thead>
            @foreach ($perfiles as $perf)   
        <tr>
          <td>{{ $perf->id}}</td>
          <td>{{ $perf->nombre}}</td>          
          <td>
            <a href="$"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
          </td>
        </tr>              
     @endforeach
      </table>

    </div>
  {{$perfiles->render()}}
  </div>
</div>

@stop