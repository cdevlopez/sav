<?php
class Client extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url_helper');
    $this->load->model('client_model');
  }
//////////////_________________________________///////////////////
// Récupère les infos dans la BDD en fonction de l'ID ///////////
/////////////__________________________________/////////////////
public function views() {
  $data['clients'] = $this->client_model->get_client();
  $data['title'] = 'liste des clients';

  $this->load->view('template/header', $data);
  $this->load->view('client/clientView', $data);
  $this->load->view('template/footer');
}


}