<?php 

class Admin_model extends CI_Model

{
    function __construct()
    {
        parent::__construct();
    }


  public function guardar_persona($data)
  {
      $this->db->insert('personas', $data);
  }

  /*USUARIOS*/

  public function guardar_usuario($id, $usuario, $password)
  {
      $data = array(               
      'persona_id' => $id,
      'usuario' => $usuario,
      'contrasena' => base64_encode($password),
      'estado' => '1'
      );

      $this->db->insert('usuarios', $data);
      redirect('admin_controller/usuarios');   
  }

  public function select_usuarios()
  {       
      $this->db->select('*');       
      $this->db->from('usuarios');    
      $this->db->join('personas', 'personas.Id_persona = usuarios.persona_id');
      $this->db->join('rol', 'rol.Id_rol = personas.rol_id');       
      $query = $this->db->get();       
      return $query->result();         
  }

  public function select_rol()
  {     
      $query = $this->db->get('rol_id');           
      return $query->result();    
  }

  public function select_usuario_id($id)  
  {                          
      $this->db->select('*');                           
      $this->db->from('usuarios');                           
      $this->db->where('Id_usuario', $id);                           
      $query = $this->db->get();                           
      return $query->result();    
  }

  public function actualizar_usuario($data_us,$data_per, $id)  
  {         
      $this->db->where('Id_usuario', $id);
      $this->db->update('usuarios', $data_us);
      $this->db->where('Id_persona', $id);
      $this->db->update('personas', $data_per);
  }

  public function estado_usuario($data, $id)  
  {                                  
      $this->db->where('Id_usuario', $id);       
      $this->db->update('usuarios', $data);                               
  }

  public function select_persona_id($id)  
  {                          
      $this->db->select('*');                           
      $this->db->from('personas');                           
      $this->db->where('Id_persona', $id);                           
      $query = $this->db->get();                           
      return $query->result();    
  }

  public function usuarios_mostrar($limit,$row)
  {
      $this->db->select('*');
      $this->db->from('usuarios');
      $this->db->limit($limit,$row);
      $this->db->join('personas', 'personas.Id_persona = usuarios.persona_id');
      $this->db->join('rol', 'rol.Id_rol = personas.rol_id');
      $query = $this->db->get();
      return $query->result();
  }

  /*PRODUCTOS*/

  public function select_productos()
  {       
      $this->db->select('*'); 
      $this->db->from('productos');
      $this->db->join('categoria', 'categoria.Id_categoria = productos.categoria_id');
      $this->db->where('estado', "1");
      $query = $this->db->get();       
      return $query->result();         
  }

  public function productos_mostrar($limit,$row)
  {       
      $this->db->select('*'); 
      $this->db->from('productos');
      $this->db->limit($limit,$row);
      $this->db->join('categoria', 'categoria.Id_categoria = productos.categoria_id');
      $this->db->where('estado', "1");
      $query = $this->db->get();
      return $query->result();         
  }

  public function productos_mostrar_admin($limit,$row)
  {       
      $this->db->select('*'); 
      $this->db->from('productos');
      $this->db->limit($limit,$row);
      $this->db->join('categoria', 'categoria.Id_categoria = productos.categoria_id');
      /*$this->db->where('estado', "1");*/
      $query = $this->db->get();
      return $query->result();         
  }

  public function estado_producto($data, $id)  
  {                                  
      $this->db->where('Id_producto', $id);       
      $this->db->update('productos', $data);                               
  }

  public function guardar_producto($data)
  {
      $this->db->insert('productos', $data);
      redirect('admin_controller/productos');
  }

  public function actualizar_producto($data, $id)  
  {         
      $this->db->where('Id_producto', $id);
      $this->db->update('productos', $data);
  }

  public function select_productos_id($id)  
  {                          
      $this->db->select('*');                           
      $this->db->from('productos');                           
      $this->db->where('Id_producto', $id);                    
      $query = $this->db->get();                           
      return $query->result();    
  }

  /*VENTAS*/
  public function select_facturas_cabecera(){       
      $this->db->select('*');       
      $this->db->from('factura');
      $this->db->order_by('fecha', 'asc');
      $this->db->join('personas', 'personas.Id_persona = factura.cliente_id');
      $this->db->join('forma_pago', 'forma_pago.Id_forma_pago = factura.forma_pago_id');
      $query = $this->db->get();
      return $query->result();
  }

  public function select_facturas_completa(){       
      $this->db->select('*');
      $this->db->from('factura');
      $this->db->join('factura_detalle', 'factura_detalle.factura_id = factura.Id_factura');
      $this->db->join('personas', 'personas.Id_persona = factura.cliente_id');
      $this->db->join('productos', 'productos.Id_producto = factura_detalle.producto_id');
      $this->db->join('rol', 'rol.Id_rol = personas.rol_id');
      $this->db->join('categoria', 'categoria.Id_categoria = productos.categoria_id');
      $query = $this->db->get();
      return $query->result();
  }

  public function ventas_mostrar_clientes($limit,$row,$fecha_busqueda)
  {       
      $this->db->select('*');       
      $this->db->from('factura');
      $this->db->limit($limit,$row);
      $this->db->order_by('fecha', 'asc');
      if (!empty($fecha_busqueda)):
        $this->db->where('fecha', $fecha_busqueda);
      endif;
      $this->db->join('personas', 'personas.Id_persona = factura.cliente_id');
      $this->db->join('forma_pago', 'forma_pago.Id_forma_pago = factura.forma_pago_id');
      $query = $this->db->get();
      return $query->result();       
  }

  public function select_facturas_fechas($fecha_busqueda){
      $this->db->select('*');       
      $this->db->from('factura');
      $this->db->order_by('fecha', 'asc');
      if (!empty($fecha_busqueda)):       
        $this->db->where('fecha', $fecha_busqueda);       
      endif;
      $this->db->join('personas', 'personas.Id_persona = factura.cliente_id');
      $this->db->join('forma_pago', 'forma_pago.Id_forma_pago = factura.forma_pago_id');
      $query = $this->db->get();
      return $query->result();
  }

  public function ventas_mostrar_categoria($limit,$row,$categoria_busqueda){
      $this->db->select('*');       
      $this->db->from('factura');      
      $this->db->limit($limit,$row);
      $this->db->order_by('fecha', 'asc');
      $this->db->join('factura_detalle', 'factura_detalle.factura_id = factura.Id_factura');
      $this->db->join('productos', 'productos.Id_producto = factura_detalle.producto_id');
      $this->db->join('categoria', 'categoria.Id_categoria = productos.categoria_id');
      if (!empty($categoria_busqueda)):       
        $this->db->where('descripcion_categoria', $categoria_busqueda);        
      endif;
      $this->db->join('personas', 'personas.Id_persona = factura.cliente_id');
      $this->db->join('forma_pago', 'forma_pago.Id_forma_pago = factura.forma_pago_id');
      $query = $this->db->get();
      return $query->result();
  }

  public function select_facturas_categoria($categoria_busqueda){
      $this->db->select('*');       
      $this->db->from('factura');
      $this->db->order_by('fecha', 'asc');
      $this->db->join('factura_detalle', 'factura_detalle.factura_id = factura.Id_factura');
      $this->db->join('productos', 'productos.Id_producto = factura_detalle.producto_id');
      $this->db->join('categoria', 'categoria.Id_categoria = productos.categoria_id');
      if (!empty($categoria_busqueda)):       
        $this->db->where('descripcion_categoria', $categoria_busqueda);        
      endif;
      $this->db->join('personas', 'personas.Id_persona = factura.cliente_id');
      $this->db->join('forma_pago', 'forma_pago.Id_forma_pago = factura.forma_pago_id');
      $query = $this->db->get();
      return $query->result();
  }
  
  /*CONSULTAS*/
  public function select_consultas()
  {       
      $this->db->select('*');       
      $this->db->from('consultas');
      $query = $this->db->get();
      return $query->result();
  }

}