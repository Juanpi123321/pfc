
	<!-- barra de navegacion -->
	<nav role="navigation" class="navbar navbar-default navbar-admin">
		<div class="navbar-header">
			<button type="button" data-target="#barra-navegacion" data-toggle="collapse" class="navbar-toggle">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<img class="navbar-logo" src="<?php echo base_url(); ?>assets/img/pcgamer-logo.png">
		</div>		
		<div id="barra-navegacion" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="<?= $inicio ?>"><a href="<?php echo base_url(); ?>admin_controller">ADMINISTRADOR</a></li>
				<li class="<?= $usuarios ?>"><a href="<?php echo base_url(); ?>admin_controller/usuarios">USUARIOS</a></li>
				<li class="<?= $productos ?>"><a href="<?php echo base_url(); ?>admin_controller/productos">PRODUCTOS</a></li>
				<li class="dropdown <?= $ventas ?>">
					<a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo base_url(); ?>admin_controller/ventas_clientes/#">VENTAS<b class="caret"></b></a>
					<ul role="menu" class="dropdown-menu">
						<li><a href="<?php echo base_url(); ?>admin_controller/ventas_clientes">CLIENTES</a></li>
						<li><a href="<?php echo base_url(); ?>admin_controller/ventas_categoria">CATEGORIA</a></li>
					</ul>
				</li>
				<li class="<?= $consultas ?>"><a href="<?php echo base_url(); ?>admin_controller/consultas">CONSULTAS</a></li>
			</ul>

			<div class="navbar-right margen-boton-navbar">
				<!-- Boton de carrito -->
				<?php if (!$this->cart->contents()){	?>
					<a class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="bottom" title="El carrito esta vacio" href="<?php echo base_url();?>carrito_controller"><span class="glyphicon glyphicon-shopping-cart"></span></a>
	  			    <?php } else {  ?>
					<a class="btn btn-primary btn-lg" data-toggle="tooltip" data-placement="bottom" title="El carrito esta cargado" href="<?php echo base_url();?>carrito_controller"><span class="glyphicon glyphicon-shopping-cart"></span></a>
					<?php } ?>

				<!-- Boton de sesion -->
				<div class="btn-group">		
				  <button type="button" class="btn btn-default btn-circle btn-lg dropdown-toggle" data-toggle="dropdown" style="margin: 0px;"><i class="glyphicon glyphicon-user"></i></button>
					  <ul class="dropdown-menu" style="background: ghostwhite; color: black; text-align: center;">
					    <hr style="margin-top: 3px;">
					    <div class="row">			   	  
					      <div class="col-md-4">
							<img src="<?php echo base_url('uploads/img_usuarios/') . $imagen?>" height="50" width="50"/>
						  </div>
						  <div class="col-md-6">
						    <li><b>&nbsp<?= $nombres?>&nbsp<?= $apellidos?>&nbsp</b></li>
						    <br>
						    <li>&nbsp<?= $nombre_usuario?>&nbsp</li>
						   </div>
						 </div>
						 	<hr style="margin-top: 10px; margin-bottom: 3px;">
						    <a href="<?php echo base_url();?>login_controller/cerrar_sesion" title=""><button type="button" class="btn btn-primary btn-sm navbar-btn" data-toggle="modal" data-target=#Cerrar>Cerrar Sesion</button></a>
					  </ul>
				</div>
			</div>				
		</div>
	</nav>
