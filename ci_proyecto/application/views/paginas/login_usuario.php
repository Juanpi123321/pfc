
<!-- Principal Login -->
<div class="container-fluid fondo-principal">
	<div class="container fondo-2">
		<div class="row">
			<br>
			<div class="titulo text-center">
				<h2>LOGIN DE USUARIO</h2>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-center col-xs-6 col-sm-6 col-md-4">
				<img src="<?php echo base_url(); ?>assets/img/pcgamer-logo.png" class="img-responsive">
			</div>
		</div>
		<br>
		<div class="row">
			<h4 class="text-center">Login de Usuario</h4>
			<br><br>

			<!-- Formulario -->
			<?php echo form_open('login_controller/iniciar_sesion', ['class' => 'form-signin', 'role' => 'form']); ?>				
			<div class="col-md-6 col-md-offset-3">
			<span class="text-danger"><?php echo validation_errors(); ?></span> 
				<label class="control-label" for="textinput">Nombre de Usuario:</label>
				<?php echo form_input(['name' => 'usuario', 'id' => 'usuario' , 'class' => 'form-control', 'required' => 'required','autofocus' => 'autofocus' , 'placeholder' => 'Usuario', 'value' => set_value('usuario')]); ?>
				<br>
				<label class="control-label" for="textinput">Contraseña:</label>
				<?php echo form_input(['name' => 'password', 'id' => 'password' , 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Contraseña','type' => 'password', 'value' => set_value('password')]); ?>
				<br><br><br>

				<?php echo form_submit('Ingresar','Ingresar',"class='btn btn-primary'"); ?>
				<a href="<?php echo base_url(); ?>pcgamer"><button type="button" class="btn btn-primary">Volver atras</button></a>
			</div>
		</div>
			<?php echo form_close();?>	<!-- Cierro el formulario -->
		
		<br><br><br><br>
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
