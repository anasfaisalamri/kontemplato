<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posts extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('Kontemplato_model', 'kontemplato');
    $this->load->helper('kontemplasi');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $this->session->unset_userdata('keyword');
    $data['title'] = 'Posts';

    $this->load->library('pagination');

    // ambil data keyword
    if ($this->input->post('submit')) {
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }

    $config['total_rows'] = $this->kontemplato->countPosts();
    $data['total_rows'] = $config['total_rows'];
    $config['per_page'] = 10;
    $config['enable_query_strings'] = true;

    $this->pagination->initialize($config);

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['start'] = $this->uri->segment(3);
    $data['allPosts'] = $this->kontemplato->getAllPosts($config['per_page'], $data['start'], $data['keyword']);

    $this->load->view('layouts/dashboard_header', $data);
    $this->load->view('layouts/dashboard_sidebar', $data);
    $this->load->view('layouts/dashboard_topbar', $data);
    $this->load->view('posts/index', $data);
    $this->load->view('layouts/dashboard_footer', $data);
  }

  public function show($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['post'] = $this->kontemplato->getPostById($id);

    $data['title'] = 'View Post';
    $this->load->view('layouts/dashboard_header', $data);
    $this->load->view('layouts/dashboard_sidebar', $data);
    $this->load->view('layouts/dashboard_topbar', $data);
    $this->load->view('posts/view', $data);
    $this->load->view('layouts/dashboard_footer', $data);
  }

  public function create()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['categories'] = $this->kontemplato->getCategories();
    $data['volumes'] = $this->kontemplato->getVolumes();
    $data['writers'] = $this->kontemplato->getWriters();
    $data['illustrators'] = $this->kontemplato->getIllustrators();

    $this->form_validation->set_rules('date', 'Date', 'required');
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('body', 'Body', 'required');

    if ($this->input->post('category') == 2 && empty($this->input->post('volume'))) {
      $this->form_validation->set_rules('volume', 'Volume', 'required');
    }

    if (empty($_FILES['artwork']['name'])) {
      $this->form_validation->set_rules('artwork', 'Artwork', 'required');
    }

    if ($this->input->post('highlight') == 1 && empty($this->input->post('theme'))) {
      $this->form_validation->set_rules('theme', 'Theme', 'required');
    }

    if ($this->input->post('highlight') == 1 && empty($_FILES['cover']['name'])) {
      $this->form_validation->set_rules('cover', 'Cover', 'required');
    }

    if ($this->input->post('highlight') == 1 && empty($_FILES['comic']['name'])) {
      $this->form_validation->set_rules('comic[]', 'Comic', 'required');
    }

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Create Posts';
      $this->load->view('layouts/dashboard_header', $data);
      $this->load->view('layouts/dashboard_sidebar', $data);
      $this->load->view('layouts/dashboard_topbar', $data);
      $this->load->view('posts/create', $data);
      $this->load->view('layouts/dashboard_footer');
    } else {
      $validatedData = [
        'category_id' => $this->input->post('category_id', true),
        'writer_id' => $this->input->post('writer_id', true),
        'illustrator_id' => $this->input->post('illustrator_id', true),
        'volume_id' => $this->input->post('volume_id', true),
        'is_highlight' => $this->input->post('is_highlight', true),
        'title' => htmlspecialchars($this->input->post('title', true)),
        'tagline' => htmlspecialchars($this->input->post('tagline', true)),
        'body' => $this->input->post('body', true),
        'theme' => $this->input->post('theme', true),
        'created_at' => $this->input->post('date', true) . ' ' . date('H:i:s'),
      ];

      $artwork = $_FILES['artwork']['name'];
      $cover = $_FILES['cover']['name'];
      $comic = $_FILES['comic']['name'];

      insertPost($validatedData, $artwork, $cover, $comic);

      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
      } else {
        $this->db->trans_commit();
      }

      $this->session->set_flashdata('insert', '<div class="alert alert-success mt-3" role="alert">Post inserted!</div>');
      redirect('posts');
    }
  }

  public function edit($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['post'] = $this->kontemplato->getPostById($id);

    $data['categories'] = $this->kontemplato->getCategories();
    $data['writers'] = $this->kontemplato->getWriters();
    $data['illustrators'] = $this->kontemplato->getIllustrators();


    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('body', 'Body', 'required');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Edit Post';
      $this->load->view('layouts/dashboard_header', $data);
      $this->load->view('layouts/dashboard_sidebar', $data);
      $this->load->view('layouts/dashboard_topbar', $data);
      $this->load->view('posts/edit', $data);
      $this->load->view('layouts/dashboard_footer', $data);
    } else {
      $validatedData = [
        'id' => $this->input->post('id', true),
        'category_id' => $this->input->post('category_id', true),
        'writer_id' => $this->input->post('writer_id', true),
        'illustrator_id' => $this->input->post('illustrator_id', true),
        'title' => $this->input->post('title', true),
        'tagline' => $this->input->post('tagline', true),
        'body' => $this->input->post('body', true),
      ];

      $artwork = $_FILES['artwork']['name'];
      $old_image = $this->input->post('oldImage', true);

      updatePost($validatedData);

      if ($artwork) {
        updateArtwork($validatedData['id'], $old_image);
      }

      $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert">Post updated!</div>');
      redirect('posts');
    }
  }
}
