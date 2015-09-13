<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Curriculo_model extends CI_Model{
    
    public function insert($dados=NULL){
        if($dados!=NULL){
            $this->db->insert('curriculum',$dados);
            redirect('Curriculo/index');
        }
    }
    
    public function delete($dados=NULL){
        
    }
    
    public function update($dados=NULL){
        
    }
    
    public function list_all(){
        return $this->db->get('curriculum');
    }
    
    public function list_by($code=NULL){
        if($code!=NULL){
            $this->db->where('id',$code);
            
        }
    }
}