<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_profile extends CI_Model {

    public function get_all(){
        $data = $this->db->get('profile');
        return $data->result();
    }
    public function get_by_id($id){
        $data = $this->db->get_where('profile',"id_profile = $id");
        return $data->result();
    }
    public function add($data){
        $this->db->insert('profile',$data);
        return $this->db->affected_rows();
    }
    public function update($id,$data){
        $this->db->set($data);
        $this->db->where($id);
        $this->db->update('profile');
        return $this->db->affected_rows();
    }
    public function delete($id){
        $this->db->where($id);
        $this->db->delete('profile');
        return $this->db->affected_rows();
    }



}