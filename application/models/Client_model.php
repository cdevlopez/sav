<?php
class Client_model extends CI_Model {
  private  $idClient;
  private  $nomClient;
  private  $numClient;
  private  $adresse;
  private  $numTel;
  private  $mail;

  public function __construct(array $data)
  {
    $this->load->database();
    $this->hydrate($data);
  }
  ///////////////// HYDRATE ///////////////////////
  public function hydrate(array $data) {

    foreach ($data as $property => $value) {
  
      $setterMethode = 'set' . ucfirst($property);
      if (method_exists($this, $setterMethode)) {

        $this->$setterMethode($value);
      }
    }
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
// On crée une méthode qui sert à récupérer un client par son ID
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
public function setClient(Client $client, $id = 0) {
    $data = array(
      'nomClient' => $this->input->post('nomClient'),
      'numClient' => $this->input->post('numClient'),
      'adresse' => $this->input->post('adresse'),
      'numTel' => $this->input->post('numTel'),
      'mail' => $this->input->post('mail'),
    );

    $client = new Client($data, $id);

    if ($id <= 0) {
      // insert
      $query = $this->db->insert('client', $client);
      return $query;
  }
      // update
      $this->db->where('idClient', $client->get_client_by_id); //// ici param
      // $query =
      return $this->db->update('client', $client);
      //return $query;
}
////////////////// NOUVELLE FONCTION //////////////////
public function deleteClient ($id = 0) {
    $query = $this->db->delete('client', array('idClient' => $id));
    return $query;
}
////////////// ________ /////////////
///////////// GETTERS  /////////////
//////////// ******** /////////////
/***
 * return idClient
 * type : integer
 */
public function getIdClient() {
  return $this->idClient;
}
/**
 * return nomClient
 * type : string
 */
public function getNomClient() {
  return $this->nomClient;
}
/**
 * return numClient
 * type : integer
 */
public function getNumClient() {
  return $this->numClient;
}
/**
 * return adresse
 * type : string
 */
public function getAdresse() {
  return $this->adresse;
}
/**
 * return numTel
 * type : string
 */
public function getNumTel() {
  return $this->numTel;
}
/**
 * return mail
 * type : string
 */
public function getMail(){
  return $this->mail;
}
////////////// ________ /////////////  
///////////// SETTERS  /////////////
//////////// ******** /////////////
/**
 * set value nomClient
 * type : string
 */
public function setNomClient(string $nomClient) {
  $this->nomClient = $nomClient;
}
/**
 * set value numClient
 * type : integer
 */
public function setNumClient(int $numClient) {
  $this->numClient = $numClient;
}
/**
 * set value adresse
 * type : string
 */
public function setAdresse(string $adresse) {
  $this->adresse = $adresse;
}
/**
 * set value numTel
 * type : string
 */
public function setNumTel(string $numTel) {
  $this->numTel = $numTel;
}
/**
 * set value mail
 * type : mail
 */
public function setMail(string $mail) {
  $this->mail = $mail;
}

}