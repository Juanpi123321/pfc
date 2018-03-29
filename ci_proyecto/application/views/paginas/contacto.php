<!-- Principal contacto -->
	<div class="container-fluid fondo-principal">
		<div class="container fondo-2">
			<div class="row">
				<br>
				<div class="titulo text-center">
					<h2>CONTACTO</h2>
				</div>			
				<h4 class="margen-izq">Podes acercarte a nuestro local, estamos ubicados por calle 9 de julio al 1449 entre San lorenzo y Catamarca, al lado del Banco Provincia.</h4>
				<br><br>
				<div class="col-xs-12 col-md-8">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1198.5417689278763!2d-58.83291997306716!3d-27.466908890164824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb92ce3fedb0d7729!2s%C3%81rea+Graduados+-+Ciencias+Exactas+y+Naturales+y+Agrimensura+-+UNNE!5e0!3m2!1ses!2sar!4v1491770714995" width="100%" height="250" frameborder="0" style="border: solid grey 2px; margin-bottom: 20px;" allowfullscreen></iframe>
				</div>
				<div class="margen-izq col-xs-10 col-sm-12 col-md-3 col-md-push-0 col-lg-3">
					<div class="form-horizontal">
						<div class="form-group">
							<p><span class="glyphicon glyphicon-inbox"></span>
							&nbspE-mail: pcgamer@hotmail.com</p>
							<p><span class="glyphicon glyphicon-earphone"></span>
							&nbspTelefonos: (379) 4221129</p>
							<p><span class="glyphicon glyphicon-calendar"></span>
							&nbspLunes a Viernes de 8:30 a 13:00hs y de 17:00 a 21:00hs</p>
							<p><span class="glyphicon glyphicon-time"></span>
							&nbspSabados de 9:00 a 14:00hs</p>
							<p><span class="glyphicon glyphicon-envelope"></span>
							&nbspCP (3400) - Corrientes - Argentina</p>
							<br>
							<p>Visitanos en las redes sociales</p>
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
					</div>
				</div>							
			</div>
			<div class="row">
				<br><h4 class="margen-izq">Podes comunicarte con nosotros telefonicamente o via email por medio del siguiente formulario.</h4><br>
				<!-- formulario -->
				<?php echo validation_errors(); ?>
				<?php echo form_open('pcgamer/verificar_consulta', ['class' => 'form-signin', 'role' => 'form']); ?>
					<div class="margen-izq col-xs-11 col-sm-5 col-md-5 col-md-push-0 col-lg-5">
						<label class="control-label" for="textinput">Nombre completo: (*)</label>
						<?php echo form_input(['name' => 'nombre_completo', 'id' => 'nombre_completo' , 'class' => 'form-control', 'required' => 'required', 'type' => 'text', 'value' => set_value('nombre_completo')]); ?>
						<br>
						<label class="control-label" for="textinput">E-mail: (*)</label>
						<?php echo form_input(['name' => 'email', 'id' => 'email' , 'class' => 'form-control', 'required' => 'required','type' => 'email', 'value' => set_value('email')]); ?>
						<br>
						<label class="control-label" for="textinput">Telefono:</label>
						<?php echo form_input(['name' => 'telefono', 'id' => 'telefono' , 'class' => 'form-control', 'type' => 'text', 'value' => set_value('telefono')]); ?>
						<br><br>
					</div>
					<div class="margen-izq col-xs-11 col-sm-5 col-sm-push-1 col-md-5 col-md-push-1 col-lg-5">  
						<label class="control-label" for="textinput">Comentarios: (*)</label>
						<?php echo form_textarea(['name' => 'comentarios', 'id' => 'comentarios' , 'class' => 'form-control', 'required' => 'required', 'type' => 'text', 'value' => set_value('comentarios')]); ?>
						<br>
						<label class="control-label" for="checkbox">No soy un robot&nbsp&nbsp</label>
						<?php echo form_checkbox('No soy un robot:', 'robot', FALSE, 'required');?>
						<br><br>	
						  <?php echo form_submit('Enviar Comentarios','Enviar Comentarios',"class='btn btn-primary'"); ?>
						  
						<br><br><br><br>
					</div>
						  <?php echo form_close();?>		
						  	
			</div>			
			<div class="visible-lg">
				<br><br><br><br><br><br>
			</div>
		</div>
	</div>