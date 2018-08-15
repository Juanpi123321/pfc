
	<div class="container-fluid fondo-principal">
		<div class="container fondo-1">
			<!-- principal -->
			<div class="row">
				<br>
				<div class="titulo text-center">
					<h2>CONSULTAS</h2>
				</div>
				<br><br>
				<!-- Tabla de Consultas hechas por los usuarios -->               
				 <div class="row">      
				 	<div class="col-xs-12 col-md-offset-0">  
				 	  <div class="table-responsive">        
				 		<table id="tproductos" class="table table-striped table-hover">       
				 			<thead>           
				 				<th></th> 
				 				<th>Fecha</th>                
				 				<th>Hora</th>
				 				<th>Nombre</th>
				 				<th>Email</th>
				 				<th>Telefono</th>
				 				<th>Comentarios</th>
				 				<th>Respuesta</th>
				 				<th></th>
				 			</thead>     

				 			<tbody>      
				 				<?php foreach($consultas as $row) { ?>  
				 				<tr>
				 					<td></td>
				 					<td><?php  echo $row->fecha; ?></td>
				 					<td><?php  echo $row->hora; ?></td>
				 					<td><?php  echo $row->nombre_completo;?></td>
				 					<td><?php  echo $row->email;?></td>
				 					<td><?php  if (empty($row->telefono)){
						 						  echo "*No ingreso ninguno*";
						 						}else{
						 							echo $row->telefono;
						 						}
				 					;?></td>
				 					<td><?php  echo $row->comentarios;?></td>
				 					<!-- si todavia no contesto le avisa -->
				 					<td><?php  if (empty($row->respuesta)){
						 						  echo "<b>*Respuesta pendiente</b>";
						 						}else{
						 							echo $row->respuesta;
						 						}
				 					;?></td>
									<td></td>
				                </tr>
				                <?php    } ?>
				            </tbody> 
				    	</table>  
				    	<br>
				      </div>
				    </div> 
				</div>
				<br>
			</div>
			<br><br>
		</div>
	</div>	