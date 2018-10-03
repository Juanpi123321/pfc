<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pcgamer extends CI_Controller {
	
	function __construct()
		{
			parent::__construct();
		}

	public function index()
	{
		$data['title']= 'Bienvenido a Pc-Gamer';
		$this->load->view('plantillas/header',$data);

		$datos = array('inicio' => 'active', 'contacto' => '', 'nosotros' => '', 'productos' => '');
		/*selecciona el navbar que va a mostrar, el de admin o cliente*/
	  	$this->seleccionar_nav($datos);
		$this->load->view('paginas/index');
		$this->load->view('plantillas/footer');
	}

	public function productos()
    {

	    $data['title']= 'Productos';
	    $this->load->view('plantillas/header',$data);

	    $datos = array('inicio' => '', 'contacto' => '', 'nosotros' => '', 'productos' => 'active');
	    $this->seleccionar_nav($datos);

	    /*paginacion*/
	    $this->listar_productos();

	    //la vista se carga en la funcion listar_productos()
	    $this->load->view('plantillas/footer');
   
    }

	public function contacto()
	{
		$data['title']= 'Contacto';
		$this->load->view('plantillas/header',$data);

		$datos = array('inicio' => '', 'contacto' => 'active', 'nosotros' => '', 'productos' => '');
		$this->seleccionar_nav($datos);
		$this->load->view('paginas/contacto');
		$this->load->view('plantillas/footer');
	}

	public function registracion()
	{
		$data['title']= 'Registracion';
		$this->load->view('plantillas/header',$data);

		$datos = array('inicio' => '', 'contacto' => '', 'nosotros' => '', 'productos' => '');
		$this->seleccionar_nav($datos);
		$this->load->view('paginas/registracion');
		$this->load->view('plantillas/footer');
	}

	public function quienes_somos()
	{
		$data['title']= 'Quienes Somos';
		$this->load->view('plantillas/header',$data);

		$datos = array('inicio' => '', 'contacto' => '', 'nosotros' => 'active', 'productos' => '');
		$this->seleccionar_nav($datos);
		$this->load->view('paginas/quienes_somos');
		$this->load->view('plantillas/footer');
	}

	public function comercializacion()
	{
		$data['title']= 'Comercializacion';
		$this->load->view('plantillas/header',$data);

		$datos = array('inicio' => '', 'contacto' => '', 'nosotros' => 'active', 'productos' => '');
		$this->seleccionar_nav($datos);
		$this->load->view('paginas/comercializacion');
		$this->load->view('plantillas/footer');
	}

	public function terminos_y_condiciones()
	{
		$data['title']= 'Terminos y Condiciones';
		$this->load->view('plantillas/header',$data);

		$datos = array('inicio' => '', 'contacto' => '', 'nosotros' => 'active', 'productos' => '');
		$this->seleccionar_nav($datos);
		$this->load->view('paginas/terminos_y_condiciones');
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

	public function verificar_consulta()
	{
		$this->form_validation->set_rules('nombre_completo', 'Nombre de la persona', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		$this->form_validation->set_message('valid_email', 'El campo %s debe ser un mail válido');

		if ($this->form_validation->run() == FALSE) {

           $this->contacto();

        } else {
           $this->registrar_consulta();
        }
	}

	public function registrar_consulta()
	{
        $data = array(
        	  'fecha'  => date('Y-m-d'),
        	  'hora' => date('H:i:s'),
              'nombre_completo' => $this->input->post('nombre_completo'),
              'email' => $this->input->post('email'),
              'telefono' => $this->input->post('telefono'),
              'comentarios' => $this->input->post('comentarios')
              );

      $this->load->model('usuario_model');
      $this->usuario_model->registrar_consulta($data);
      echo "<script languaje=\"javascript\">                          
                          window.location.href='/ci_proyecto/pcgamer';
                          alert('Su consulta a sido recibida con exito! Nos estaremos comunicando a la brevedad.');
                        </script>"; 
      }

    function listar_productos(){
		$this->load->library('pagination');
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


		$config['base_url']=base_url().'pcgamer/productos/';

		$config['first_link']='Primero';
		$config['prev_link']='Anterior';
		$config['last_link']='Ultimo';
		$config['next_link']='Siguiente';

		$this->load->model('admin_model');

		$config['total_rows']=count($this->admin_model->select_productos());
		$config['per_page']=4;
		$config['num_links']=2;
		$config["uri_segment"]=3;

		$this->pagination->initialize($config);
		$page=$this->uri->segment(3);

		$productos['productos'] = $this->admin_model->productos_mostrar(4,$page);
		$this->load->view('paginas/productos', $productos);
	}
}