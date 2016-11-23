<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    
    public function verifyUser($name, $pass)
    {
        $this -> db -> select('id_admin, username');
        $this -> db -> where ('username',$name);
        $this -> db -> where ('password',$pass);
        $this -> db -> where ('status','active');
        $this -> db -> limit(1);
        $Q = $this -> db -> get('admins');
        if($Q -> num_rows() >0){
            $row = $Q -> row_array();
            $_SESSION['user_id']  = $row['id_admin'];
            $_SESSION['username'] = $row['username'];
        }
        else {
            $this -> session -> set_flashdata('error','Sorry, your username or password is incorrect');
        }
    }
}