<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Name:  Bazooka Product Model
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
class Client_model extends CI_Model {

    public function count_pelanggan($agentID) {

        $this->db->where('ns_client.AgentID', $agentID);
        $this->db->join('ns_saving', 'ns_saving.OwnerID = ns_client.ClientID', 'left');
        $this->db->group_by('ns_client.ClientID');
        return $this->db->get('ns_client');
    }

    public function senarai_pelanggan($limit, $start, $agentID) {

        $this->db->select('ns_client.*,SUM(ns_saving.JumlahBerat) as JumlahBerat, SUM(ns_saving.NilaiSimpanan) as NilaiSimpanan, ns_state.StateName, ns_country.CountryName');
        $this->db->where('ns_client.AgentID', $agentID);
        $this->db->join('ns_saving', 'ns_saving.OwnerID = ns_client.ClientID', 'left');
        $this->db->join('ns_state', 'ns_state.StateID = ns_client.RegionID');
        $this->db->join('ns_country', 'ns_country.CountryID = ns_client.CountryID');
        $this->db->group_by('ns_client.ClientID');
        $this->db->limit($limit, $start);
        $this->query = $this->db->get('ns_client');

        return $this->query->result();
    }

    function maklumat_pelanggan($ClientID, $AgentID) {

        $this->db->select('*, ns_bank.BankID as bank_id, ns_country.CountryID as country_id, ns_state.StateID as state_id');
        $this->db->where('ns_client.AgentID', $AgentID);
        $this->db->where('ns_client.ClientID', $ClientID);
        $this->db->join('ns_state', 'ns_state.StateID = ns_client.RegionID', 'left');
        $this->db->join('ns_country', 'ns_country.CountryID = ns_client.CountryID', 'left');
        $this->db->join('ns_bank', 'ns_bank.BankID = ns_client.BankID', 'left');
        $this->query = $this->db->get('ns_client');

        if ($this->query->num_rows() > 0) {
            return $this->query->row_array();
        }
    }

    function update_client($ClientID) {


        $data = array(
            'DateJoin' => $this->input->post('DateJoin'),
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

        $this->db->where('ClientID', $ClientID);
        $this->db->update('ns_client', $data);

        redirect('pelanggan/profile_pelanggan/' . $ClientID);
    }

    function store_client($data) {

        $this->db->insert('ns_client', $data);

        $ClientID = $this->db->insert_id();

        redirect('pelanggan/profile_pelanggan/' . $ClientID);
    }

    public function semak_kad_pengenalan($ClientIC) {

        $this->db->where('ClientIC', $ClientIC);
        $this->query = $this->db->get('ns_client');
        return $this->query;
    }

    /*
     * DROPDOWN FROM DATABASE
     * 
     */

    function senarai_bank() {

        $this->db->order_by('BankName');
        $this->db->where('Status', 1);
        $this->query = $this->db->get('ns_bank');

        if ($this->query->num_rows() > 0) {
            $dropdowns = $this->query->result();

            $dropDownList[''] = 'PILIH BANK';    // default selection item
            foreach ($dropdowns as $option) {
                $dropDownList[$option->BankID] = $option->BankName;
            }

            return $dropDownList;
        }
    }

    function senarai_state() {

        $this->db->order_by('StateName');
        $this->query = $this->db->get('ns_state');

        if ($this->query->num_rows() > 0) {
            $dropdowns = $this->query->result();

            $dropDownList[''] = 'PILIH NEGERI';    // default selection item
            foreach ($dropdowns as $option) {
                $dropDownList[$option->StateID] = $option->StateName;
            }

            return $dropDownList;
        }
    }

    function senarai_country() {

        $this->db->order_by('CountryName');
        $this->query = $this->db->get('ns_country');

        if ($this->query->num_rows() > 0) {
            $dropdowns = $this->query->result();

            $dropDownList[''] = 'PILIH NEGARA';    // default selection item
            foreach ($dropdowns as $option) {
                $dropDownList[$option->CountryID] = $option->CountryName;
            }

            return $dropDownList;
        }
    }

}
