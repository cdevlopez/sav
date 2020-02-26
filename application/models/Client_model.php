<?php
class Client_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
//////////////_________________________________////////////////////////
// Récupère les infos dans la BDD en fonction de l'ID _____///////////
/////////////__________________________________//////////////////////
  public function get_client(int $id = 0) {
    if ($id <= 0) {
      $query = $this->db->get('client');
      return $query->result_array();
    }
    $query = $this->db->get_where('client', array('idClient' => $id));
    return $query->row_array();
  }




  
}