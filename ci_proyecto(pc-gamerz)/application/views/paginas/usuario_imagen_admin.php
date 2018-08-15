
<!-- principal -->
			<div class="container-fluid fondo-principal">
				<div class="container fondo-1">
					<div class="row">
						<br>
						<div class="titulo text-center">
							<h2>&nbspNOMBRE DE USUARIO:&nbsp&nbsp"<?= $usuario?>"</h2>
						</div>						
						<br>
						<div class="col-md-6 col-md-offset-3">
							<br>
							<img style="border: 1px solid black; width: 100%;" src="<?php echo base_url('uploads/img_usuarios/') . $imagen?>">
							<br><br><br>
							<a style="text-decoration: none;" href="<?php echo base_url(); ?>admin_controller/usuarios">
								<button class="btn btn-primary center-block">CERRAR</button></a>
						<br><br><br>
						</div>
						<div class="col-xs-1 col-xs-offset-0 col-sm-1 col-sm-offset-0 col-md-offset-1">
				    		<a style="padding-top: 0;" href="<?php echo base_url(); ?>admin_controller/usuarios"><button class="btn btn-default">Volver atrás</button></a>
				    	</div>	
				    </div>
				</div>
			</div>

			
			 