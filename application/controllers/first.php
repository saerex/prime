<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class First extends CI_Controller {
   
    var $base_url;
    var $css;
    public function __construct()
    {
        parent::__construct();
        $this -> base_url = $this->config->item('base_url');
        $this -> css = $this->config->item('css');
        return $this -> base_url;
        return $this -> css;
    }
	public function index()
	{
	  $data['base'] = $this -> base_url;
      $data['css'] = $this -> css;
		$this -> load -> view('index_view',$data);
	}
    public function catalog_all()
    {   
        
        $data['telefons'] = $this -> catalog_model -> get_all_catalog();
        $data['base'] = $this -> base_url;
        $data['css'] = $this -> css;
        $this -> load -> view('catalog_all_view', $data);
    }
    public function admin()
    {   
        $data['base'] = $this -> base_url;
        $data['css'] = $this -> css;
        $this -> load -> view('Admin_view',$data);
    }
    public function catalog_one($id)
    {   
        $data['categoria'] = $this -> catalog_model -> get_one_categoria($id);
        $data['firma'] = $this -> catalog_model -> get_one_firma($id);
        $data['telefons']  = $this -> catalog_model -> get_one_catalog($id);
        $data['base'] = $this -> base_url;
        $data['css'] = $this -> css;
        $this -> load -> view('catalog_one_view', $data);
    }
    public function search_categoria($categoria)
    {
        $data['telefons'] = $this -> catalog_model -> search_categoria($categoria);
        $data['base'] = $this -> base_url;
        $data['css'] = $this -> css;
        $this -> load -> view('catalog_all_view', $data);
    }
    public function search_firma($firma)
    {
        $data['telefons'] = $this -> catalog_model -> search_firma($firma);
        $data['base'] = $this -> base_url;
        $data['css'] = $this -> css;
        $this -> load -> view('catalog_all_view', $data);
    }
    //функция проверки доступа к админ панели
    public function verify()
    {
        
    }
}