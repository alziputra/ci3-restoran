<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Order_model extends CI_Model {

    public function getOrders() {
        $this->db->order_by('order_id','DESC');
        $result = $this->db->get('tb_orders')->result_array();
        return $result;
    }

    public function getOrder($id) {
        $this->db->where('order_id', $id);
        $result = $this->db->get('tb_orders')->row_array();
        return $result;
    }

    public function getUserOrder($id) {
        $this->db->where('user_id', $id);
        $this->db->order_by('order_id','DESC');
        $result = $this->db->get('tb_orders')->result_array();
        return $result;
    }

    public function update($id, $status) {
        $this->db->where('order_id', $id);
        $this->db->update('tb_orders', $status);
    }

    public function deleteOrder($id) {
        $this->db->where('order_id', $id);
        $this->db->delete('tb_orders');
    }

    public function insertOrder($orderData) {
        $this->db->insert_batch('tb_orders', $orderData);
        return $this->db->insert_id();
    }

    public function countOrders() {
        $query = $this->db->get('tb_orders');
        return $query->num_rows();
    }

    public function countPendingOrders() {
        $this->db->where('status', NULL);
        $query = $this->db->get('tb_orders');
        return $query->num_rows();
    }

    public function countDeliveredOrders() {
        $this->db->where('status','terkirim');
        $query = $this->db->get('tb_orders');
        return $query->num_rows();
    }

    public function countRejectedOrders() {
        $this->db->where('status','dibatalkan');
        $query = $this->db->get('tb_orders');
        return $query->num_rows();
    }

    public function getAllOrders() {
        $this->db->order_by('order_id','DESC');
        $this->db->select('order_id, nama_menu, quantity, harga, status, date, username, alamat');
        $this->db->from('tb_orders');
        $this->db->join('tb_users', 'tb_users.user_id = tb_orders.user_id');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getOrderByUser($id) {
        $this->db->select('order_id, resto_id, menu_id, tb_users.user_id, nama_menu, quantity, harga, status, nama_user, tb_orders.date, tb_users.email, tb_users.no_hp,  success-date, username, alamat');
        $this->db->from('tb_orders');
        $this->db->join('tb_users', 'tb_users.user_id = tb_orders.user_id');
        $this->db->where('order_id', $id);
        $result = $this->db->get()->row_array();
        return $result;
    }
}