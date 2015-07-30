<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Name:  Nasagold Simpanan Model
 *
 * Version: 1.0.1
 *
 * Author:  Shahmi Mohamed
 * 		   shamie@kcs.com.my
 * 	  	   @shahmimohamed
 *
 * Added Awesomeness: Shahmi Mohamed
 *
 *
 */
class Simpanan_model extends CI_Model {

    public function count_simpanan($agentID) {

        $this->db->join('ns_client', 'ns_client.ClientID = ns_saving.OwnerID', 'left');
        $this->db->where('ns_client.AgentID', $agentID);
        $this->db->group_by('ns_saving.id');
        $this->db->order_by('ns_saving.OwnerID');
        return $this->db->get('ns_saving');
    }

    public function senarai_simpanan($limit, $start, $agentID) {

        $this->db->join('ns_client', 'ns_client.ClientID = ns_saving.OwnerID', 'left');
        $this->db->where('ns_client.AgentID', $agentID);
        $this->db->group_by('ns_saving.id');
        $this->db->order_by('ns_saving.OwnerID');
        $this->db->limit($limit, $start);
        $this->query = $this->db->get('ns_saving');

        return $this->query->result();
    }

    public function get_simpanan($ClientID) {

        $this->db->where('OwnerID', $ClientID);
        $this->query = $this->db->get('ns_saving');
        return $this->query->result();
        
    }

    public function view_simpanan($SimpananID, $OwnerID) {
        
        $this->db->select('*, ns_saving.id AS savingID');
        $this->db->where('ns_saving.id', $SimpananID);
        $this->db->where('ns_saving.OwnerID', $OwnerID);
        $this->db->join('ns_client', 'ns_client.ClientID = ns_saving.OwnerID');
        $this->db->join('ns_state', 'ns_state.StateID = ns_client.RegionID');
        $this->db->join('ns_country', 'ns_country.CountryID = ns_client.CountryID');
        $this->db->join('users', 'users.id = ns_client.AgentID');
        $this->query = $this->db->get('ns_saving');

        if ($this->query->num_rows() > 0) {
            return $this->query->row_array();
        }
    }

    public function store_simpanan($simpanan, $ClientID) {
        
        $this->db->insert('ns_saving',$simpanan);
        
        $simpananid = $this->db->insert_id();
        
        redirect('simpanan/view_simpanan/'.$simpananid.'/'.$ClientID);
    }
    
    public function update_simpanan($simpanan, $simpanan_id, $owner_id) {
        
        $this->db->where('id', $simpanan_id);
        $this->db->update('ns_saving',$simpanan);
        
        if ($this->ion_auth->is_admin()) {
            redirect('admin/simpanan/');
        } else {
            redirect('simpanan/view_simpanan/'.$simpanan_id.'/'.$owner_id);
        }
    }

}
