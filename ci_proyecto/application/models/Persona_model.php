<?php 

class Persona_model extends CI_Model

{
    function __construct()
    {
        parent::__construct();
    }


  public function guardar_persona($data)
  {
          $this->db->insert('personas', $data);
  }


  public function guardar_usuario($id, $usuario, $password)
  {              
           $data = array(               
           'persona_id' => $id,
           'usuario' => $usuario,
  	       'contrasena' => base64_encode($password),
           'estado' => '1'
            );

            $this->db->insert('usuarios', $data);
        
}

}