<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->model('simpanan_model');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        // Create profiler to TRUE
        // $this->output->enable_profiler(TRUE);
    }

    public function index() {

        $this->senarai_simpanan();
    }

    public function senarai_simpanan() {

        if (!$this->ion_auth->in_group('agent')) {
            return show_error('Anda bukan ajen dan tidak dibenar akses module ini.');
        }

        $this->data['page'] = 'Senarai Simpanan';

        $this->load->library('pagination');

        $config['base_url'] = base_url('index.php') . '/simpanan/senarai_simpanan/';
        $config['per_page'] = 10;
        $config['num_links'] = 3;
        $config['total_rows'] = $this->simpanan_model->count_simpanan($this->ion_auth->user()->row()->id)->num_rows();

        $this->pagination->initialize($config);

        $this->data['total_list'] = $config['total_rows'];

        $this->data['simpanan'] = $this->simpanan_model->senarai_simpanan($config['per_page'], $this->uri->segment(3), $this->ion_auth->user()->row()->id);

        $this->load->view('simpanan/senarai', $this->data);
    }

    public function view_simpanan($SimpananID, $OwnerID) {

        $this->data['page'] = 'File Simpanan';

        $this->data['file'] = $this->simpanan_model->view_simpanan($SimpananID, $OwnerID);

        $this->load->view('simpanan/file_simpanan', $this->data);
    }

    public function daftar_simpanan($ClientID) {

        $this->data['page'] = 'Borang Simpanan';
        $this->data['ownerid'] = $ClientID;

        if (!$this->ion_auth->in_group('agent')) {
            return show_error('Anda bukan ajen dan tidak dibenar akses module ini.');
        }
        $this->load->library('form_validation');
        $this->load->model('simpanan_model');

        // validate form input
        $this->form_validation->set_rules('NotaSimpanan', 'Nota Simpanan', 'required|min_length[8]');
        $this->form_validation->set_rules('JumlahBerat', 'Jumlah Berat', 'required');
        $this->form_validation->set_rules('NilaiSimpanan', 'Nilai Simpanan', 'required');
        $this->form_validation->set_rules('TarikhSimpanan', 'Tarikh Simpanan', 'required');

        if ($this->form_validation->run() == TRUE) {

            $profiles = array(
                'NotaSimpanan' => $this->input->post('NotaSimpanan'),
                'JumlahBerat' => $this->input->post('JumlahBerat'),
                'NilaiSimpanan' => $this->input->post('NilaiSimpanan'),
                'TarikhSimpanan' => $this->input->post('TarikhSimpanan'),
                'OwnerID' => $ClientID
            );

            $this->simpanan_model->store_simpanan($profiles,$ClientID);
            // $this->daftar_simpanan($ClientID);
        } else {

            $this->data['NotaSimpanan'] = array(
                'name' => 'NotaSimpanan',
                'id' => 'NotaSimpanan',
                'type' => 'text',
                'onchange' => 'this.value = this.value.toUpperCase()',
                'class' => 'form-control  text-input',
            );
            $this->data['JumlahBerat'] = array(
                'name' => 'JumlahBerat',
                'id' => 'JumlahBerat',
                'type' => 'text',
                'onchange' => 'this.value = this.value.toUpperCase()',
                'class' => 'form-control  text-input text-center',
            );
            $this->data['NilaiSimpanan'] = array(
                'name' => 'NilaiSimpanan',
                'id' => 'NilaiSimpanan',
                'type' => 'text',
                'onchange' => 'this.value = this.value.toUpperCase()',
                'class' => 'form-control  text-input text-center',
            );
            $this->data['TarikhSimpanan'] = array(
                'name' => 'TarikhSimpanan',
                'id' => 'JumlahBerat',
                'type' => 'text',
                'onchange' => 'this.value = this.value.toUpperCase()',
                'class' => 'form-control datepicker-input',
            );

            $this->load->view('simpanan/borang_simpanan', $this->data);
        }
    }
    
    public function edit($simpanan_id, $client_id) {
        
        $this->data['page'] = 'File Simpanan';

        $this->data['simpanan'] = $this->simpanan_model->view_simpanan($simpanan_id, $client_id);

        $this->load->view('simpanan/edit_simpanan', $this->data);
        
    }
    
    public function update_simpanan() {
        
        $this->load->library('form_validation');
        $this->load->model('simpanan_model');

        // validate form input
        $this->form_validation->set_rules('NotaSimpanan', 'Nota Simpanan', 'required|min_length[4]');
        $this->form_validation->set_rules('JumlahBerat', 'Jumlah Berat', 'required');
        $this->form_validation->set_rules('NilaiSimpanan', 'Nilai Simpanan', 'required');
        $this->form_validation->set_rules('TarikhSimpanan', 'Tarikh Simpanan', 'required');

        if ($this->form_validation->run() == FALSE) {
            
            $this->edit($this->input->post('simpanan_id'),$this->ion_auth->user()->row()->id);
            
        } else {

            $simpanan = array(
                'NotaSimpanan' => $this->input->post('NotaSimpanan'),
                'JumlahBerat' => $this->input->post('JumlahBerat'),
                'NilaiSimpanan' => $this->input->post('NilaiSimpanan'),
                'TarikhSimpanan' => $this->input->post('TarikhSimpanan'),
            );

            $this->simpanan_model->update_simpanan($simpanan,$this->input->post('simpanan_id'),$this->input->post('owner_id'));
            
        }
        
    }
}
