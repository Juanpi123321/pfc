<!-- principal -->
	<div class="container-fluid fondo-principal">
		<div class="container fondo-1">
			<!-- principal -->
			<div class="row">
				<br>
				<div class="titulo text-center">
					<h2>GESTION DE USUARIOS</h2>
				</div>
				<br>
				<div class="row">
				    <div class="col-xs-8 col-xs-offset-1 col-sm-8 col-sm-offset-1 col-md-6 col-md-offset-3">
				    	<h1 class="page-header" style="text-align:center;">Listado de Usuarios</h1>        
				    </div>
				    <div style="margin-right: 25px;" class="text-right">
				    	<a href="<?php echo base_url(); ?>/admin_controller/registracion_admin"><button class="btn btn-primary">Nuevo Usuario</button></a>
				    </div><br>
				</div>        
				 <!-- Tabla de Usuarios -->               
				 <div class="row">      
				 	<div class="col-xs-12 col-md-offset-0">  
				 	  <div class="table-responsive">
				 		<table id="tusuarios" class="table table-condensed table-striped table-hover">       
				 			<thead>                            
				 				<th>Usuario</th>                            
				 				<th>Email</th>                            
				 				<th>Nombre</th>                            
				 				<th>Apellido</th>                             
				 				<th>DNI</th>                           
				 				<th>Direccion</th>
				 				<th>Rol</th>
				 				<th>Imagen</th>
				 				<th></th>
				 				<th></th>
				 			</thead>     

				 			<tbody>      
				 				<?php foreach($usuarios as $row) { ?>  
				 				<tr>                 
				 					<td><?php  echo $row->usuario; ?></td>
				 					<td><?php  echo $row->email; ?></td>
				 					<td><?php  echo $row->nombres; ?></td>
				 					<td><?php  echo $row->apellidos; ?></td>
				 					<td><?php  echo $row->dni; ?></td>
				 					<td><?php  echo $row->direccion; ?></td>
				 					<td><?php  echo $row->tipo_rol; ?></td>		 					
				 					<td><a class="btn" href="<?php echo base_url("admin_controller/imagen_usuario/$row->Id_usuario");?>" >
				 							<img src="<?php echo base_url('uploads/img_usuarios/') . $row->imagen?>" height="100" width="100">
				 						</a>
				 					</td>
					                <td>
				 						<a class="btn btn-success" href="<?php echo base_url("admin_controller/editar_usuario/$row->Id_usuario");?>" >
				 							<span class="glyphicon glyphicon-pencil"></span>
				 						</a>
				 					</td>

				 					<?php if ( ($row->estado) ==1 )            
				 						{ ?>  
							                <td>
							                	<a class="btn btn-danger" href="<?php echo base_url("admin_controller/eliminar_usuario/$row->Id_usuario");?>" >
							                		<span class="glyphicon glyphicon-trash"></span>
							                	</a>
								            </td>            
								        <?php } else {  ?>  
							                <td>    
							                	<a class="btn btn-danger" href="<?php echo base_url("admin_controller/activar_usuario/$row->Id_usuario");?>" >
							                		<span class="glyphicon glyphicon-glyphicon glyphicon-ok"></span>
							                	</a>
							                </td>  
							     		<?php }    ?>
				                </tr>
				                <?php    } ?>
				            </tbody> 
				    	</table>  
				    	<br>
				      </div>
				    </div>
				</div> 
				<br>
				<div class="row">
						<div style="margin-right: 25px;" class="text-right">
							<?php echo $this->pagination->create_links();?>	
						</div>
					</div>
			</div>
			<br><br>
		</div>
	</div>	