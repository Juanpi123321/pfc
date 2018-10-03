
<!-- principal -->
<div class="container-fluid fondo-principal">
	<div class="container fondo-2">
		<div class="row">
			<br>
			<div class="titulo text-center">
				<h2>DATOS DEL USUARIO</h2>
			</div>		
			<br>
			<h3 class="text-center">Complete los campos que esten erroneos</h3>
			<br><br>

			<?php echo form_open("pedido_controller/actualizar/$Id_usuario", ['class' => 'form-signin', 'role' => 'form']); ?>
				<div class="col-md-8 col-md-offset-2">				  
					<label class="control-label" for="textinput">Nombre de Usuario: "<?= $nombre_usuario?>"</label>
					
					<br><br>
					<label class="control-label" for="textinput">E-mail:</label>
					<?php echo form_input(['name' => 'email', 'id' => 'email' , 'class' => 'form-control', 'required' => 'required','type' => 'email', 'value' => "$email"]); ?>	
					<br>
					<label class="control-label" for="textinput">Nombre completo:</label>
					<?php echo form_input(['name' => 'nombres', 'id' => 'nombres' , 'class' => 'form-control', 'required' => 'required', 'type' => 'text', 'value' => "$nombres"]); ?>
					<br>					
					<label class="control-label" for="textinput">Apellidos:</label>
					<?php echo form_input(['name' => 'apellidos', 'id' => 'apellidos' , 'class' => 'form-control', 'required' => 'required','type' => 'text', 'value' => "$apellidos"]); ?>
					<br>
					<label class="control-label" for="textinput">DNI:</label>
					<?php echo form_input(['name' => 'dni', 'id' => 'dni' , 'class' => 'form-control', 'required' => 'required','type' => 'number','min' =>'1000000', 'max' => '90000000' , 'value' => "$dni"]); ?>
					<br>		    
					<label class="control-label" for="textinput">Direccion:</label>
					<?php echo form_input(['name' => 'direccion', 'id' => 'direccion' , 'class' => 'form-control', 'type' => 'text', 'value' => "$direccion"]); ?>
					<br><br>

					  <a href="<?php echo base_url(); ?>pedido_controller"><button type="button" class="btn btn-default">Volver atras</button></a>
					  <?php echo form_submit('Editar Datos','Editar Datos',"class='btn btn-primary'"); ?>
				</div>
			<?php echo form_close();?>	<!-- Cierro el formulario -->

			<br><br>
		</div>		
			<br>
			<br>
			<br>
	</div>
</div>