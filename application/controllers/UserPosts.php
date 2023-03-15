<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserPosts extends CI_Controller
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
    $data['user_posts'] = $this->db->get('user_posts')->result_array();

    $data['title'] = 'User Posts';
    $this->load->view('layouts/dashboard_header', $data);
    $this->load->view('layouts/dashboard_sidebar', $data);
    $this->load->view('layouts/dashboard_topbar', $data);
    $this->load->view('user-posts/index', $data);
    $this->load->view('layouts/dashboard_footer', $data);
  }

  public function update($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['post'] = $this->db->get_where('user_posts', ['id' => $id])->row_array();

    $data['title'] = 'Edit User Posts';

    $this->form_validation->set_rules('approved', 'Approved', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('layouts/dashboard_header', $data);
      $this->load->view('layouts/dashboard_sidebar', $data);
      $this->load->view('layouts/dashboard_topbar', $data);
      $this->load->view('user-posts/edit', $data);
      $this->load->view('layouts/dashboard_footer', $data);
    } else {
      $this->db->set('approved', $this->input->post('approved', true));
      $this->db->set('updated_at', date('Y-m-d H:i:s'));
      $this->db->where('id', $id);
      $this->db->update('user_posts');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User post was edited!</div>');
      redirect('userposts');
    }
  }

  public function show($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['post'] = $this->db->get_where('user_posts', ['id' => $id])->row_array();

    $data['title'] = 'View User Post : ' . $data['post']['title'];
    $this->load->view('layouts/dashboard_header', $data);
    $this->load->view('layouts/dashboard_sidebar', $data);
    $this->load->view('layouts/dashboard_topbar', $data);
    $this->load->view('user-posts/view', $data);
    $this->load->view('layouts/dashboard_footer', $data);
  }

  public function delete($id)
  {
    $this->db->delete('user_posts', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">One User Posts Deleted!</div>');
    redirect('userposts');
  }
}
