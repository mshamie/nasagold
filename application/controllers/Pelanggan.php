<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }

    public function index() {

        $this->senarai_pelanggan();
    }

    public function senarai_pelanggan() {

        $this->data['page'] = 'Senarai Pelanggan';

        $this->load->model('client_model');
        $this->load->library('pagination');

        $config['base_url'] = base_url('index.php') . '/pelanggan/senarai_pelanggan/';
        $config['per_page'] = 10;
        $config['num_links'] = 3;
        $config['total_rows'] = $this->client_model->count_pelanggan($this->ion_auth->user()->row()->id)->num_rows();

        $this->pagination->initialize($config);

        $this->data['total_list'] = $config['total_rows'];

        $this->data['clients'] = $this->client_model->senarai_pelanggan($config['per_page'], $this->uri->segment(3), $this->ion_auth->user()->row()->id);

        $this->load->view('pelanggan/senarai', $this->data);
    }

    public function cari_pelanggan() { // Semak No Kad Pengenalan bagi mendapatkan butiran
        $this->data['page'] = 'Daftar Pelanggan';
        $this->data['AgentID'] = $this->ion_auth->user()->row()->id;
        $this->load->model('client_model');
        $this->load->library('form_validation');

        if (!$this->ion_auth->in_group('agent')) {
            return show_error('Anda tiada kebenaran untuk mendaftar.');
        } else {
            $this->load->view('pelanggan/cari_pelanggan', $this->data);
        }
    }

    public function daftar_pelanggan() {

        $this->data['page'] = 'Daftar Pelanggan';
        $this->data['AgentID'] = $this->ion_auth->user()->row()->id;
        $this->load->model('client_model');

        $this->data['bank'] = $this->client_model->senarai_bank();
        $this->data['state'] = $this->client_model->senarai_state();
        $this->data['country'] = $this->client_model->senarai_country();


        $this->load->library('form_validation');

        if (!$this->ion_auth->in_group('agent')) {
            return show_error('Anda tiada kebenaran untuk mendaftar.');
        } else {

            //validate form input
            $this->form_validation->set_rules('DateJoin', 'Tarikh Mendaftar', 'required');
            $this->form_validation->set_rules('FullName', 'Nama', 'required|min_length[8]');
            $this->form_validation->set_rules('ClientIC', 'No Kad Pengenalan', 'required|min_length[6]|is_unique[ns_client.ClientIC]');
            $this->form_validation->set_rules('Address', 'Alamat', 'required');
            $this->form_validation->set_rules('PostalCode', 'Poskod', 'required');
            $this->form_validation->set_rules('City', 'Bandar', 'required|min_length[4]');
            $this->form_validation->set_rules('RegionID', 'Negeri', 'required');
            $this->form_validation->set_rules('CountryID', 'Negara', 'required');
            $this->form_validation->set_rules('BankID', 'Bank', 'required');
            $this->form_validation->set_rules('AccountNo', 'No Akaun', 'required|min_length[8]');
            $this->form_validation->set_rules('ClientPhone', 'No Telefon Pelanggan', 'required');
            $this->form_validation->set_rules('ClientEmail', 'Alamat Email', 'valid_email');

            // Pewaris
            $this->form_validation->set_rules('Pewaris', 'Name Pewaris', 'min_length[8]');
            $this->form_validation->set_rules('PewarisPhone', 'No Telefon Pewaris', 'min_length[6]');
            $this->form_validation->set_rules('PewarisKP', 'Name Kad Pengenalan Pewaris', 'min_length[8]');

            if ($this->form_validation->run() == true) {


                $data = array(
                    'DateJoin' => $this->input->post('DateJoin'),
                    'AgentID' => $this->ion_auth->user()->row()->id,
                    'FullName' => $this->input->post('FullName'),
                    'Address' => $this->input->post('Address'),
                    'PostalCode' => $this->input->post('PostalCode'),
                    'City' => $this->input->post('City'),
                    'RegionID' => $this->input->post('RegionID'),
                    'CountryID' => $this->input->post('CountryID'),
                    'BankID' => $this->input->post('BankID'),
                    'AccountNo' => $this->input->post('AccountNo'),
                    'ClientIC' => $this->input->post('ClientIC'),
                    'ClientPhone' => $this->input->post('ClientPhone'),
                    'ClientEmail' => $this->input->post('ClientEmail'),
                    'Pewaris' => $this->input->post('Pewaris'),
                    'PewarisPhone' => $this->input->post('PewarisPhone'),
                    'PewarisKP' => $this->input->post('PewarisKP'),
                );
            }

            if ($this->form_validation->run() == true && $this->client_model->store_client($data)) {
                //check to see if we are creating the pelanggan
                //redirect them back to the admin page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("admin/senarai_pelanggan", 'refresh');
            } else {
                //display the create user form
                //set the flash data error message if there is one
                $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

                $this->data['FullName'] = array(
                    'name' => 'FullName',
                    'id' => 'FullName',
                    'type' => 'text',
                    'onchange' => 'this.value = this.value.toUpperCase()',
                    'value' => $this->form_validation->set_value('FullName'),
                    'class' => 'form-control  text-input',
                );
                $this->data['ClientIC'] = array(
                    'name' => 'ClientIC',
                    'id' => 'ClientIC',
                    'type' => 'text',
                    'value' => $this->form_validation->set_value('ClientIC'),
                    'class' => 'form-control  text-input',
                );
                $this->data['Address'] = array(
                    'name' => 'Address',
                    'id' => 'Address',
                    'type' => 'text',
                    'onchange' => 'this.value = this.value.toUpperCase()',
                    'value' => $this->form_validation->set_value('Address'),
                    'class' => 'form-control  text-input',
                );
                $this->data['PostalCode'] = array(
                    'name' => 'PostalCode',
                    'id' => 'PostalCode',
                    'type' => 'text',
                    'value' => $this->form_validation->set_value('PostalCode'),
                    'class' => 'form-control  text-input',
                );
                $this->data['City'] = array(
                    'name' => 'City',
                    'id' => 'City',
                    'type' => 'text',
                    'onchange' => 'this.value = this.value.toUpperCase()',
                    'value' => $this->form_validation->set_value('City'),
                    'class' => 'form-control  text-input',
                );

                $this->data['ClientPhone'] = array(
                    'name' => 'ClientPhone',
                    'id' => 'ClientPhone',
                    'type' => 'text',
                    'value' => $this->form_validation->set_value('ClientPhone'),
                    'class' => 'form-control  text-input',
                );
                $this->data['ClientEmail'] = array(
                    'name' => 'ClientEmail',
                    'id' => 'ClientEmail',
                    'type' => 'email',
                    'onchange' => 'this.value = this.value.toLowerCase()',
                    'value' => $this->form_validation->set_value('ClientEmail'),
                    'class' => 'form-control  text-input',
                );
                $this->data['DateJoin'] = array(
                    'name' => 'DateJoin',
                    'id' => 'DateJoin',
                    'type' => 'text',
                    'value' => $this->form_validation->set_value('DateJoin'),
                    'class' => 'form-control text-input',
                );
                $this->data['AccountNo'] = array(
                    'name' => 'AccountNo',
                    'id' => 'AccountNo',
                    'type' => 'text',
                    'value' => $this->form_validation->set_value('AccountNo'),
                    'class' => 'form-control  text-input',
                );

                // Pewaris jika ada
                $this->data['Pewaris'] = array(
                    'name' => 'Pewaris',
                    'id' => 'Pewaris',
                    'type' => 'text',
                    'onchange' => 'this.value = this.value.toUpperCase()',
                    'value' => $this->form_validation->set_value('Pewaris'),
                    'class' => 'form-control  text-input',
                );
                $this->data['PewarisKP'] = array(
                    'name' => 'PewarisKP',
                    'id' => 'PewarisKP',
                    'type' => 'text',
                    'onchange' => 'this.value = this.value.toUpperCase()',
                    'value' => $this->form_validation->set_value('PewarisKP'),
                    'class' => 'form-control  text-input',
                );
                $this->data['PewarisPhone'] = array(
                    'name' => 'PewarisPhone',
                    'id' => 'PewarisPhone',
                    'type' => 'text',
                    'value' => $this->form_validation->set_value('PewarisPhone'),
                    'class' => 'form-control  text-input',
                );

                $this->load->view('pelanggan/daftar_pelanggan', $this->data, 'refresh');
            }
        }
    }

    public function profile_pelanggan($ClientID) {

        $this->data['page'] = 'Profile Pelanggan';
        $this->load->model(array('client_model', 'simpanan_model'));

        $this->data['details'] = $this->client_model->maklumat_pelanggan($ClientID, $this->ion_auth->user()->row()->id);
        $this->data['simpanan'] = $this->simpanan_model->get_simpanan($ClientID);

        $this->load->view('pelanggan/profile', $this->data);
    }

    public function edit($client_id) {

        if (!$this->ion_auth->in_group('agent')) {
            return show_error('Anda tiada kebenaran untuk mendaftar.');
        }

        $this->data['page'] = 'Edit Pelanggan';
        $this->load->model(array('client_model', 'simpanan_model'));

        $this->data['bank'] = $this->client_model->senarai_bank();
        $this->data['state'] = $this->client_model->senarai_state();
        $this->data['country'] = $this->client_model->senarai_country();

        $this->data['details'] = $this->client_model->maklumat_pelanggan($client_id, $this->ion_auth->user()->row()->id);

        $this->load->view('pelanggan/edit_pelanggan', $this->data);
    }

    public function update_pelanggan() {

        $this->load->model(array('client_model', 'simpanan_model'));
        
        if (!$this->ion_auth->in_group('agent')) {
            return show_error('Anda tiada kebenaran untuk mendaftar.');
        } else {

            //validate form input
            $this->form_validation->set_rules('client_id', 'client_id', 'required');
            $this->form_validation->set_rules('DateJoin', 'Tarikh Mendaftar', 'required');
            $this->form_validation->set_rules('FullName', 'Nama', 'required|min_length[8]');
            $this->form_validation->set_rules('ClientIC', 'No Kad Pengenalan', 'required|min_length[6]');
            $this->form_validation->set_rules('Address', 'Alamat', 'required');
            $this->form_validation->set_rules('PostalCode', 'Poskod', 'required');
            $this->form_validation->set_rules('City', 'Bandar', 'required|min_length[4]');
            $this->form_validation->set_rules('RegionID', 'Negeri', 'required');
            $this->form_validation->set_rules('CountryID', 'Negara', 'required');
            $this->form_validation->set_rules('BankID', 'Bank', 'required');
            $this->form_validation->set_rules('AccountNo', 'No Akaun', 'required|min_length[8]');
            $this->form_validation->set_rules('ClientPhone', 'No Telefon Pelanggan', 'required');
            $this->form_validation->set_rules('ClientEmail', 'Alamat Email', 'valid_email');

            // Pewaris
            $this->form_validation->set_rules('Pewaris', 'Name Pewaris', 'min_length[8]');
            $this->form_validation->set_rules('PewarisPhone', 'No Telefon Pewaris', 'min_length[6]');
            $this->form_validation->set_rules('PewarisKP', 'Name Kad Pengenalan Pewaris', 'min_length[8]');

            if ($this->form_validation->run() == TRUE) {

                $this->client_model->update_client($this->input->post('client_id'));
                
            } else {
                $this->edit($client_id);
            }
        }
    }

}
