<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona_controller extends CI_Controller {


		function __construct()
    			{
        			parent::__construct();
    			}

public function registracion()
  {
    $data['title']= 'Registracion';
    $this->load->view('plantillas/header',$data);

    $datos = array('inicio' => '', 'contacto' => '', 'nosotros' => '', 'productos' => '');
    $this->load->view('plantillas/nav_ingresar',$datos);
    $this->load->view('paginas/registracion');
    $this->load->view('plantillas/footer');
  }



public function registrar_persona() //verifica todos los campos

	{          
   $this->form_validation->set_rules('nombres', 'Nombre de la persona', 'required');
   $this->form_validation->set_rules('apellidos', 'Apellido de la persona', 'required');
   
   $this->form_validation->set_rules('dni', 'DNI de la persona', 'required|integer|callback_validar_dni');
   $this->form_validation->set_rules('direccion', 'Direccion de la persona');
   $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

   $this->form_validation->set_rules('usuario', 'usuario', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
   $this->form_validation->set_rules('passconf', 'Confirmar password', 'trim|required|matches[password]');  /*trim me quita espacios*/
   $this->form_validation->set_rules('imagen', 'Seleccionar una imagen',  'callback_validar_imagen');


/*para que mustre el mensaje con esa leyenda o sino va a mostrar en ingles*/
$this->form_validation->set_message('valid_email', 'El campo %s debe ser un mail válido');
$this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros');
$this->form_validation->set_message('required', 'El campo %s es obligatorio');
$this->form_validation->set_message('min_length', 'El campo %s debe contener como mínimo %d caracteres');
$this->form_validation->set_message('matches', 'las contraseñas no coinciden');


   if ($this->form_validation->run() == FALSE) {

                $this->registracion();

        } else {
           $this->insertar_persona();
            
        }         
          
     }

function validar_imagen($imagen)  //Verifica que se ingreso una imagen   
{         
      $nombre_imagen = $_FILES['imagen']['name']; //Obtiene el nombre de la imagen            
      if (empty($nombre_imagen))             
      {              
        $this->form_validation->set_message('validar_imagen', 'Seleccionar una imagen');              
        return false;                           
      } else {                           
        return true;             
      }     
}

function validar_dni($dni)
{
  $dni = $this->input->post('dni');
  $this->load->model('usuario_model');
  $usuario = $this->usuario_model->buscar_persona_dni($dni);
  if (empty($usuario))             
      {              
        return true;                            
      } else {                           
        $this->form_validation->set_message('validar_dni', 'Este DNI ya fue utilizado');              
        return false;            
      }
}

public function insertar_persona()
{
        $config['upload_path'] = './uploads/img_usuarios';            
        $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';            
        $config['remove_spaces'] = TRUE;            
        $config['max_size'] = '1024';  

        $this->load->library('upload', $config);   
        if (!$this->upload->do_upload('imagen')) 
        {  
           echo "<script type=\"text/javascript\">alert('No se pudo cargar el archivo');</script>";
           $this->registracion();  
        } else {

              $data = array(
                      'nombres' => $this->input->post('nombres'),
                      'apellidos' => $this->input->post('apellidos'),
                      'dni' => $this->input->post('dni'),
                      'direccion' => $this->input->post('direccion'),
                      'email' => $this->input->post('email'),
                      'imagen' => $_FILES['imagen']['name'],
                      'rol_id' => '2'
                      );

      $usuario = $this->input->post('usuario');
      $password = $this->input->post('password');

      $this->load->model('persona_model');
                  
      $this->persona_model->guardar_persona($data); 
      
      /*recupera el ultimo id creado incremental*/
      $id = $this->db->insert_id();
      $this->persona_model->guardar_usuario($id, $usuario, $password); 
      $this->login_primera_vez($id);
      }
 }

function login_primera_vez($id)
  {
      $this->load->model('usuario_model');
      $usuario = $this->usuario_model->buscar_usuario_id($id);

       $persona_id = $usuario ->persona_id;
       $persona = $this->usuario_model->buscar_persona($persona_id);
       $datos_usuario = array(
         'Id_usuario' => $usuario->Id_usuario,
         'nombre_usuario' => $usuario->usuario,
         'email' => $persona->email,
         'direccion' => $persona->direccion,
         'dni' => $persona->dni,
         'imagen' => $persona->imagen,
         'nombres' => $persona->nombres,
         'apellidos' => $persona->apellidos,
         'rol' =>$persona->rol_id,
         'login' => TRUE
          );
                    $this->session->set_userdata($datos_usuario);
        redirect('pcgamer/productos');
    }

}