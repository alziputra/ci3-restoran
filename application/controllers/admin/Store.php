<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Store extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if(empty($admin)) {
            $this->session->set_flashdata('msg', 'Sesi Anda telah habis');
            redirect(base_url().'admin/login/index');
        }
    }

    public function index() {
        $this->load->model('Store_model');
        $stores = $this->Store_model->getStores();
        $store_data['stores'] = $stores;
        $this->load->view('admin/partials/header');
        $this->load->view('admin/store/list', $store_data);
        $this->load->view('admin/partials/footer');
    }

    public function create_restaurant() {

        $this->load->model('Category_model');
        $cat = $this->Category_model->getCategory();

        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/restaurant/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        

        $this->load->model('Store_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('nama_resto', 'Nama restoran','trim|required');
        $this->form_validation->set_rules('email', 'Email','trim|required');
        $this->form_validation->set_rules('phone', 'Kontak','trim|required');
        $this->form_validation->set_rules('url', 'URL','trim|required');
        $this->form_validation->set_rules('open_hr', 'jam buka','trim|required');
        $this->form_validation->set_rules('close_hr', 'jam tutup','trim|required');
        $this->form_validation->set_rules('open_days', 'hari buka','trim|required');
        $this->form_validation->set_rules('kategori_nama', 'kategori','trim|required');
        $this->form_validation->set_rules('alamat', 'alamat','trim|required');

        if($this->form_validation->run() == true) {


            if(!empty($_FILES['image']['name'])){
                // foto dipilih
                if($this->upload->do_upload('image')) {
                    // foto berhasil di upload

                    
                    $data = $this->upload->data();


                    // mengubah ukuran foto untuk admin
                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,270);
                    

                    $formArray['img'] = $data['file_name'];
                    $formArray['nama_resto'] = $this->input->post('nama_resto');
                    $formArray['email'] = $this->input->post('email');
                    $formArray['phone'] = $this->input->post('phone');
                    $formArray['url'] = $this->input->post('url');
                    $formArray['open_hr'] = $this->input->post('open_hr');
                    $formArray['close_hr'] = $this->input->post('close_hr');
                    $formArray['open_days'] = $this->input->post('open_days');
                    $formArray['kategori_id'] = $this->input->post('kategori_nama');
                    $formArray['alamat'] = $this->input->post('alamat');
        
                    $this->Store_model->create($formArray);
        
                    $this->session->set_flashdata('res_success', 'Restoran berhasil ditambahkan');
                    redirect(base_url(). 'admin/store/index');

                } else {
                    // jika mendapat beberapa kesalahan
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error;
                    $data['cats'] = $cat;
                    $this->load->view('admin/partials/header');
                    $this->load->view('admin/store/add_res', $data);
                    $this->load->view('admin/partials/footer');
                }

                
            } else {
                // jika tidak ada foto yang dipilih, maka akan menambahkan data tanpa foto
                $formArray['nama_resto'] = $this->input->post('nama_resto');
                $formArray['email'] = $this->input->post('email');
                $formArray['phone'] = $this->input->post('phone');
                $formArray['url'] = $this->input->post('url');
                $formArray['open_hr'] = $this->input->post('open_hr');
                $formArray['close_hr'] = $this->input->post('close_hr');
                $formArray['open_days'] = $this->input->post('open_days');
                $formArray['kategori_id'] = $this->input->post('kategori_nama');
                $formArray['alamat'] = $this->input->post('alamat');
    
                $this->Store_model->create($formArray);
    
                $this->session->set_flashdata('res_success', 'Restoran berhasil ditambahkan');
                redirect(base_url(). 'admin/store/index');
            }

        } else {
            $data['cats'] = $cat;
            $this->load->view('admin/partials/header');
            $this->load->view('admin/store/add_res', $data);
            $this->load->view('admin/partials/footer');
        }
        
    }

    public function edit($id) {
        $this->load->model('Store_model');
        $store = $this->Store_model->getStore($id);

        $this->load->model('Category_model');
        $cat = $this->Category_model->getCategory();

        if(empty($store)) {
            $this->session->set_flashdata('error', 'Restoran tidak ditemukan');
            redirect(base_url().'admin/store/index');
        }

        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/restaurant/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['encrypt_name']         = true;

        $this->load->library('upload', $config);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('nama_resto', 'Nama restoran','trim|required');
        $this->form_validation->set_rules('email', 'Email','trim|required');
        $this->form_validation->set_rules('phone', 'Kontak','trim|required');
        $this->form_validation->set_rules('url', 'URL','trim|required');
        $this->form_validation->set_rules('open_hr', 'jam buka','trim|required');
        $this->form_validation->set_rules('close_hr', 'jam tutup','trim|required');
        $this->form_validation->set_rules('open_days', 'hari buka','trim|required');
        $this->form_validation->set_rules('kategori_nama', 'kategori','trim|required');
        $this->form_validation->set_rules('alamat', 'alamat','trim|required');

        if($this->form_validation->run() == true) {

            if(!empty($_FILES['image']['name'])){
                // foto dipilih
                if($this->upload->do_upload('image')) {
                    // foto berhasil di upload

                    
                    $data = $this->upload->data();


                    // mengubah ukuran foto
                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,270);


                    $formArray['img'] = $data['file_name'];
                    $formArray['nama_resto'] = $this->input->post('nama_resto');
                    $formArray['email'] = $this->input->post('email');
                    $formArray['phone'] = $this->input->post('phone');
                    $formArray['url'] = $this->input->post('url');
                    $formArray['open_hr'] = $this->input->post('open_hr');
                    $formArray['close_hr'] = $this->input->post('close_hr');
                    $formArray['open_days'] = $this->input->post('open_days');
                    $formArray['kategori_id'] = $this->input->post('kategori_nama');
                    $formArray['alamat'] = $this->input->post('alamat');
        
                    $this->Store_model->update($id, $formArray);
        
                    // menghapus foto yang ada

                    if (file_exists('./public/uploads/restaurant/'.$store['img'])) {
                        unlink('./public/uploads/restaurant/'.$store['img']);
                    }

                    if(file_exists('./public/uploads/restaurant/thumb/'.$store['img'])) {
                        unlink('./public/uploads/restaurant/thumb/'.$store['img']);
                    }

                    $this->session->set_flashdata('res_success', 'Restoran berhasil diupdate');
                    redirect(base_url(). 'admin/store/index');

                } else {
                    // jika mendapat beberapa kesalahan
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error;
                    $data['store'] = $store;
                    $data['cats'] = $cat;
                    $this->load->view('admin/partials/header');
                    $this->load->view('admin/store/edit', $data);
                    $this->load->view('admin/partials/footer');
                }

                
            } else {

                // jika tidak ada foto yang dipilih, maka akan menambahkan data tanpa foto
                $formArray['nama_resto'] = $this->input->post('nama_resto');
                $formArray['email'] = $this->input->post('email');
                $formArray['phone'] = $this->input->post('phone');
                $formArray['url'] = $this->input->post('url');
                $formArray['open_hr'] = $this->input->post('open_hr');
                $formArray['close_hr'] = $this->input->post('close_hr');
                $formArray['open_days'] = $this->input->post('open_days');
                $formArray['kategori_id'] = $this->input->post('kategori_nama');
                $formArray['alamat'] = $this->input->post('alamat');
    
                $this->Store_model->update($id ,$formArray);
    
                $this->session->set_flashdata('res_success', 'Restoran berhasil diupdate');
                redirect(base_url(). 'admin/store/index');
            }


        } else {
            $data['store'] = $store;
            $data['cats'] = $cat;
            $this->load->view('admin/partials/header');
            $this->load->view('admin/store/edit', $data);
            $this->load->view('admin/partials/footer');
        }

    }

    public function delete($id){

        $this->load->model('Store_model');
        $store = $this->Store_model->getStore($id);

        if(empty($store)) {
            $this->session->set_flashdata('error', 'restoran tidak ditemukan');
            redirect(base_url().'admin/store');
        }

        if (file_exists('./public/uploads/restaurant/'.$store['img'])) {
            unlink('./public/uploads/restaurant/'.$store['img']);
        }

        if(file_exists('./public/uploads/restaurant/thumb/'.$store['img'])) {
            unlink('./public/uploads/restaurant/thumb/'.$store['img']);
        }

        $this->Store_model->delete($id);

        $this->session->set_flashdata('res_success', 'restoran berhasil dihapus');
        redirect(base_url().'admin/store/index');

    }
}