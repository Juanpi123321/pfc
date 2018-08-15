<?php

class Usuario_model extends CI_Model

{
    function __construct()
    {
        parent::__construct();
    }


  public function  buscar_usuario($usuario, $contrasena)
  {
                            $this->db->select('*');
                            $this->db->from('usuarios');
                            $this->db->where('usuario', $usuario);
                            $this->db->where('contrasena', $contrasena);
                            $query = $this->db->get();
  			  $resultado = $query->row();
        			  return $resultado;
                        }

  public function  buscar_usuario_id($id)
  {
                            $this->db->select('*');
                            $this->db->from('usuarios');
                            $this->db->where('Id_usuario', $id);
                            $query = $this->db->get();
          $resultado = $query->row();
                return $resultado;
                        }

  public function buscar_persona($Id_persona)
  {
                            $this->db->select('*');
                            $this->db->from('personas');
                            $this->db->where('Id_persona', $Id_persona);
                            $query = $this->db->get();
                            $resultado = $query->row();
        			  return $resultado;
  }

  public function buscar_persona_dni($dni)
  {
                            $this->db->select('*');
                            $this->db->from('personas');
                            $this->db->where('dni', $dni);
                            $query = $this->db->get();
                            $resultado = $query->row();
                return $resultado;
  }

  public function registrar_consulta($data)
  {
          $this->db->insert('consultas', $data);
  }

}

