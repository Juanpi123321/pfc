
<!-- Principal Registracion -->
<div class="container-fluid fondo-principal">
	<div class="container fondo-1">
		<div class="row">
			<br>
			<div class="titulo text-center">
				<h2>REGISTRO DE USUARIO</h2>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-center col-xs-6 col-sm-6 col-md-4">
				<img src="<?php echo base_url(); ?>assets/img/pcgamer-readers.png" class="img-responsive">
			</div>
		</div>
		<br>
		<div class="row">
			<h4 class="text-center">Registrar usuario</h4>
			<br>
			<!-- Formulario -->
			<?php echo validation_errors(); ?> 

			<?php echo form_open_multipart('admin_controller/registrar_persona', ['class' => 'form-signin', 'role' => 'form']); ?>
				<div class="margen-izq col-xs-11 col-sm-5 col-md-5 col-md-push-0 col-lg-5">			
					<label class="control-label" for="textinput">Nombre completo:</label>
					<?php echo form_input(['name' => 'nombres', 'id' => 'nombres' , 'class' => 'form-control', 'required' => 'required','placeholder' => 'Ej. Jorge, Miguel', 'autofocus' => 'autofocus','type' => 'text', 'value' => set_value('nombres')]); ?>
					<br>					
					<label class="control-label" for="textinput">Apellidos:</label>
					<?php echo form_input(['name' => 'apellidos', 'id' => 'apellidos' , 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ej. Gomez, Gonzalez','type' => 'text', 'value' => set_value('apellidos')]); ?>
					<br>	
					<label class="control-label" for="textinput">DNI:</label>
					<?php echo form_input(['name' => 'dni', 'id' => 'dni' , 'class' => 'form-control', 'required' => 'required','type' => 'number', 'placeholder' => 'Ej. 30111222','min' =>'1000000', 'max' => '90000000' , 'value' => set_value('dni')]); ?>
					<br>
					<label class="control-label" for="textinput">Direccion:</label>
					<?php echo form_input(['name' => 'direccion', 'id' => 'direccion' , 'class' => 'form-control', 'type' => 'text', 'placeholder' => 'Ej. B° 1000viv. Ibera y av. El Maestro', 'value' => set_value('direccion')]); ?>
					<br>
					<label class="control-label" for="textinput">E-mail:</label>
					<?php echo form_input(['name' => 'email', 'id' => 'email' , 'class' => 'form-control', 'required' => 'required','type' => 'email', 'placeholder' => 'Ej. juanpi@hotmail.com', 'value' => set_value('email')]); ?>
					<br><br>
				</div>
				<div class="margen-izq col-xs-11 col-sm-5 col-sm-push-1 col-md-5 col-md-push-1 col-lg-5">  
					<label class="control-label" for="textinput">Nombre de Usuario:</label>
					<?php echo form_input(['name' => 'usuario', 'id' => 'usuario' , 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ej. Juanpi123', 'value' => set_value('usuario')]); ?>
					<br>				  	
					<label class="control-label" for="textinput">Contraseña:</label>
					<?php echo form_input(['name' => 'password', 'id' => 'password' , 'class' => 'form-control', 'required' => 'required','type' => 'password', 'placeholder' => '********', 'value' => set_value('password')]); ?>
					<br>				  	
					<label class="control-label" for="textinput">Reescriba la contraseña:</label>
					<?php echo form_input(['name' => 'passconf', 'id' => 'passconf' , 'class' => 'form-control', 'required' => 'required','type' => 'password', 'placeholder' => '********', 'value' => set_value('passconf')]); ?>
					<br>
					<label for="imagen">Imagen</label>
					<?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'type'=>'file', 'value' => set_value('imagen')]); ?>
				    <br>	
				    <span class="text-danger"><?php echo form_error('imagen'); ?></span>
				  	<label for="rol">Rol de Usuario</label>
				    <br>
				    <div class="row">
				    	<div class="col-xs-6 col-xs-offset-2">				    		
						    <input type="radio" name="rol" value="1" <?php echo  set_radio('<rol</rp>', '1'); ?> />
						    <label>Administrador</label>
						    <br>
						    <input type="radio" name="rol" value="2" <?php echo  set_radio('<rol</rp>', '2', TRUE); ?> />
						    <label>Cliente</label>
						    <br>
						    <input type="radio" name="rol" value="3" <?php echo  set_radio('<rol</rp>', '3'); ?> />
						    <label>Empleado</label>
						    <br><br>
				    	</div>
				    </div>
				    
					  <?php echo form_submit('Registrar Usuario','Registrar Usuario',"class='btn btn-primary'"); ?>
					  <a href="<?php echo base_url(); ?>admin_controller/usuarios"><button type="button" class="btn btn-primary">Volver atras</button></a>
					  <br>
				</div>
			<?php echo form_close();?>	<!-- Cierro el formulario -->
		</div>
		<br><br>
	  </div>
	</div>
</div>
