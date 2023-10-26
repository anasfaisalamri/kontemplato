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

    $data['title'] = 'Kontemplato';
    $this->load->view('home/layouts/header', $data);
    $this->load->view('home/prakata', $data);
    $this->load->view('home/layouts/footer', $data);
  }

  public function show($slug = null)
  {
    if (empty($slug)) {
      redirect('home/notfound');
    }
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

  public function posts()
  {
    $data['categories'] = $this->kontemplato->getCategories();
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['posts'] = $this->kontemplato->getAllPosts(null, null);

    $data['title'] = 'All Posts';
    $data['desc'] = 'Seluruh tulisan dari penulis dan dari seluruh kategori';

    $keyword = $this->input->post('keyword');

    if ($this->input->post('keyword')) {
      $data['posts'] = $this->kontemplato->getAllPosts(null, null, $keyword);
    }

    $category = $this->db->get_where('categories', ['slug' => $this->input->get('category')])->row_array();
    $data['category'] = $this->input->get('category');

    if ($this->input->get('category') && $this->input->get('category') !== $category['slug']) {
      redirect('home/notfound');
      die;
    } else if ($this->input->get('category')) {
      $category = $this->db->get_where('categories', ['slug' => $this->input->get('category')])->row_array();
      $data['title'] = $category['category'];
      $data['desc'] = $category['desc'];
      $data['posts'] = $this->kontemplato->getPostByCategory($category['id']);
    }

    $this->load->view('home/layouts/header', $data);
    $this->load->view('home/posts', $data);
    $this->load->view('home/layouts/footer', $data);
  }

  public function categories()
  {
    $data['categories'] = $this->kontemplato->getCategories();
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['title'] = 'Kontemplato | Kategori';
    $this->load->view('home/layouts/header', $data);
    $this->load->view('home/categories', $data);
    $this->load->view('home/layouts/footer', $data);
  }

  public function notFound()
  {
    $data['title'] = '404 Not Found';
    $this->load->view('home/notfound');
  }
}
