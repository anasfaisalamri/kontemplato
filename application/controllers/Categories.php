<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
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
    $data['categories'] = $this->db->get('categories')->result_array();

    $this->form_validation->set_rules('category', 'Category', 'required|is_unique[categories.category]', [
      'is_unique' => 'Category has been taken!'
    ]);

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Categories';
      $this->load->view('dashboard/layouts/header', $data);
      $this->load->view('dashboard/layouts/sidebar', $data);
      $this->load->view('dashboard/layouts/topbar', $data);
      $this->load->view('dashboard/categories/index', $data);
      $this->load->view('dashboard/layouts/footer', $data);
    } else {
      $category = htmlspecialchars($this->input->post('category', true));
      $this->db->insert('categories', ['category' => $category]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New category added!</div>');
      redirect('categories');
    }
  }

  public function delete($id)
  {
    $this->db->delete('categories', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">One Category Deleted!</div>');
    redirect('categories');
  }

  public function edit($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['category'] = $this->db->get_where('categories', ['id' => $id])->row_array();

    $this->form_validation->set_rules('category', 'Category', 'required');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Edit ' . $data['category']['category'];
      $this->load->view('dashboard/layouts/header', $data);
      $this->load->view('dashboard/layouts/sidebar', $data);
      $this->load->view('dashboard/layouts/topbar', $data);
      $this->load->view('dashboard/categories/edit', $data);
      $this->load->view('dashboard/layouts/footer', $data);
    } else {
      $category = htmlspecialchars($this->input->post('category', true));
      $desc = htmlspecialchars($this->input->post('desc', true));
      $this->db->set('category', $category);
      $this->db->set('desc', $desc);
      $this->db->set('updated_at', date('Y-m-d H:i:s'));
      $this->db->where('id', $data['category']['id']);
      $this->db->update('categories');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Category Edited!</div>');
      redirect('categories');
    }
  }
}
