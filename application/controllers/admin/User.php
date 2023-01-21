<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if(empty($admin)) {
            $this->session->set_flashdata('msg', 'Sesi Anda telah habis');
            redirect(base_url().'admin/login/index');
        }
    }

    public function index() {
        $this->load->model('User_model');
        $users = $this->User_model->getUsers();
        $data['users'] = $users;
        $this->load->view('admin/partials/header');
        $this->load->view('admin/user/list', $data);
        $this->load->view('admin/partials/footer');
    }
    public function create_user() {

        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('username', 'Username','trim|required');
        $this->form_validation->set_rules('nama_user', 'Full Name','trim|required');
        $this->form_validation->set_rules('email', 'Email','trim|required');
        $this->form_validation->set_rules('password', 'Password','trim|required');
        $this->form_validation->set_rules('no_hp', 'Contact','trim|required');
        $this->form_validation->set_rules('alamat', 'Address','trim|required');

        if($this->form_validation->run() == true) {

            $formArray['username'] = $this->input->post('username');
            $formArray['nama_user'] = $this->input->post('nama_user');
            $formArray['email'] = $this->input->post('email');
            $formArray['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $formArray['no_hp'] = $this->input->post('no_hp');
            $formArray['alamat'] = $this->input->post('alamat');


            $this->User_model->create($formArray);

            $this->session->set_flashdata('success', 'User berhasil di tambahkan');
            redirect(base_url(). 'admin/user/index');


        } else {
            $this->load->view('admin/partials/header');
            $this->load->view('admin/user/add_user');
            $this->load->view('admin/partials/footer');
        }
        
    }

    public function edit($id) {
        $this->load->model('User_model');
        $user = $this->User_model->getUser($id);

        if(empty($user)) {
            $this->session->set_flashdata('error', 'User tidak ditemukan');
            redirect(base_url().'admin/user/index');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('username', 'Username','trim|required');
        $this->form_validation->set_rules('nama_user', 'Full Name','trim|required');
        $this->form_validation->set_rules('email', 'Email','trim|required');
        $this->form_validation->set_rules('password', 'Password','trim|required');
        $this->form_validation->set_rules('no_hp', 'Contact','trim|required');
        $this->form_validation->set_rules('alamat', 'Address','trim|required');

        if($this->form_validation->run() == true) { 

            $formArray['username'] = $this->input->post('username');
            $formArray['nama_user'] = $this->input->post('nama_user');
            $formArray['email'] = $this->input->post('email');
            $formArray['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $formArray['no_hp'] = $this->input->post('no_hp');
            $formArray['alamat'] = $this->input->post('alamat');


            $this->User_model->update($id,$formArray);

            $this->session->set_flashdata('success', 'User berhasil di update');
            redirect(base_url(). 'admin/user/index');


        } else {
            $data['user'] = $user;
            $this->load->view('admin/partials/header');
            $this->load->view('admin/user/edit', $data);
            $this->load->view('admin/partials/footer');
        }
    }

    public function delete($id) {
        $this->load->model('User_model');
        $user = $this->User_model->getUser($id);

        if(empty($user)) {
            $this->session->set_flashdata('error', 'User tidak ditemukan');
            redirect(base_url().'admin/user/index');
        }

        $this->User_model->delete($id);

        $this->session->set_flashdata('success', 'User berhasil dihapus');
        redirect(base_url().'admin/user/index');

    }

}