<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $writer_name = $data['user']['name'];
    $data['user_posts'] = $this->db->get_where('user_posts', ['writer_name' => $writer_name])->result_array();

    $data['title'] = 'My Profile';
    $this->load->view('dashboard/layouts/header', $data);
    $this->load->view('dashboard/layouts/sidebar', $data);
    $this->load->view('dashboard/layouts/topbar', $data);
    $this->load->view('dashboard/user/index', $data);
    $this->load->view('dashboard/layouts/footer', $data);
  }

  public function create()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['title'] = 'Add Post';

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('body', 'Body', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('dashboard/layouts/header', $data);
      $this->load->view('dashboard/layouts/sidebar', $data);
      $this->load->view('dashboard/layouts/topbar', $data);
      $this->load->view('dashboard/user/create', $data);
      $this->load->view('dashboard/layouts/footer', $data);
    } else {
      $writer = $data['user']['name'];
      $validatedData = [
        'writer_name' => $writer,
        'title' => htmlspecialchars($this->input->post('title', true)),
        'tagline' => htmlspecialchars($this->input->post('tagline', true)),
        'body' => $this->input->post('body', true),
        'approved' => 0,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ];

      $this->db->insert('user_posts', $validatedData);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your post uploaded!</div>');
      redirect('user');
    }
  }

  public function edit($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['post'] = $this->db->get_where('user_posts', ['id' => $id])->row_array();

    $data['title'] = 'Edit My Post';

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('body', 'Body', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('dashboard/layouts/header', $data);
      $this->load->view('dashboard/layouts/sidebar', $data);
      $this->load->view('dashboard/layouts/topbar', $data);
      $this->load->view('dashboard/user/edit', $data);
      $this->load->view('dashboard/layouts/footer', $data);
    } else {
      $title = htmlspecialchars($this->input->post('title', true));
      $tagline = htmlspecialchars($this->input->post('tagline', true));
      $body = $this->input->post('body', true);
      $updated_at = date('Y-m-d H:i:s');

      $this->db->set('title', $title);
      $this->db->set('tagline', $tagline);
      $this->db->set('body', $body);
      $this->db->set('updated_at', $updated_at);
      $this->db->where('id', $id);
      $this->db->update('user_posts');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your post was edited!</div>');
      redirect('user');
    }
  }

  public function show($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['post'] = $this->db->get_where('user_posts', ['id' => $id])->row_array();

    $data['title'] = 'View My Post';

    $this->load->view('dashboard/layouts/header', $data);
    $this->load->view('dashboard/layouts/sidebar', $data);
    $this->load->view('dashboard/layouts/topbar', $data);
    $this->load->view('dashboard/user/view', $data);
    $this->load->view('dashboard/layouts/footer', $data);
  }
}
