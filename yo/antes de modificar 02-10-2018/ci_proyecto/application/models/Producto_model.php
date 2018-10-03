<?php

class Producto_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

	public function select_producto_id($id)  
  {                          
      $this->db->select('*');                           
      $this->db->from('productos');                           
      $this->db->where('Id_producto', $id);                    
      $query = $this->db->get();
      $resultado = $query->row();
      return $resultado;  
  }

  public function select_producto_id_objeto($id)  
  {                          
      $this->db->select('*');                           
      $this->db->from('productos');                           
      $this->db->where('Id_producto', $id);                    
      $query = $this->db->get();
      return $query->result();
  }

}

?>