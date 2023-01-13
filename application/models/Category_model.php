<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Category_model extends CI_Model {
    
    public function create_cat($kategori) {
        $this->db->insert('tb_reskategori', $kategori);
    }

    public function getCategory() {
        $kategori_result = $this->db->get('tb_reskategori')->result_array();
        return $kategori_result;
    }

    public function getCat($id) {
        $this->db->where('kategori_id', $id);
        $kategori = $this->db->get('tb_reskategori')->row_array();
        return $kategori;
    }

    public function countCategory() {
        $query = $this->db->get('tb_reskategori');
        return $query->num_rows();
    }

    public function update($id, $kategori) {
        $this->db->where('kategori_id', $id);
        $this->db->update('tb_reskategori', $kategori);
    }

    public function delete($id) {
        $this->db->where('kategori_id', $id);
        $this->db->delete('tb_reskategori');
    }

}
