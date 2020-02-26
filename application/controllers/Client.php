<?php
class Client extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url_helper');
    $this->load->model('client_model');
  }
//////////////_________________________________////////////////////////
// Récupère les infos dans la BDD en fonction de l'ID _____///////////
/////////////__________________________________//////////////////////
public function views() {
  $data['clients'] = $this->client_model->get_client();
  $this->load->view('template/header');
  $this->load->view();
  $this->load->view('template/footer');
}



}