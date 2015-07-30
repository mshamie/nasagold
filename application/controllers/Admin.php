<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

        // Create profiler to TRUE
        // $this->output->enable_profiler(TRUE);
    }

    public function index() {

        if (!$this->ion_auth->in_group('admin')) {
            $this->profile();
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function profile() {

        if (!$this->ion_auth->logged_in()) {
            return show_error('You must be an agent to view this page.');
        }
        $this->load->model('admin_model');
        $this->data['page'] = 'Profile';

        $this->data['profile'] = $this->admin_model->agent_profile($this->ion_auth->user()->row()->id);

        $this->load->model('client_model');

        // $this->data['bank'] = $this->client_model->senarai_bank();
        $this->data['state'] = $this->client_model->senarai_state();
        $this->data['country'] = $this->client_model->senarai_country();

        $this->load->library('form_validation');

        // validate form input
        $this->form_validation->set_rules('UserName', 'Nama', 'required|min_length[8]');
        $this->form_validation->set_rules('UserAddress', 'Alamat', 'required|min_length[6]');
        $this->form_validation->set_rules('UserPostalCode', 'Poskod', 'required|min_length[5]');
        $this->form_validation->set_rules('RegionID', 'Negeri', 'required');
        $this->form_validation->set_rules('CountryID', 'Negara', 'required');
        $this->form_validation->set_rules('UserPhone', 'No Telefon', 'required');

        if ($this->form_validation->run() == TRUE) {

            $profiles = array(
                'UserAddress' => $this->input->post('UserAddress'),
                'UserPostalCode' => $this->input->post('UserPostalCode'),
                'UserCity' => $this->input->post('UserCity'),
                'UserRegionID' => $this->input->post('RegionID'),
                'UserCountryID' => $this->input->post('CountryID'),
                'UserPhone' => $this->input->post('UserPhone'),
                'UserIC' => $this->input->post('UserIC')
            );
            $users = array(
                'username' => $this->input->post('UserName'),
            );
            $this->admin_model->update_user_profiles($profiles, $users, $this->ion_auth->user()->row()->id);

            $this->session->set_flashdata('message', $this->ion_auth->messages());
            $this->profile();
        } else {

            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['UserName'] = array(
                'name' => 'UserName',
                'id' => 'UserName',
                'type' => 'text',
                'onchange' => 'this.value = this.value.toUpperCase()',
                'class' => 'form-control  text-input',
            );
            $this->data['UserAddress'] = array(
                'name' => 'UserAddress',
                'id' => 'UserAddress',
                'type' => 'text',
                'onchange' => 'this.value = this.value.toUpperCase()',
                'class' => 'form-control  text-input',
            );
            $this->data['UserPostalCode'] = array(
                'name' => 'UserPostalCode',
                'id' => 'UserPostalCode',
                'type' => 'text',
                'class' => 'form-control  text-input',
            );
            $this->data['UserCity'] = array(
                'name' => 'UserCity',
                'id' => 'UserCity',
                'type' => 'text',
                'onchange' => 'this.value = this.value.toUpperCase()',
                'class' => 'form-control  text-input',
            );
            $this->data['UserPhone'] = array(
                'name' => 'UserPhone',
                'id' => 'UserPhone',
                'type' => 'text',
                'class' => 'form-control  text-input',
            );
            $this->data['UserIC'] = array(
                'name' => 'UserIC',
                'id' => 'UserIC',
                'type' => 'text',
                'class' => 'form-control  text-input',
            );

            $this->load->view('agent/profile', $this->data);
        }
    }

    public function search() {

        $this->data['page'] = 'Carian';
        $this->load->model('admin_model');
        $this->data['search'] = $this->admin_model->search();

        $this->load->view('admin/search_result', $this->data);
    }

    public function avatar() {

        $this->data['page'] = 'Kemaskini imej profile';
        $this->data['old_avatar'] = $this->ion_auth->user()->row()->UserAvatar;

        $this->load->view('agent/avatar', $this->data);
    }

    public function upload_image() {

        $this->load->model('admin_model');

        $config['upload_path'] = 'images/avatar';
        $config['allowed_types'] = 'gif|jpg|jpeg|JPG|png';
        $config['max_size'] = '3000';
        $config['max_width'] = '2900';
        $config['max_height'] = '2900';
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            $this->data['error'] = $this->upload->display_errors();
            $this->avatar();
        } else {

            $data = $this->upload->data();
            $imageUploaded = $data['raw_name'] . $data['file_ext'];
            $this->_resizePicture($imageUploaded);

            $new_image = array(
                'UserAvatar' => $data['raw_name'] . $data['file_ext'],
            );

            $this->admin_model->store_image($new_image, $this->ion_auth->user()->row()->id);

            //$data = array('upload_data' => $this->upload->data());

            redirect('admin/profile/', 'refresh');
        }
    }

    function _resizePicture($imageUploaded) {

        $config['image_library'] = "gd2";
        $config['source_image'] = "images/avatar/" . $imageUploaded;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = "250";
        $config['height'] = "250";
        $config['master_dim'] = 'auto';

        $this->load->library('image_lib', $config);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
    }

    public function pelanggan() {

        $this->data['page'] = 'Senarai Pelanggan';
        $this->load->model('admin_model');
        
        $this->data['pelanggan'] = $this->admin_model->senarai_pelanggan();
        
        $this->load->view('admin/pelanggan', $this->data);
    }
    
    public function simpanan() {

        $this->data['page'] = 'Senarai Pelanggan';
        $this->load->model('admin_model');
        
        $this->data['simpanan'] = $this->admin_model->senarai_simpanan();
        
        $this->load->view('admin/simpanan', $this->data);
    }

}
