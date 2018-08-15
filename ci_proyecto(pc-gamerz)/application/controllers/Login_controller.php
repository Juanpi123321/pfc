<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {


		function __construct()
    			{
        			parent::__construct();
    			}

  public function index()
  {
    $data['title']= 'Bienvenido a Pc-Gamer';
    $this->load->view('plantillas/header',$data);

    $datos = array('inicio' => 'active', 'contacto' => '', 'nosotros' => '', 'productos' => '');
    /*aca no le puse el "seleccionar_nav" xq esta en el otro controlador*/
    if ($this->session->userdata('login'))
        {
          $datos['nombres'] = $this->session->userdata('nombres');
          $datos['apellidos'] = $this->session->userdata('apellidos');
          $datos['imagen'] = $this->session->userdata('imagen');
          $datos['nombre_usuario'] = $this->session->userdata('nombre_usuario');
          $this->load->view('plantillas/nav_salir',$datos); 
        } else {
                $this->load->view('plantillas/nav_ingresar',$datos);
        }

    $this->load->view('paginas/login_usuario');
    $this->load->view('plantillas/footer');
  }

 
  public function iniciar_sesion() 
  {    
    $this->form_validation->set_rules('usuario', 'Nombre', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required|callback_verificar_password');
    
  if ($this->form_validation->run() == FALSE) {
                $this->index();
        } else {
          $this->usuario_logueado();
        }
  }

  function verificar_password($password)
  {  // verifica que el usuario exista
         $usuario = $this->input->post('usuario');
         $password = $this->input->post('password');
         $contrasena = base64_encode($password);
         
         $this->load->model('usuario_model');
         $usuario = $this->usuario_model->buscar_usuario($usuario, $contrasena);
         if ($usuario) {
                 $persona_id = $usuario ->persona_id;
                 $persona = $this->usuario_model->buscar_persona($persona_id);
                 $datos_usuario = array(
                   'Id_usuario' => $usuario->Id_usuario,
                   'nombre_usuario' => $usuario->usuario,
                   'email' => $persona->email,
                   'direccion' => $persona->direccion,  //los voy a ocupar cuando verifique la compra
                   'dni' => $persona->dni,  //los voy a ocupar cuando verifique la compra
                   'imagen' => $persona->imagen,
                   'nombres' => $persona->nombres,
                   'apellidos' => $persona->apellidos,
                   'rol' =>$persona->rol_id,
                   'login' => TRUE
                );
                    $this->session->set_userdata($datos_usuario);
      return true;                            
         } else {
               $this->form_validation->set_message('verificar_password', '*Usuario o contraseña invalidos');
                return false;
         }
    }

  public function usuario_logueado() 
  {
      if ($this->session->userdata('login'))
      {
        $data = array();  //???
        $rol_usuario = $this->session->userdata('rol');
        //SE VERIFICA EL PERFIL DEL USUARIO PARA REDIRECCIONAR A LA PAGINA CORRESPONDIENTE
          switch ($rol_usuario){
          case '1':
            redirect('admin_controller');
            break;        
          case '2':
            redirect('pcgamer/productos');
            break; 
          case '3':
            redirect('pcgamer/productos');   //en este caso cliente va a ser igual que empleado
            break;                         
          default:
            redirect('index'); 
            break;
          }   
       }else{
          redirect('index');
      }
  }

  public function cerrar_sesion() 
  {          
      $this->session->sess_destroy();
    
      redirect('pcgamer');
  }

}