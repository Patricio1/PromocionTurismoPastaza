<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$mod->id}}">
	 
	 	{!!Form::model($mod,['method'=>'PATCH','route'=>['admin.modulo.update',$mod->id]])!!}	 	
 {{Form::token()}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title">Editar Módulo</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">	
			<span aria-hidden="true" style="float: right;">x</span>
			</button>
			
			</div>

			<div class="modal-body">				
				<div class="container-fluid">                            
		                <div class="col-lg-12">		                                		                   
		                    <div class="card-body">		                   		                   		        
				                    <div class="form-group">
				                          <label class="form-control-label">Nombre</label>
				                          <input type="text" id="txtNombreEdit" required name="NOMBRE" placeholder="Escriba el nombre del módulo..." class="form-control" value="{{$mod->nombre}}">
				                    </div>
				                    <div class="form-group">
			                          <label class="form-control-label">Descripcion</label>
			                          <input type="text" id="txtNombreEdit" required name="DESCRIPCION" placeholder="Escriba la descripción del módulo..." class="form-control" value="{{$mod->descripcion}}">
		                        	</div>   
		                        	<div class="form-group">
			                          <label class="form-control-label">Url</label>
			                          <input type="text" id="txtNombreEdit" required name="PATH" placeholder="Escriba la url del módulo..." class="form-control" value="{{$mod->path}}">
		                        	</div>     		    		                     		                      		                    		             
		                    </div>                  		            
		                </div>                                            
              	</div>            
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</button>
				<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
			</div>
		</div>
	</div>
      {!!Form::close()!!} 
</div>