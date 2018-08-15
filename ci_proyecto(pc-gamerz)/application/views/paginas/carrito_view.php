
	<!-- principal -->
	<div class="container-fluid fondo-principal">
		<div class="container fondo-2">
			<div class="row">
				<br>
				<div class="titulo text-center">
					<h2>CARRITO DE COMPRAS</h2>
				</div>		
				<br> 
				<a href="<?php echo base_url('pcgamer/productos'); ?>"><button style="float: right; margin-right: 10px;"  class="btn btn-primary">Volver atrás</button></a>
				<br><br>
				<?php if (!$this->cart->contents()){  ?>
			       <img style="width: 40%; margin-left: 30%;" src="<?php echo base_url();?>assets/img/carrito.gif">
			    <?php } ?>
				
				<h1 class="text-center"><?php echo $message ?></h1>  
				
				<table id="mytable" class="table table-bordred table-striped">  
					<?php if ($cart = $this->cart->contents()): ?>   
						<thead>    
							<td>Nº item</td>    
							<td>Nombre</td>    
							<td>Precio</td>    
							<td>Cantidad</td>    
							<td>Subtotal</td>    
							<td>Acción</td>   
						</thead>  
						<tbody>   <?php      $i = 1;   
							foreach ($cart as $item):?>        
							<tr>    <td><?php echo $i++; ?></td>  
								<td><?php echo $item['name']; ?></td>  
								<td>$ <?php echo $this->cart->format_number($item['price'],2); ?></td> 
								<td><?php echo $item['qty']; ?></td>
								<td>$ <?php echo $this->cart->format_number($item['subtotal'],2); ?></td>  
								<td><?php echo anchor('carrito_controller/borrar/'.$item['rowid'],'Eliminar'); ?>&nbsp <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="auto" title="Eliminar de la lista"><span class="glyphicon glyphicon-trash"></span></button></td>

						    </tr>  
							<?php endforeach; ?>   
							<tr>     
								<td>Total Compra:$<?php echo number_format($this->cart->total(),2); ?></td>
								<td><button type="button" class="btn btn-default" onclick="limpiar_carito()">Vaciar carrito</button></td>        
								<td><a href="<?php echo base_url('carrito_controller/consultar_stock'); ?>" class="btn btn-primary" role="button">Ordenar compra</a></td> 
								<!-- realizar_pedido --> 
								<td></td>
								<td></td>
								<td></td>														  
							</tr>  
					<?php endif; ?>  </tbody>  
				</table>   
			
				<script>  
					function limpiar_carito() {  
						var result = confirm('¿Desea vaciar el carrito?');    
						if(result) {   
							window.location = "<?php echo base_url(); ?>carrito_controller/borrar/all";  
						}else{   
							return false; // cancela al acción  
						} 
					}
				</script> 


<br><br><br><br><br>
<br>
<br>
<br>
<br>
<br>	
</div>
</div>
</div>
