<!-- principal productos-->
	<div class="container-fluid fondo-principal">
		<div class="container fondo-2">
			
			<!-- productos -->	
			<a name="productos" title=""></a>		
			<div class="row">
				<br>
				<div class="titulo text-center">
					<h2>PRODUCTOS</h2>
				</div>
			</div>
			<br>
			<div class="row">

			<?php foreach($productos as $row) { ?>
			<!-- productos -->
				<div class="col-md-6">
					<div class="row">
						<div class="col-xs-8 col-xs-offset-2 col-sm-5 col-sm-offset-1 col-md-6 col-md-offset-0">
							<br><img src="<?php echo base_url('uploads/img_productos/') . $row->imagen?>" height="200" width="200" />
						</div>
						<div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 text-justify">
								<h3><?php  echo $row->nombre; ?></h3>
								<p><?php  echo $row->caracteristica; ?></p>
								<br>
								<?php if ($row->stock == 0)  { ?> 
									<p style="color: gold"><b>*Consultar stock disponible*</b></p>
								<?php } else { ?>
									<p><b>Stock disponible:&nbsp<?php  echo $row->stock; ?></b></p>
								<?php } ?>
						</div>									
					</div>
					<div class="row">
						<div class="col-xs-10 col-xs-offset-2 col-sm-4 col-sm-offset-1 col-md-4 col-md-offset-1">
							<h3 style="font-size: xx-large;">$<?php  echo $row->precio; ?></h3>
						</div>
						<div class="col-xs-10 col-xs-offset-2 col-sm-offset-1 col-sm-4 col-md-6 col-md-offset-1"  style="padding-top: 15px">
							<!-- ese padding es para que quede al mismo nivel -->
							
							<!-- para el caso de que quiera comprar sin estar logueado -->
							<?php if (!$this->session->userdata('login')) { ?> 
								<button type="button" data-toggle="tooltip" data-placement="auto" title="Debe iniciar sesion" class="btn btn-warning margen-comprar">Comprar</button>

								<?php } else {									
									echo form_open('carrito_controller/agregar_carrito');
									echo form_hidden('id', $row->Id_producto); 
								    echo form_hidden('nombre', $row->nombre); 
								    echo form_hidden('precio', $row->precio);
								    $cantidad = array(
								        '1' =>  '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'
								        	);
								    ?> <p>Cant:	<?php echo form_dropdown('cantidad', $cantidad, '1'); ?>
								    	</p> 
  						    	  <?php 
  						    	  	
  						    	  	echo form_submit('Comprar', 'Comprar',"class='btn btn-warning margen-comprar2'");
							 		echo form_close();
							 	} ?>
							 	<!-- muestra el error -->
									
						</div>
						<br><br><br><br><br>
					</div>
				</div>
				<?php    } ?>
			</div>
			<div class="row">
				<div style="margin-right: 25px;" class="text-right">
					<?php echo $this->pagination->create_links();?>	
				</div>
			</div>
			<br><br>
		</div>
	</div>