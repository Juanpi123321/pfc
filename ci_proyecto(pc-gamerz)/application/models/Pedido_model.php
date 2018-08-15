<?php

class Pedido_model extends CI_Model

{
    function __construct()
    {
        parent::__construct();
    }

  public function guardar_factura_cabecera($data) 
  {                          
    $this->db->insert('factura', $data);         
  } 

  public function guardar_factura_detalle($data) 
  {                           
    $this->db->insert('factura_detalle', $data);         
  }

  public function actualizar($data, $id)  
  {  
    $this->db->where('Id_persona', $id);
    $this->db->update('personas', $data);
  }

  public function select_usuario_id($id)  
  {                          
    $this->db->select('*');                           
    $this->db->from('usuarios');                           
    $this->db->where('Id_usuario', $id);                           
    $query = $this->db->get();                           
    return $query->result();     
  }

 public function select_persona_id($id)  
 {                          
    $this->db->select('*');                           
    $this->db->from('personas');                           
    $this->db->where('Id_persona', $id);                           
    $query = $this->db->get();                           
    return $query->result();    
 }

}