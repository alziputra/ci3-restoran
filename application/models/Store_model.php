<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Store_model extends CI_Model {
    
    public function create($formArray) {
        $this->db->insert('tb_restoran', $formArray);
    }

    public function getStores() {
        $result = $this->db->get('tb_restoran')->result_array();
        return $result;
    }

    public function getStore($id) {
        $this->db->where('resto_id', $id);
        $store = $this->db->get('tb_restoran')->row_array();
        return $store;
    }

    public function update($id, $formArray) {
        $this->db->where('resto_id', $id);
        $this->db->update('tb_restoran', $formArray);
    } 

    public function delete($id) {
        $this->db->where('resto_id',$id);
        $this->db->delete('tb_restoran');
    }

    public function countStore() {
        $query = $this->db->get('tb_restoran');
        return $query->num_rows();
    }

    public function getRestoInfo() {
        $this->db->select('*');
        $this->db->from('tb_restoran');
        $this->db->join('tb_reskategori','tb_restoran.kategori_id = tb_reskategori.kategori_id');
        $result = $this->db->get()->result_array();
        return $result;
    }

}
