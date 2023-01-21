<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Menu extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if(empty($admin)) {
            $this->session->set_flashdata('msg', 'Sesi Anda telah habis');
            redirect(base_url().'admin/login/index');
        }
        $this->load->helper('url');
    }

    public function index() {
        $this->load->model('Menu_model');
        $hidangan = $this->Menu_model->getMenu();
        $data['dishesh'] = $hidangan;
        $this->load->view('admin/partials/header');
        $this->load->view('admin/menu/list', $data);
        $this->load->view('admin/partials/footer');
    }

    public function create_menu(){

        $this->load->helper('common_helper');
        $this->load->model('Store_model');
        $store = $this->Store_model->getStores();

        $config['upload_path']          = './public/uploads/dishesh/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        $this->load->model('Menu_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('nama_menu', 'Nama menu','trim|required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi','trim|required');
        $this->form_validation->set_rules('harga', 'Harga','trim|required');
        $this->form_validation->set_rules('namarestoran', 'Nama restoran','trim|required');


        if($this->form_validation->run() == true) {

            if(!empty($_FILES['image']['name'])){
                // foto dipilih
                if($this->upload->do_upload('image')) {
                    // foto berhasil di upload
                    $data = $this->upload->data();
                    // mengubah ukuran foto
                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,270);

                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'front_thumb/'.$data['file_name'], 1120,270);


                    $formArray['img'] = $data['file_name'];
                    $formArray['nama_menu'] = $this->input->post('nama_menu');
                    $formArray['deskripsi'] = $this->input->post('deskripsi');
                    $formArray['harga'] = $this->input->post('harga');
                    $formArray['resto_id'] = $this->input->post('namarestoran');
        
                    $this->Menu_model->create($formArray);
        
                    $this->session->set_flashdata('dish_success', 'Menu added successfully');
                    redirect(base_url(). 'admin/menu/index');

                } else {
                    // jika mendapat beberapa kesalahan
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error; 
                    $data['stores']= $store;
                    $this->load->view('admin/partials/header');
                    $this->load->view('admin/menu/add_menu', $data);
                    $this->load->view('admin/partials/footer');
                }

                
            } else {
                // jika tidak ada foto yang dipilih, maka akan menambahkan data tanpa foto
                $formArray['nama_menu'] = $this->input->post('nama_menu');
                $formArray['deskripsi'] = $this->input->post('deskripsi');
                $formArray['harga'] = $this->input->post('harga');
                $formArray['resto_id'] = $this->input->post('namarestoran');
    
                $this->Menu_model->create($formArray);
                
                $this->session->set_flashdata('dish_success', 'Dish added successfully');
                redirect(base_url(). 'admin/menu/index');
            }

        } else {
            $store_data['stores']= $store;
            $this->load->view('admin/partials/header');
            $this->load->view('admin/menu/add_menu', $store_data);
            $this->load->view('admin/partials/footer');
        }
        
    }

    public function edit($id) {
        $this->load->model('Menu_model');
        $dish = $this->Menu_model->getSingleDish($id);

        $this->load->model('Store_model');
        $store = $this->Store_model->getStores();
        
        if(empty($dish)) {

            $this->session->set_flashdata('error', 'menu tidak ditemukan');
            redirect(base_url(). 'admin/menu/index');
        }

        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/dishesh/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('nama_menu', 'Nama menu','trim|required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi','trim|required');
        $this->form_validation->set_rules('harga', 'harga','trim|required');
        $this->form_validation->set_rules('namarestoran', 'Nama restoran','trim|required');

        if($this->form_validation->run() == true) {

            if(!empty($_FILES['image']['name'])){
                // foto dipilih
                if($this->upload->do_upload('image')) {
                    // foto berhasil di upload
                    $data = $this->upload->data();
                    // mengubah ukuran foto
                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,270);

                    $formArray['img'] = $data['file_name'];
                    $formArray['nama_menu'] = $this->input->post('nama_menu');
                    $formArray['deskripsi'] = $this->input->post('deskripsi');
                    $formArray['harga'] = $this->input->post('harga');
                    $formArray['resto_id'] = $this->input->post('namarestoran');
        
                    $this->Menu_model->update($id, $formArray);

                    // menghapus foto yang ada

                    if (file_exists('./public/uploads/dishesh/'.$dish['img'])) {
                        unlink('./public/uploads/dishesh/'.$dish['img']);
                    }

                    if(file_exists('./public/uploads/dishesh/thumb/'.$dish['img'])) {
                        unlink('./public/uploads/dishesh/thumb/'.$dish['img']);
                    }
        
                    $this->session->set_flashdata('dish_success', 'menu berhasil diupdate');
                    redirect(base_url(). 'admin/menu/index');

                } else {
                    // jika mendapat beberapa kesalahan
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error;
                    $data['dish'] = $dish;
                    $data['stores'] = $store;
                    $this->load->view('admin/partials/header');
                    $this->load->view('admin/menu/edit', $data);
                    $this->load->view('admin/partials/footer');
                }

                
            } else {
                // jika tidak ada foto yang dipilih, maka akan menambahkan data tanpa foto
                $formArray['nama_menu'] = $this->input->post('nama_menu');
                $formArray['deskripsi'] = $this->input->post('deskripsi');
                $formArray['harga'] = $this->input->post('harga');
                $formArray['resto_id'] = $this->input->post('namarestoran');
    
                $this->Menu_model->update($id, $formArray);
    
                $this->session->set_flashdata('dish_success', 'menu berhasil diupdate');
                redirect(base_url(). 'admin/menu/index');
            }

        } else {
            $data['dish'] = $dish;
            $data['stores'] = $store;
            $this->load->view('admin/partials/header');
            $this->load->view('admin/menu/edit', $data);
            $this->load->view('admin/partials/footer');

        }

    }
    public function delete($id){

        $this->load->model('Menu_model');
        $dish = $this->Menu_model->getSingleDish($id);

        if(empty($dish)) {
            $this->session->set_flashdata('error', 'menu tidak ditemukan');
            redirect(base_url().'admin/menu');
        }

        if (file_exists('./public/uploads/dishesh/'.$dish['img'])) {
            unlink('./public/uploads/dishesh/'.$dish['img']);
        }

        if(file_exists('./public/uploads/dishesh/thumb/'.$dish['img'])) {
            unlink('./public/uploads/dishesh/thumb/'.$dish['img']);
        }

        $this->Menu_model->delete($id);

        $this->session->set_flashdata('dish_success', 'menu berhasil dihapus');
        redirect(base_url().'admin/menu/index');

    }
}