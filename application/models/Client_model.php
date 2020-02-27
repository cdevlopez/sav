<?php
class Client_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
//////////////_________________________________///////////////////
// Récupère les infos dans la BDD en fonction de l'ID ///////////
/////////////__________________________________/////////////////
  public function get_client($id = 0) {
    if ($id <= 0) {
      $query = $this->db->get('client');
      return $query->result_array();
    }
    $query = $this->db->get_where('client', array('idClient' => $id));
    return $query->row_array();
  }
////////////////// NOUVELLE FONCTION //////////////////
// On créer une méthode qui sert à récupérer un client par son ID
public function get_client_by_id($id = 0)
{
    if ($id === 0)
    {
        $query = $this->db->get('client');
        return $query->result_array();
    }
    $query = $this->db->get_where('client', array('id' => $id));
    return $query->row_array();
}
////////////////// NOUVELLE FONCTION //////////////////
public function setClient($id = 0) {
    $data = array(
      'nomClient' => $this->input->post('nomClient'),
      'numClient' => $this->input->post('numClient'),
      'adresse' => $this->input->post('adresse'),
      'numTel' => $this->input->post('numTel'),
      'mail' => $this->input->post('mail'),
    );
    if ($id <= 0) {
      // insert
      $query = $this->db->insert('client', $data);
      return $query;
  }
      // update
      $this->db->where('idClient', $id);
      $query = $this->db->update('client', $data);
      return $query;
}
////////////////// NOUVELLE FONCTION //////////////////
public function deleteClient ($id = 0) {
    $query = $this->db->delete('client', array('idClient' => $id));
    return $query;
}

}