
<!-- Principal Registracion -->
<div class="container-fluid fondo-principal">
	<div class="container fondo-2">
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
			<h4 class="text-center">Registrate y disfruta de todas nuestras promociones</h4>
			<br>

			<!-- formulario de CodeIgniter -->
			<?php echo validation_errors(); ?> 

			<?php echo form_open_multipart('persona_controller/registrar_persona', ['class' => 'form-signin', 'role' => 'form']); ?>
				<div class="margen-izq col-xs-11 col-sm-5 col-md-5 col-md-push-0 col-lg-5">			
					<label class="control-label" for="textinput">Nombre completo:</label>
					<?php echo form_input(['name' => 'nombres', 'id' => 'nombres' , 'class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus','type' => 'text', 'value' => set_value('nombres')]); ?>
					<br>
					<label class="control-label" for="textinput">Apellidos:</label>
					<?php echo form_input(['name' => 'apellidos', 'id' => 'apellidos' , 'class' => 'form-control', 'required' => 'required','type' => 'text', 'value' => set_value('apellidos')]); ?>
					<br>	
					<label class="control-label" for="textinput">DNI:</label>
					<?php echo form_input(['name' => 'dni', 'id' => 'dni' , 'class' => 'form-control', 'required' => 'required','type' => 'number','min' =>'1000000', 'max' => '90000000' , 'value' => set_value('dni')]); ?>
					<br>
					<label class="control-label" for="textinput">Direccion:</label>
					<?php echo form_input(['name' => 'direccion', 'id' => 'direccion' , 'class' => 'form-control', 'type' => 'text', 'value' => set_value('direccion')]); ?>
					<br>
					<label class="control-label" for="textinput">E-mail:</label>
					<?php echo form_input(['name' => 'email', 'id' => 'email' , 'class' => 'form-control', 'required' => 'required','type' => 'email', 'value' => set_value('email')]); ?>
					<br><br>
				</div>
				<div class="margen-izq col-xs-11 col-sm-5 col-sm-push-1 col-md-5 col-md-push-1 col-lg-5">  
					<label class="control-label" for="textinput">Nombre de Usuario:</label>
					<?php echo form_input(['name' => 'usuario', 'id' => 'usuario' , 'class' => 'form-control', 'required' => 'required', 'value' => set_value('usuario')]); ?>
					<br>				  	
					<label class="control-label" for="textinput">Contraseña:</label>
					<?php echo form_input(['name' => 'password', 'id' => 'password' , 'class' => 'form-control', 'required' => 'required','type' => 'password', 'value' => set_value('password')]); ?>
					<br>				  	
					<label class="control-label" for="textinput">Reescriba la contraseña:</label>
					<?php echo form_input(['name' => 'passconf', 'id' => 'passconf' , 'class' => 'form-control', 'required' => 'required','type' => 'password', 'value' => set_value('passconf')]); ?>
					<br>				  	
				  	<label class="control-label" for="textinput">Nombre de su mascota favorita:</label>
					<?php echo form_input(['name' => 'pregsecreta', 'id' => 'pregsecreta' , 'class' => 'form-control', 'required' => 'required', 'value' => set_value('pregsecreta')]); ?>
					<br>
					<label for="imagen">Imagen</label>
					<?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'type'=>'file', 'value' => set_value('imagen')]); ?>
				    <br>	
				    <span class="text-danger"><?php echo form_error('imagen'); ?></span>			  	
					<label class="control-label" for="promos">No soy un robot&nbsp</label>
					<?php echo form_input(['name' => 'robot', 'id' => 'robot' , 'class' => 'form-control', 'required' => 'required','type' => 'checkbox', 'value' => set_value('robot')]); ?>
					<br>				  	
				  	<label class="control-label" for="checkbox">Deseo recibir e-mails con ofertas y promociones&nbsp</label>
					<?php echo form_input(['name' => 'promos', 'id' => 'promos' , 'class' => 'form-control','type'=>'checkbox','checked' => 'checked', 'value' => set_value('promos')]); ?>
					<br>
					  <?php echo form_submit('Registrar Usuario','Registrar Usuario',"class='btn btn-primary'"); ?>
					  <?php echo form_submit('Limpiar','Limpiar',"class='btn btn-primary'"); ?>
				</div>
			<?php echo form_close();?>	<!-- Cierro el formulario -->
		</div>
		<br><br>
		<div class="row">
			<div class="col-md-12">
				Seguinos en&nbsp
				<a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/pcgamermagazine/">
				    <span class="fa fa-facebook"></span>
				</a>
				<a class="btn btn-social-icon btn-twitter" href="https://twitter.com/pcgamer?lang=es">
				    <span class="fa fa-twitter"></span>
				</a>
				<a class="btn btn-social-icon btn-instagram" href="https://www.instagram.com/pcgamermagazine/?hl=es">
				    <span class="fa fa-instagram"></span>
				</a>
				<a class="btn btn-social-icon btn-linkedin" href="https://www.linkedin.com/company/pc-gamer">
				    <span class="fa fa-linkedin"></span>
				</a>
			</div>
				<br><br>
		</div>

	  </div>
	</div>
</div>
