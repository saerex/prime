<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog_model extends CI_Model {
   
    public function get_all_catalog()
    {
       $data = array();
       $Q = $this -> db -> get('tovar');
       if ($Q -> num_rows() >0){
        foreach($Q -> result_array() as $row){
            $data[] = $row;
        }
       }
       $Q -> free_result();
       return $data;
    }
    public function get_one_catalog($id)
    {
        
        
        $this -> db -> where('id_tovara',$id);
        $this -> db -> limit(1);
        $Q = $this -> db -> get('tovar');
        if($Q -> num_rows() > 0){
            $data = $Q -> row_array();
        }
        $Q -> free_result();
        return $data;
    }
    public function get_one_categoria($id_tovara)
    {
        
        $this -> db -> select("categoria");
        $this -> db -> from ('categoria');
        $this -> db -> join('categoria_tovar',"categoria.id_categoria = categoria_tovar.id_categoria AND categoria_tovar.id_tovara='$id_tovara'");
        
        $Q = $this -> db ->get();
        if($Q -> num_rows() >0){
            $data = $Q -> row_array();
            $categoria = $data['categoria'];
        }
        $Q -> free_result();
        return $categoria;
    }
    public function get_one_firma($id_tovara)
    {
        
        $this -> db -> select("firma");
        $this -> db -> from ('firma');
        $this -> db -> join('firma_tovar',"firma.id_firma = firma_tovar.id_firma AND firma_tovar.id_tovara='$id_tovara'");
        
        $Q = $this -> db ->get();
        if($Q -> num_rows() > 0){
            $data = $Q -> row_array();
            $firma = $data['firma'];
        }
        $Q -> free_result();
        return $firma;
    }
    public function search_categoria($categoria)
    {
        $data = array();
        
        $this -> db -> select('id_categoria');
        $this -> db -> where('categoria',$categoria);
        $Q = $this -> db -> get('categoria');
        if($Q -> num_rows() >0){
            $row = $Q -> row_array();
            $id_categoria = $row['id_categoria'];
            $this -> db -> select('id_tovara');
            $this -> db -> from('categoria_tovar');
            $this -> db -> where('id_categoria',$id_categoria);
            $Q2 = $this -> db -> get();
            if($Q2 -> num_rows() > 0){
                foreach($Q2 -> result_array() as $row2){
                    $this -> db -> select('id_tovara,description,date');
                    $this -> db -> from('tovar');
                    $this -> db -> where('id_tovara',$row2['id_tovara']);
                    $Q3 = $this -> db -> get();
                    if($Q3 -> num_rows() > 0){
                       foreach($Q3 -> result_array() as $row3){
                           $data[] = $row3;
                        } 
                    }
                    $Q3 -> free_result();
                }
            }
            $Q2 -> free_result();
        }
        $Q -> free_result();
        return $data;
        
        
    }
    public function search_firma($firma)
    {
         $data = array();
        
        $this -> db -> select('id_firma');
        $this -> db -> where('firma',$firma);
        $Q = $this -> db -> get('firma');
        if($Q -> num_rows() >0){
            $row = $Q -> row_array();
            $id_firma = $row['id_firma'];
            $this -> db -> select('id_tovara');
            $this -> db -> from('firma_tovar');
            $this -> db -> where('id_firma',$id_firma);
            $Q2 = $this -> db -> get();
            if($Q2 -> num_rows() > 0){
                foreach($Q2 -> result_array() as $row2){
                    $this -> db -> select('id_tovara,description,date');
                    $this -> db -> from('tovar');
                    $this -> db -> where('id_tovara',$row2['id_tovara']);
                    $Q3 = $this -> db -> get();
                    if($Q3 -> num_rows() > 0){
                       foreach($Q3 -> result_array() as $row3){
                           $data[] = $row3;
                        } 
                    }
                    $Q3 -> free_result();
                }
            }
            $Q2 -> free_result();
        }
        $Q -> free_result();
        return $data;
        
    }
    
    
    

  

}