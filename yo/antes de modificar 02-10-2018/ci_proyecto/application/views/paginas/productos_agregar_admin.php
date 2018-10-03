
<!-- Principal Registracion -->
<div class="container-fluid fondo-principal">
	<div class="container fondo-1">
		<div class="row">
			<br>
			<div class="titulo text-center">
				<h2>AGREGAR PRODUCTO</h2>
			</div>
		</div>
		<br><br>
		<div class="row">
			<br>
			<!-- formulario de CodeIgniter -->
			<?php echo validation_errors(); ?> 

			<?php echo form_open_multipart('admin_controller/verificar_producto', ['class' => 'form-signin', 'role' => 'form']); ?>
				<div class="col-md-8 col-md-offset-2">
					<label class="control-label" for="textinput">Nombre completo:</label>
					<?php echo form_input(['name' => 'nombre', 'id' => 'nombre' , 'class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus','placeholder' => 'Ej. Pc Bronze, Raidmax, etc.','type' => 'text', 'value' => set_value('nombre')]); ?>
					<br>				
					<label class="control-label" for="textinput">Caracteristicas:</label>
					<?php echo form_textarea(['name' => 'caracteristica', 'id' => 'caracteristica' , 'class' => 'form-control', 'required' => 'required','type' => 'text','placeholder' => '• Procesador 
• disco duro 
• ram 
• placa de video 
• etc.', 'value' => set_value('caracteristica')]); ?>
<!-- si no le pongo asi no queda bien al margen en la pagina -->
					<br>	
					<label class="control-label" for="textinput">Precio:</label>
					<?php echo form_input(['name' => 'precio', 'id' => 'precio' , 'class' => 'form-control', 'required' => 'required','placeholder' => 'Ej. 199.99','type' => 'decimal','min' =>'0', 'value' => set_value('precio')]); ?>
					<br>
					<label class="control-label" for="textinput">Stock:</label>
					<?php echo form_input(['name' => 'stock', 'id' => 'stock' , 'class' => 'form-control', 'required' => 'required','type' => 'number','min' =>'0','placeholder' => 'Cantidad disponible', 'value' => set_value('stock')]); ?>
					<br>
					<!-- provisorio xq lo ideal seria sacar de la base de datos -->
					<label class="control-label">Categoria:&nbsp</label>
					<?php $opciones = array(
					        '0'         => 'Seleccione una categoria',
					        '1'         => 'Desktop-Escritorio',
					        '2'           => 'Notebook',
							);
					echo form_dropdown('categoria', $opciones, '0'); ?>
					<br><br>
					<label for="imagen">Imagen</label>
					<?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'type'=>'file', 'value' => set_value('imagen')]); ?>
				    <br><br><br>
				    
					  <?php echo form_submit('Agregar Producto','Agregar Producto',"class='btn btn-primary'"); ?>
					  <a href="<?php echo base_url(); ?>admin_controller/productos"><button type="button" class="btn btn-primary">Volver atras</button></a>
				</div>
			<?php echo form_close();?>	<!-- Cierro el formulario -->
		</div>
		<br><br>
	  </div>
	</div>
</div>
