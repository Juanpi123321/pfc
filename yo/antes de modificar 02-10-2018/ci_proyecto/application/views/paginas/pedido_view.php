
<!-- principal -->
<div class="container-fluid fondo-principal">
	<div class="container fondo-2">
		<div class="row">
			<br>
			<div class="titulo text-center">
				<h2>CONFIRMAR COMPRA</h2>
			</div>		
			<br>
			<h3 class="text-center">Por favor verifique si sus datos son correctos</h3>
			<br><br>
		</div>
		<div class="row">
			<div style="border: 2px solid lightblue;" class="col-xs-8 col-xs-offset-1 col-md-6 col-md-offset-3 col-sm-offset-2">
				<br>
				
				<p><b>Nombre: </b>&nbsp<?= $nombres?></p>
			    <p><b>Apellido: </b>&nbsp<?= $apellidos?></p>
			    <p><b>DNI: </b>&nbsp<?= $dni?></p>
			    <p><b>Direccion: </b>&nbsp<?= $direccion?></p>
			    <p><b>Email: </b>&nbsp<?= $email?></p>
			    <br>
			</div>
			<div class="col-xs-8 col-xs-offset-1 col-md-3 col-md-offset-0 col-sm-offset-2">
				<a class="btn btn-success" href="<?php echo base_url();?>pedido_controller/editar_datos" >
			 				<span class="glyphicon glyphicon-pencil"></span>&nbsp&nbspModificar datos
			 			</a>
			</div>
			<br><br>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-offset-2 col-xs-offset-1">
				<br>
				<?php echo validation_errors(); ?>
				<?php echo form_open('pedido_controller/verificar_pedido') ;?>
					<label class="control-label">Forma de pago:&nbsp</label>
					<?php $opciones = array(
					        '0'         => 'Seleccione una opcion',
					        '1'         => 'Efectivo (Pago en sucursal)',					        
					        '2'			=> 'MercadoPago',
					        '3'			=> 'Contraentrega'
							);
					echo form_dropdown('forma_pago', $opciones, '0');	?>
					<br><br>
					<!-- muestra el error -->
					<span class="text-danger"><?php echo form_error('forma_pago'); ?></span>
					<img style="margin-left: 25%;" src="<?php echo base_url();?>assets/img/sello-garantia.png">
					<br>
					<p class="text-center">Todas sus compras en Pc-Gamer son seguras</p>
					<br><br>
			</div>
			<div class="col-md-6 col-md-offset-6 col-sm-offset-6 col-xs-offset-4">
				<a href="<?php echo base_url(); ?>carrito_controller"><button type="button" class="btn btn-default">Volver atras</button></a>
				<?php echo form_submit('Confirmar Compra','Confirmar Compra',"class='btn btn-primary'"); ?> 
				<?php form_close();?>
				
				<br><br>
			</div>
		</div>		
			
			<br>
			<br>
			<br>
		</div>
	</div>
</div>