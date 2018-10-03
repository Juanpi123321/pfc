<!-- principal -->
	<div class="container-fluid fondo-principal">
		<div class="container fondo-1">
			<!-- principal -->
			<div class="row">
				<br>
				<div class="titulo text-center">
					<h2>GESTION DE PRODUCTOS</h2>
				</div>
				<br>
				<img style="width: 38%; margin-left: 30%;" src="<?php echo base_url(); ?>/assets/img/almacen.png">
				<br><br>
				<div class="row">
				    <div class="col-xs-8 col-xs-offset-1 col-sm-8 col-sm-offset-1 col-md-6 col-md-offset-3">
				    	<h1 class="page-header" style="text-align:center;">Listado de Productos</h1>        
				    </div>
				    <div style="margin-right: 25px;" class="text-right">
				    	<a href="<?php echo base_url(); ?>/admin_controller/productos_agregar_admin"><button class="btn btn-primary">Agregar Producto</button></a>
				    </div><br>
				</div>
				<!-- Tabla de Productos -->               
				 <div class="row">      
				 	<div class="col-xs-12 col-md-offset-0">
				 	  <div class="table-responsive">        
				 		<table id="tproductos" class="table table-condensed table-striped table-hover">       
				 			<thead>            
				 				<th>Imagen del producto</th>                
				 				<th>Nombre</th>
				 				<th>Caracteristica</th>
				 				<th>Stock</th>
				 				<th>Precio</th>
				 				<th>Categoria</th>
				 				<th></th>
				 				<th></th>
				 			</thead>     

				 			<tbody>      
				 				<?php foreach($productos as $row) { ?>  
				 				<tr>   
				 					<td><img src="<?php echo base_url('uploads/img_productos/') . $row->imagen?>" height="200" width="200"></td>           
				 					<td><?php  echo $row->nombre; ?></td>
				 					<td><?php  echo $row->caracteristica?></td>
				 					<td><?php  echo $row->stock; ?></td>
				 					<td><?php  echo $row->precio; ?></td>
				 					<td><?php  echo $row->descripcion_categoria; ?></td>		 					
			 						<td>
			 							<a class="btn btn-success" href="<?php echo base_url("admin_controller/editar_producto/$row->Id_producto");?>" >
			 								<span class="glyphicon glyphicon-pencil"></span>
			 							</a>
			 						</td>
				 					<?php if ( ($row->estado) ==1 )            
				 						{ ?>  
							                <td>
							                	<a class="btn btn-danger" href="<?php echo base_url("admin_controller/baja_producto/$row->Id_producto");?>" >
							                		<span class="glyphicon glyphicon-trash"></span>
							                	</a>
								            </td>            
								        <?php } else {  ?>  
							                <td>    
							                	<a class="btn btn-danger" href="<?php echo base_url("admin_controller/alta_producto/$row->Id_producto");?>" >
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