<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
   
    var $base_url;
    var $css;
    public function __construct()
    {
        parent::__construct();
        $this -> base_url = $this->config->item('base_url');
        $this -> css = $this->config->item('css');
        return $this -> base_url;
        return $this -> css;
        $this ->load -> helper('form');
    }
	public function index()
	{
	  $data['base'] = $this -> base_url;
        $data['css'] = $this -> css;
        $this -> load -> view('Admin_view',$data);
	}
    //Админ функция для добавления записей в бд
    public function insert()
    {
        
    }
    
}