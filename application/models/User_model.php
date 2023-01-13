<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class User_model extends CI_Model {
    
    public function create($formArray) {
        $this->db->insert('tb_users', $formArray);
    }

    public function getByUsername($username) {
        $this->db->where('username', $username);
        $mainuser = $this->db->get('tb_users')->row_array();
        return $mainuser;
    }

    public function getUsers() {
        $result = $this->db->get('tb_users')->result_array();
        return $result;
    }

    public function getUser($id) {
        $this->db->where('user_id', $id);
        $user = $this->db->get('tb_users')->row_array();
        return $user;
    }

    public function update($id, $formArray) {
        $this->db->where('user_id',$id);
        $this->db->update('tb_users', $formArray);
    }

    public function delete($id) {
        $this->db->where('user_id',$id);
        $this->db->delete('tb_users');
    }

    public function countUser() {
        $query = $this->db->get('tb_users');
        return $query->num_rows();
    }

}
