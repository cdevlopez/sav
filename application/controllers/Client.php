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
public function views() 
{
    $data['clients'] = $this->client_model->get_client();
    $data['title'] = 'liste des clients';

    $this->load->view('template/header', $data);
    $this->load->view('client/clientView', $data);
    $this->load->view('template/footer');
}
////////////////// NOUVELLE FONCTION //////////////////
public function client($id) 
{
    $data['client'] = $this->client_model->get_client($id);
    $data['title'] = $data['client']['nomClient'];
    $this->load->view('template/header', $data);
    $this->load->view('client/oneClient', $data);
    $this->load->view('template/footer');
}
////////////////// NOUVELLE FONCTION //////////////////
public function create() 
{
    // création du formaulaire
    $this->load->helper('form');
    // checkez les erreurs faites dans le formulaire
    $this->load->library('form_validation');
    // mise en place des règles de champs
    $this->form_validation->set_rules('nomClient', 'NomClient', 'required');
    $this->form_validation->set_rules('numClient', 'NumClient', 'required');
    $this->form_validation->set_rules('adresse', 'adresse', 'required');
    $this->form_validation->set_rules('numTel', 'numTel', 'required');
    $this->form_validation->set_rules('mail', 'mail', 'required');

    // condition qui servira à savoir si notre formulaire a été bien envoyé 
  $data['title'] = "formulaire clients";
  if ($this->form_validation->run() === FALSE)
 
  {
    $this->load->view('template/header', $data);
    $this->load->view('client/create');          
    $this->load->view('template/footer');
  }else {
  $this->client_model->setClient();
  $this->load->view('client/success');
  }
}
public function update($id) 
{
      $this->load->helper('form');
      $this->load->library('form_validation');

      $data ['title'] = 'Créer un nouveau client';

      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('text', 'Text', 'required');
      if ($this->form_validation->run() === FALSE) 
  {

      $this->load->view('template/header', $data);
      $this->load->view('client/update', $data);
      $this->load->view('template/footer');
  } else {
      $this->news_model->udpdate($id);
      $this->load->view('client/success');
  }
}
}