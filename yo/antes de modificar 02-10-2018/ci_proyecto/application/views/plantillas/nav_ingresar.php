
	<!-- barra de navegacion -->
	<nav role="navigation" class="navbar navbar-default">
		<div class="navbar-header">
			<button type="button" data-target="#barra-navegacion" data-toggle="collapse" class="navbar-toggle">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			 <?php $host= $_SERVER["HTTP_HOST"];
				 $url= $_SERVER["REQUEST_URI"]; ?>
				 <!--echo "https://" . $host . $url; 
				-->
			<!-- <a href="<?php echo base_url(); ?>#texto"><img class="navbar-logo" src="<?php echo base_url(); ?>assets/img/pcgamer-logo.png" alt="logo"></a> -->

			<a href="<?php echo "https://" . $host . $url; ?><img class="navbar-logo" src="<?php echo base_url(); ?>assets/img/pcgamer-logo.png" alt="logo"></a>
		</div>		
		<div id="barra-navegacion" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="<?= $inicio ?>"><a href="<?php echo base_url(); ?>">INICIO</a></li>
				<li class="<?= $productos ?>"><a href="<?php echo base_url(); ?>pcgamer/productos">PRODUCTOS</a></li>
				<li class="<?= $contacto ?>"><a href="<?php echo base_url(); ?>pcgamer/contacto">CONTACTO</a></li>
				<li class="dropdown <?= $nosotros ?>">
					<a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo base_url(); ?>pcgamer/index/#">NOSOTROS<strong class="caret"></strong></a>
					<ul role="menu" class="dropdown-menu">
						<li><a href="<?php echo base_url(); ?>pcgamer/quienes_somos">QUIENES SOMOS</a></li>
						<li><a href="<?php echo base_url(); ?>pcgamer/comercializacion">COMERCIALIZACION</a></li>
						<li><a href="<?php echo base_url(); ?>pcgamer/terminos_y_condiciones">TERMINOS Y CONDICIONES</a></li>
					</ul>
				</li>
			</ul>
			
			<button type="button" class="btn btn-primary navbar-btn navbar-right margen-boton-navbar" data-toggle="modal" data-target=#ingresar>Ingresar</button>				    
			<!-- Modal -->
			<div class="modal fade" id="ingresar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog modal-sm">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal">
			                       <span aria-hidden="true">&times;</span>
			                       <span class="sr-only">Close</span>
			                </button>
			                <h2 class="modal-title" id="myModalLabel">Pc-GamerZ Login</h2>
			            </div>
						<?php echo form_open('login_controller/iniciar_sesion', ['class' => 'form-signin', 'role' => 'form']); ?>
			            	<div class="modal-body">		               
			                  <label class="control-label" for="usuario">Nombre de Usuario:</label>
							  <?php echo form_input(['name' => 'usuario', 'id' => 'usuario' , 'class' => 'form-control', 'required' => 'required','autofocus' => 'autofocus' , 'placeholder' => 'Usuario', 'value' => set_value('usuario')]); ?>
							  <br>
			                  <label class="control-label" for="password">Contraseña:</label>
							  <?php echo form_input(['name' => 'password', 'id' => 'password' , 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Contraseña','type' => 'password', 'value' => set_value('password')]); ?>
							  <br>
							  <label class="control-label" for="recordar">Recordar mi cuenta&nbsp&nbsp</label>
							  <?php     
							        $dataCheckBox = array(
							            'name'          => 'Recordar mi cuenta',
                                        'id'            => 'recordar',
                                        'value'         => 'recordar',
                                        'checked'       => FALSE
                                        );
							        echo form_checkbox($dataCheckBox);?>
							        <!-- echo form_checkbox('Recordar mi cuenta','recordar', FALSE);?> -->
				            </div>
				            <div class="modal-footer">
				            	<?php echo form_submit('Ingresar','Ingresar',"class='btn btn-primary'"); ?>
				                <a href="<?php echo base_url(); ?>pcgamer/registracion"><button type="button" class="btn btn-default" 	data-dismiss="modal" onclick="javascript:registrar();">Registrarse</button>
				                </a>
				                <!-- permite dirigir al boton registrar hacia la pag del registro -->
				                <script type="text/javascript">
				                	function registrar(){
				                		location.href= "<?php echo base_url(); ?>pcgamer/registracion"
				                	}
				                </script>
				            </div>
				            <!-- Cierro el formulario -->
			            	<?php echo form_close();?>
			        </div>
			    </div>
			</div>
		</div>	
	</nav>
