<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Singup extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }


    public function index() {
        $this->load->view('front/singup');
    }

    public function create_user() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('username', 'Username','trim|required');
        $this->form_validation->set_rules('name', 'Name','trim|required');
        $this->form_validation->set_rules('email', 'Email','trim|required');
        $this->form_validation->set_rules('password', 'Password','trim|required');
        $this->form_validation->set_rules('no_hp', 'No_hp','trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat','trim|required');

        if($this->form_validation->run() == true) {

            $formArray['username'] = $this->input->post('username');
            $formArray['nama_user'] = $this->input->post('name');
            $formArray['email'] = $this->input->post('email');
            $formArray['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $formArray['no_hp'] = $this->input->post('no_hp');
            $formArray['alamat'] = $this->input->post('alamat');
            $this->User_model->create($formArray);
            $this->session->set_flashdata("success", "Akun berhasil dibuat, silahkan login");
            redirect(base_url().'login/index');
        } else {
            $this->load->view('front/singup');
        }
    }
}