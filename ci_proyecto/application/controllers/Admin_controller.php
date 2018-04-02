<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {
	
	function __construct()
		{
			parent::__construct();
		}

	public function index()
	{
		$data['title']= 'Bienvenido a Pc-Gamer';
		$this->load->view('plantillas/header',$data);

		$datos = array('inicio' => 'active', 'usuarios' => '', 'productos' => '', 'ventas' => '', 'consultas' => '');
    /*verifica que sea el administrador sino lo reenvia a otra pagina*/
    $this->verificar_admin($datos);
		$this->load->view('paginas/index_admin');
		$this->load->view('plantillas/footer');
	}

  public function acceso_noautorizado()
  {
    $data['title']= 'Acceso No Autorizado';
    $this->load->view('plantillas/header',$data);
    $datos = array('inicio' => '', 'productos' => '', 'contacto' => '', 'nosotros' => '');
    /*elige el navbar de acuerdo si esta logueado o no*/
    $this->seleccionar_nav($datos);
    $this->load->view('paginas/acceso_noautorizado');
    $this->load->view('plantillas/footer');
  }

	public function usuarios()
	{
		$data['title']= 'Usuarios';
		$this->load->view('plantillas/header',$data);

		$datos = array('inicio' => '', 'usuarios' => 'active', 'productos' => '', 'ventas' => '', 'consultas' => '');
    $this->verificar_admin($datos);

    /*paginacion*/    
    $this->listar_usuarios();
		$this->load->view('plantillas/footer');
	}

	public function registracion_admin()
	{
		$data['title']= 'Registro';
		$this->load->view('plantillas/header',$data);

		$datos = array('inicio' => '', 'usuarios' => 'active', 'productos' => '', 'ventas' => '', 'consultas' => '');
    $this->verificar_admin($datos);
		$this->load->view('paginas/registracion_admin');
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


    /*para que mustre el mensaje con esa leyendo o sino va a mostrar en ingles*/
    $this->form_validation->set_message('valid_email', 'El campo %s debe ser un mail válido');
    $this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros');
    $this->form_validation->set_message('required', 'El campo %s es obligatorio');
    $this->form_validation->set_message('min_length', 'El campo %s debe contener como mínimo %d caracteres');
    $this->form_validation->set_message('matches', 'las contraseñas no coinciden');


    if ($this->form_validation->run() == FALSE) {

            $this->registracion_admin();

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
	               'rol_id' => $this->input->post('rol')
	               );

      $usuario = $this->input->post('usuario');
      $password = $this->input->post('password');

      $this->load->model('admin_model');
                  
      $this->admin_model->guardar_persona($data); 
      
      /*recupera el ultimo id creado incremental*/
      $id = $this->db->insert_id();
      $this->admin_model->guardar_usuario($id, $usuario, $password);
      } 
  }

	public function eliminar_usuario($id=NULL)  
  {            
	 	$data = array('estado'=> '0');     
            $this->load->model('admin_model');                   
            $this->admin_model->estado_usuario($data, $id);                    
            redirect('admin_controller/usuarios');    
  }

  public function imagen($id=NULL)  
  {            
    $data = array('estado'=> '0');     
            $this->load->model('admin_model');                   
            $this->admin_model->estado_usuario($data, $id);                    
            redirect('admin_controller/usuarios');    
  }  

	public function activar_usuario($id=NULL)      
	{
		$data = array('estado'=> '1');     
            $this->load->model('admin_model');                   
            $this->admin_model->estado_usuario($data, $id);                    
            redirect('admin_controller/usuarios');    
  }

  public function editar_usuario($id=NULL)      
  {             
  	$this->load->model('admin_model');             
  	$usuario = $this->admin_model->select_usuario_id($id);
    $persona = $this->admin_model->select_persona_id($id);   
  
  	foreach ($usuario as $row) 
  	{         
  		$data['Id_usuario'] = $row->Id_usuario;
      $data['usuario'] = $row->usuario;
  	}
    foreach ($persona as $row) 
    {         
      $data['email'] = $row->email;
      $data['nombres'] = $row->nombres;
      $data['apellidos'] = $row->apellidos;
      $data['dni'] = $row->dni;
      $data['direccion'] = $row->direccion;
      
      
    }      
  		$titulo['title']= 'Usuarios';
			$this->load->view('plantillas/header',$titulo);
			$datos = array('inicio' => '', 'usuarios' => 'active', 'productos' => '', 'ventas' => '', 'consultas' => '');
      $this->verificar_admin($datos);    
  		$this->load->view('paginas/usuarios_editar_admin', $data);        
  		$this->load->view('plantillas/footer');      
 	} 

  public function imagen_usuario($id=NULL)      
  {             
    $this->load->model('admin_model');  //uso el model para sacar a la persona y al usuario
    $persona = $this->admin_model->select_persona_id($id);
    $usuario = $this->admin_model->select_usuario_id($id);
    /*Saco los datos mediante el foreach y despues los paso a la vista*/
    foreach ($persona as $row) 
    {         
      $data['imagen'] = $row->imagen;
      $data['nombres'] = $row->nombres;      
    }
    foreach ($usuario as $row) 
    {         
      $data['usuario'] = $row->usuario;      
    }      

    $titulo['title']= 'Imagen de Usuario';
    $this->load->view('plantillas/header',$titulo);
    $datos = array('inicio' => '', 'usuarios' => 'active', 'productos' => '', 'ventas' => '', 'consultas' => '');
    $this->verificar_admin($datos);
    $this->load->view('paginas/usuario_imagen_admin', $data);
    $this->load->view('plantillas/footer');   
  } 

  public function actualizar($id=NULL)      
  {   // VALIDAR LOS DATOS INGRESADOS   
          $data_us = array(
              'usuario' => $this->input->post('usuario'),
              );
          $data_per = array(
              'email' => $this->input->post('email'),
              'nombres' => $this->input->post('nombres'),
              'apellidos' => $this->input->post('apellidos'),
              'dni' => $this->input->post('dni'),
              'direccion' => $this->input->post('direccion'),
              ); 
              
              $this->load->model('admin_model');
              $this->admin_model->actualizar_usuario($data_us,$data_per, $id);   
              redirect('admin_controller/usuarios');
  }



	public function productos()
	{
		$data['title']= 'Productos';
		$this->load->view('plantillas/header',$data);

		$datos = array('inicio' => '', 'usuarios' => '', 'productos' => 'active', 'ventas' => '', 'consultas' => '');
    $this->verificar_admin($datos);
    /*paginacion*/    
    $this->listar_productos();
		$this->load->view('plantillas/footer');
	}

  public function ventas_clientes()
  {
    $data['title']= 'Ventas';
    $this->load->view('plantillas/header',$data);

    $datos = array('inicio' => '', 'usuarios' => '', 'productos' => '', 'ventas' => 'active', 'consultas' => '');
    $this->verificar_admin($datos);
    /*paginacion*/    
    $this->listar_ventas_clientes();
    $this->load->view('plantillas/footer');
  }

  public function ventas_categoria()
  {
    $data['title']= 'Ventas';
    $this->load->view('plantillas/header',$data);

    $datos = array('inicio' => '', 'usuarios' => '', 'productos' => '', 'ventas' => 'active', 'consultas' => '');
    $this->verificar_admin($datos);
    /*paginacion*/    
    $this->listar_ventas_categoria();
    $this->load->view('plantillas/footer');
  }

  public function baja_producto($id=NULL)  
  {            
    $data = array('estado'=> '0');     
            $this->load->model('admin_model');                   
            $this->admin_model->estado_producto($data, $id);                    
            redirect('admin_controller/productos');    
  }

  public function alta_producto($id=NULL)      
  {
    $data = array('estado'=> '1');     
            $this->load->model('admin_model');                   
            $this->admin_model->estado_producto($data, $id);                    
            redirect('admin_controller/productos');    
  }

  public function productos_agregar_admin()
  {
    $data['title']= 'Agregar Producto';
    $this->load->view('plantillas/header',$data);

    $datos = array('inicio' => '', 'usuarios' => '', 'productos' => 'active', 'ventas' => '', 'consultas' => '');
    $this->verificar_admin($datos);
    $this->load->view('paginas/productos_agregar_admin');
    $this->load->view('plantillas/footer');
  }

  public function verificar_producto() //verifica todos los campos
  {          
    $this->form_validation->set_rules('nombre', 'Nombre del producto', 'required');
    $this->form_validation->set_rules('caracteristica', 'Caracteristica del producto', 'required');
   
    $this->form_validation->set_rules('precio', 'Precio', 'required|decimal');
    $this->form_validation->set_rules('stock', 'Stock|integer');
    $this->form_validation->set_rules('categoria', 'Categoria', 'required');

    $this->form_validation->set_rules('imagen', 'Seleccionar una imagen',  'callback_validar_imagen');


    /*para que mustre el mensaje con esa leyendo o sino va a mostrar en ingles*/
    $this->form_validation->set_message('decimal', 'El campo %s debe poseer solo numeros decimales');
    $this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros');
    $this->form_validation->set_message('required', 'El campo %s es obligatorio');


    if ($this->form_validation->run() == FALSE) {

                $this->productos_agregar_admin();

        } else {
           $this->insertar_producto();
            
        }         
          
    }

  public function insertar_producto()
  { 
        $config['upload_path'] = './uploads/img_productos';            
        $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';            
        $config['remove_spaces'] = TRUE;            
        $config['max_size'] = '1024';  

        $this->load->library('upload', $config);   
        if (!$this->upload->do_upload('imagen')) 
    {  
      echo "<script type=\"text/javascript\">alert('No se pudo cargar el archivo');</script>";
          $this->productos_agregar_admin();  
    } else {
          $data = array(
                 'nombre' => $this->input->post('nombre'),
                 'caracteristica' => $this->input->post('caracteristica'),
                 'precio ' => $this->input->post('precio'),
                 'stock' => $this->input->post('stock'),
                 'imagen' => $_FILES['imagen']['name'],
                 'categoria_id' => $this->input->post('categoria'),
                 'estado' => '1'
                 );

      $this->load->model('admin_model');
      $this->admin_model->guardar_producto($data);
      } 
  }

  public function actualizar_producto($id=NULL)      
  {   // VALIDAR LOS DATOS INGRESADOS  
            $data = array(
                'nombre' => $this->input->post('nombre'),
                'caracteristica' => $this->input->post('caracteristica'),
                'precio' => $this->input->post('precio'),
                'stock' => $this->input->post('stock'),
                'categoria_id' => $this->input->post('categoria'),
                ); 
                
                $this->load->model('admin_model');
                $this->admin_model->actualizar_producto($data, $id);   
                redirect('admin_controller/productos');
  }

  public function editar_producto($id=NULL)      
  {             
    $this->load->model('admin_model');             
    $producto = $this->admin_model->select_productos_id($id);
  
    foreach ($producto as $row) 
    {         
      $data['Id_producto'] = $row->Id_producto;
      $data['nombre'] = $row->nombre;
      $data['caracteristica'] = $row->caracteristica;
      $data['precio'] = $row->precio;
      $data['stock'] = $row->stock;
      $data['categoria_id'] = $row->categoria_id;
      $data['imagen'] = $row->imagen;

    }
      $titulo['title']= 'Productos';
      $this->load->view('plantillas/header',$titulo);
      $datos = array('inicio' => '', 'usuarios' => '', 'productos' => 'active', 'ventas' => '', 'consultas' => '');
      $this->verificar_admin($datos);     
      $this->load->view('paginas/productos_editar_admin', $data);        
      $this->load->view('plantillas/footer');      
  }

  function verificar_admin($datos)
  {
    if ($this->session->userdata('login') and ($this->session->userdata('rol')=='1'))
        {
          $datos['nombres'] = $this->session->userdata('nombres');
          $datos['apellidos'] = $this->session->userdata('apellidos');
          $datos['imagen'] = $this->session->userdata('imagen');
          $datos['nombre_usuario'] = $this->session->userdata('nombre_usuario');
          
          return $this->load->view('plantillas/nav_admin',$datos);  
        } else {
              redirect('admin_controller/acceso_noautorizado');
        }
  }

  public function consultas()
  {
    $data['title']= 'Consultas';
    $this->load->view('plantillas/header',$data);

    $datos = array('inicio' => '', 'usuarios' => '', 'productos' => '', 'ventas' => '', 'consultas' => 'active');
    $this->verificar_admin($datos);
    
    $this->load->model('admin_model');
    $data['consultas'] = $this->admin_model->select_consultas();
    $this->load->view('paginas/consultas_admin', $data);
    $this->load->view('plantillas/footer');
  }

  function seleccionar_nav($datos)
  {
    if ($this->session->userdata('login'))
        {
          $datos['nombres'] = $this->session->userdata('nombres');
          $datos['apellidos'] = $this->session->userdata('apellidos');
        $datos['imagen'] = $this->session->userdata('imagen');
        $datos['nombre_usuario'] = $this->session->userdata('nombre_usuario');
          
          return $this->load->view('plantillas/nav_salir',$datos);  
        } else {
        return $this->load->view('plantillas/nav_ingresar',$datos);
        }
  }

  function listar_ventas_clientes(){
    $this->load->library('pagination');
    $config = $this->estilo_bootstrap();
    $config['base_url']=base_url().'admin_controller/ventas_clientes';

    $this->load->model('admin_model');
    $fecha_busqueda = $this->input->post('fecha_busqueda');
    $data['facturas_completa'] = $this->admin_model->select_facturas_completa();
    $data['facturas_cabecera'] = $this->admin_model->select_facturas_fechas($fecha_busqueda);  
    $data['facturas_fechas'] = $this->admin_model->select_facturas_cabecera();
    $data['fecha_busqueda'] = $fecha_busqueda;

    $config['total_rows']=count($data['facturas_cabecera']);
    $config['per_page']=5;
    $config['num_links']=2;
    $config["uri_segment"]=3;

    $this->pagination->initialize($config);
    $page=$this->uri->segment(3);

    $data['facturas_cabecera'] = $this->admin_model->ventas_mostrar_clientes(5,$page,$fecha_busqueda);
    $this->load->view('paginas/ventas_clientes_admin', $data);
  }

  function listar_ventas_categoria(){
    $this->load->library('pagination');
    $config = $this->estilo_bootstrap();

    $config['base_url']=base_url().'admin_controller/ventas_categoria';

    $this->load->model('admin_model');

    $categoria_busqueda = $this->input->post('categoria_busqueda');
    $data['facturas_completa'] = $this->admin_model->select_facturas_completa();
    $data['facturas_cabecera'] = $this->admin_model->select_facturas_categoria($categoria_busqueda);   
    $data['facturas_fechas'] = $this->admin_model->select_facturas_cabecera();
    $data['categoria_busqueda'] = $categoria_busqueda;

    $config['total_rows']=count($data['facturas_cabecera']);
    $config['per_page']=10;
    $config['num_links']=2;
    $config["uri_segment"]=3;

    $this->pagination->initialize($config);
    $page=$this->uri->segment(3);

    $data['facturas_cabecera'] = $this->admin_model->ventas_mostrar_categoria(10,$page,$categoria_busqueda);
    $this->load->view('paginas/ventas_categoria_admin', $data);
  }

  function listar_productos(){
    $this->load->library('pagination');
    $config = $this->estilo_bootstrap();

    $config['base_url']=base_url().'admin_controller/productos';

    $this->load->model('admin_model');
    $config['total_rows']=count($this->admin_model->select_productos());
    $config['per_page']=5;
    $config['num_links']=2;
    $config["uri_segment"]=3;

    $this->pagination->initialize($config);
    $page=$this->uri->segment(3);

    $data['productos'] = $this->admin_model->productos_mostrar_admin(5,$page);
    $this->load->view('paginas/productos_admin', $data);
  }

  function listar_usuarios(){
    $this->load->library('pagination');
    $config = $this->estilo_bootstrap();

    $config['base_url']=base_url().'admin_controller/usuarios';

    $this->load->model('admin_model');
    $config['total_rows']=count($this->admin_model->select_usuarios());
    $config['per_page']=5;
    $config['num_links']=2;
    $config["uri_segment"]=3;

    $this->pagination->initialize($config);
    $page=$this->uri->segment(3);

    $data['usuarios'] = $this->admin_model->usuarios_mostrar(5,$page);
    $this->load->view('paginas/usuarios_admin', $data);
  }    

  function estilo_bootstrap()
  {
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><span>';
    $config['cur_tag_close'] = '<span></span></span></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>'; 

    $config['first_link']='Primero';
    $config['prev_link']='Anterior';
    $config['last_link']='Ultimo';
    $config['next_link']='Siguiente';
    return $config;
  }

}