
<!-- Principal Registracion -->
<div class="container-fluid fondo-principal">
	<div class="container fondo-1">
		<div class="row">
			<br>
			<div class="titulo text-center">
				<h2>MODIFICAR DATOS DE USUARIO</h2>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-center col-xs-6 col-sm-6 col-md-4">
				<img src="<?php echo base_url(); ?>assets/img/config.png" class="img-responsive">
			</div>
		</div>
		<br>
		<div class="row">
			<h4 class="text-center">Editar usuario</h4>
			<br>
			<!-- formulario de CodeIgniter -->
			<?php echo validation_errors(); ?>

			<?php echo form_open("admin_controller/actualizar/$Id_usuario", ['class' => 'form-signin', 'role' => 'form']); ?>
				<div class="col-md-8 col-md-offset-2">				  
					<label class="control-label" for="textinput">Nombre de Usuario:</label>
					<?php echo form_input(['name' => 'usuario', 'id' => 'usuario' , 'class' => 'form-control', 'required' => 'required','autofocus' => 'autofocus', 'value' => "$usuario"]); ?>
					<br>
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

					  <a href="<?php echo base_url(); ?>admin_controller/usuarios"><button type="button" class="btn btn-default">Volver atras</button></a>
					  <?php echo form_submit('Editar Usuario','Editar Usuario',"class='btn btn-primary'"); ?>
				</div>
			<?php echo form_close();?>	<!-- Cierro el formulario -->
		</div>
		<br><br>
	  </div>
	</div>
</div>
