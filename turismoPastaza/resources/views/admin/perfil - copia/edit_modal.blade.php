<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$perf->id}}">
	 
	 	{!!Form::model($perf,['method'=>'PATCH','route'=>['admin.perfil.update',$perf->id]])!!}
	 	
 {{Form::token()}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title">Editar Perfil</h4>
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
		                          <input type="text" id="txtNombreEdit" required name="NOMBRE" placeholder="Escriba el nombre de perfil..." class="form-control" value="{{$perf->nombre}}">
		                        </div>     		    		                     		                      		                    		             
		                    </div>
		                
		                </div>                                            
              	</div>            
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</button>
				<!--<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>-->
				<a href="javascript:void()" id="btnActualizar" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</a>
			</div>
		</div>
	</div>
      {!!Form::close()!!} 
</div>