<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Menu_model extends CI_Model {
    
    public function create($formArray) {
        $this->db->insert('tb_menu', $formArray);
    }

    public function getMenu() {
        $result = $this->db->get('tb_menu')->result_array();
        return $result;
    }

    public function getSingleDish($id) {
        $this->db->where('menu_id', $id);
        $dish = $this->db->get('tb_menu')->row_array();
        return $dish;
    }

    public function update($id, $formArray) {
        $this->db->where('menu_id', $id);
        $this->db->update('tb_menu', $formArray);
    } 

    public function delete($id) {
        $this->db->where('menu_id',$id);
        $this->db->delete('tb_menu');
    }

    public function countDish() {
        $query = $this->db->get('tb_menu');
        return $query->num_rows();
    }

    public function getDishesh($id) {
        $this->db->where('resto_id', $id);
        $dish = $this->db->get('tb_menu')->result_array();
        return $dish;
    }
}
