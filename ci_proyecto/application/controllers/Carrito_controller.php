<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito_controller extends CI_Controller {


      	function __construct()
        			{
            			parent::__construct();
        			}

  public function index()
  {
    $data['title']= 'Carrito de Compras';
    $this->load->view('plantillas/header',$data);

    $datos = array('inicio' => '', 'contacto' => '', 'nosotros' => '', 'productos' => '');
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

    /*verifica si el carrito posee articulos*/
    if (!$this->cart->contents()){ 
       $data['message'] = 'El carrito de compras está vacío!'; 
      }else{ 
       $data['message'] = ''; 
      } 
    $this->load->view('paginas/carrito_view', $data);
    $this->load->view('plantillas/footer');
  }

  public function agregar_carrito() 
  {        
           $data = array( 
                  'id' => $this->input->post('id'), 
                  'name' => $this->input->post('nombre'), 
                  'price'=> $this->input->post('precio'), 
                  'qty' => $this->input->post('cantidad') 
                );   
                $this->cart->insert($data); 
   redirect('carrito_controller'); 
  }  
 
  function borrar ($id) { 
    if ($id=="all"){ 
      $this->cart->destroy(); 
    }else{ 
      $data = array( 
              'rowid'   => $id, 
              'qty'     => 0 
    ); 
      $this->cart->update($data); 
    } 
    
    redirect('carrito_controller'); 
  }  

  public function consultar_stock()
  {
    $this->load->model('producto_model');
    if ($cart = $this->cart->contents()):

          $disponibilidad = TRUE;  //inicializo en verdadero
          foreach ($cart   as   $item):           
            $carrito = array(     
                  'producto_id'  => $item['id'],     
                  'cantidad'     => $item['qty']     
                  );
            //guardo en $producto el producto que viene de la base de datos
            $producto = $this->producto_model->select_producto_id($carrito['producto_id']);

            $stock = $producto->stock;
            $cantidad = $carrito['cantidad'];
            //si hay stock no entra en el if
            if ($stock < $cantidad):
              $disponibilidad = FALSE;
            endif;
                        
            if($disponibilidad == FALSE) break;
            
          endforeach;
          if($disponibilidad == TRUE)
          {
              redirect('pedido_controller');
            } else {               
                  echo "<script languaje=\"javascript\">
                          alert('No hay stock disponible. Comuniquese con nuestro equipo para realizar un pedido. Disculpe las molestias');
                          window.location.href='index';
                        </script>";
            }            
    endif;
  }

  public function realizar_pedido()
  {  
    redirect('pedido_controller');
  }

}
