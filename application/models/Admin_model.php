<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Name:  Bazooka Admin Model
 *
 * Version: 1.0.1
 *
 * Author:  Shahmi Mohamed
 * 		   shamie@kcs.com.my
 * 	  	   @shahmimohamed
 *
 * Added Awesomeness: Shahmi MOhamed
 *
 *
 */
class Admin_model extends CI_Model {

    public function agent_profile($UserID) {

        $this->db->where('users.id', $UserID);
        $this->db->join('user_profiles', 'user_profiles.UserID = users.id');
        $this->db->join('ns_state', 'ns_state.StateID = user_profiles.UserRegionID', 'left');
        $this->db->join('ns_country', 'ns_country.CountryID = user_profiles.UserCountryID', 'left');
        $this->query = $this->db->get('users');

        if ($this->query->num_rows() > 0) {
            return $this->query->row_array();
        }
    }

    public function update_user_profiles($profiles, $users, $userID) {

        $this->db->where('UserID', $userID);
        $this->db->update('user_profiles', $profiles);

        $this->update_users($users, $userID);

        redirect('admin/profile', 'refresh');
    }

    public function update_users($users, $userID) {

        $this->db->where('id', $userID);
        $this->db->update('users', $users);
    }

    public function store_image($new_image, $id) {
        $this->db->where('id', $id);
        $this->db->update('users', $new_image);
    }

    public function search() {

        $search = $this->input->post('search');

        if (NULL !== $search) {

            $this->db->or_like('ClientIC', $search);
            $this->db->or_like('FullName', $search);
            $this->db->join('ns_state', 'ns_state.StateID = ns_client.RegionID');
            $this->db->join('ns_country', 'ns_country.CountryID = ns_client.CountryID');
            $this->query = $this->db->get('ns_client');

            return $this->query->result();
        }
    }

    public function senarai_pelanggan() {

        $this->db->select('*, SUM(ns_saving.NilaiSimpanan) as simpanan , SUM(ns_saving.JumlahBerat) as berat');
        $this->db->where('ns_client.ClientStatus', 1);
        $this->db->join('users', 'users.id = ns_client.AgentID');
        $this->db->join('ns_saving', 'ns_saving.OwnerID = ns_client.ClientID', 'left');
        $this->db->where('ns_saving.StatusSimpanan', 1);
        $this->db->join('ns_bank', 'ns_bank.BankID = ns_client.BankID', 'left');
        $this->db->group_by('ns_client.ClientID');
        $this->query = $this->db->get('ns_client');

        return $this->query->result();
    }
    
    public function senarai_simpanan() {

        $this->db->select('*, ns_saving.id as simpanan_id');
        $this->db->join('ns_client','ns_client.ClientID = ns_saving.OwnerID');
        $this->db->join('users', 'users.id = ns_client.AgentID');
        $this->db->where('ns_saving.StatusSimpanan', 1);
        $this->query = $this->db->get('ns_saving');

        return $this->query->result();
    }

}
