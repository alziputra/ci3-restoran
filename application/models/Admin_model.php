<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Admin_model extends CI_Model {
    // fungsi tampil data admin (user)
    public function getByUsername($username) {
        $this->db->where('username', $username);
        $admin = $this->db->get('tb_admin')->row_array();
        return $admin;
    }
    
    // fungsi tampil semua pesanan
    public function getAllOrders() {
        $this->db->order_by('order_id','DESC');
        $this->db->select('order_id, nama_menu, quantity, harga, status, date, username, alamat');
        $this->db->from('tb_orders');
        $this->db->join('tb_users', 'tb_users.user_id = tb_orders.user_id');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getRestoReport() {
        $this->db->group_by('_order.resto_id');
        $this->db->select('_order.resto_id, nama_menu, harga, success-date');
        $this->db->select_sum('harga');
        $this->db->from('tb_orders as _order');
        $this->db->join('tb_restoran as _resto', '_resto.resto_id = _order.resto_id');
        $result = $this->db->get()->result();
        return $result;
    }

    public function dishReport() {
        $query = $this->db->query('SELECT menu_id, nama_menu, 
        SUM(quantity) AS qty
        FROM tb_orders
        GROUP BY menu_id
        ORDER BY SUM(quantity) DESC');
        return $query->result();
    }

    public function mostOrderedMenu() {
        $sql = 'SELECT _order.resto_id, _resto.nama_resto, _order.harga, _order.nama_menu, 
        MAX(_order.quantity) AS quantity, 
        SUM(harga) AS total
        FROM tb_orders AS _order
        INNER JOIN tb_restoran as _resto
        ON _order.resto_id = _resto.resto_id
        GROUP BY _order.resto_id';

        $query = $this->db->query($sql);
        return $query->result();
    }
}
