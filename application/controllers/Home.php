<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kontemplato_model', 'kontemplato');
  }

  public function index()
  {
    $data['categories'] = $this->kontemplato->getCategories();
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['kontemplato_hl'] = $this->kontemplato->getKontemplatoHl();
    $data['essay_hl'] = $this->kontemplato->getEssayHl();
    $data['essay'] = $this->kontemplato->getAllEssay();
    $data['essayBlock'] = $this->kontemplato->getAllEssayBlock();
    $data['kontemplato'] = $this->kontemplato->getAllKontemplato();

    $data['title'] = 'Kontemplato';
    $this->load->view('home/layouts/header', $data);
    $this->load->view('home/index', $data);
    $this->load->view('home/layouts/footer', $data);
  }

  public function about()
  {
    $data['categories'] = $this->kontemplato->getCategories();
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['title'] = 'Kontemplato | About';
    $this->load->view('home/layouts/header', $data);
    $this->load->view('home/about', $data);
    $this->load->view('home/layouts/footer', $data);
  }

  public function show($slug)
  {
    $data['categories'] = $this->kontemplato->getCategories();
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['postKontemplato'] = $this->kontemplato->getKontemplatoById($slug);
    $data['postOrnamen'] = $this->kontemplato->getEssayById($slug);
    $data['comics'] = $this->kontemplato->getComicBySlug($slug);

    $data['title'] = 'Kontemplato';
    $this->load->view('home/layouts/header', $data);
    $this->load->view('home/show', $data);
    $this->load->view('home/layouts/footer', $data);
  }
}
