<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Writers extends CI_Controller
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
    $data['writers'] = $this->db->get('writers')->result_array();

    $this->form_validation->set_rules('writer', 'Writer', 'required|is_unique[writers.writer]', [
      'is_unique' => 'Writer has been taken!'
    ]);

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Writers';
      $this->load->view('dashboard/layouts/header', $data);
      $this->load->view('dashboard/layouts/sidebar', $data);
      $this->load->view('dashboard/layouts/topbar', $data);
      $this->load->view('dashboard/writers/index', $data);
      $this->load->view('dashboard/layouts/footer', $data);
    } else {
      $writer = htmlspecialchars($this->input->post('writer', true));
      $this->db->insert('writers', ['writer' => $writer]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Writer added!</div>');
      redirect('writers');
    }
  }

  public function delete($id)
  {
    $this->db->delete('writers', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">One Writer Deleted!</div>');
    redirect('writers');
  }

  public function edit($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['writer'] = $this->db->get_where('writers', ['id' => $id])->row_array();

    $this->form_validation->set_rules('writer', 'Writer', 'required|is_unique[writers.writer]', [
      'is_unique' => 'Writer has been taken!'
    ]);

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Edit ' . $data['writer']['writer'];
      $this->load->view('dashboard/layouts/header', $data);
      $this->load->view('dashboard/layouts/sidebar', $data);
      $this->load->view('dashboard/layouts/topbar', $data);
      $this->load->view('dashboard/writers/edit', $data);
      $this->load->view('dashboard/layouts/footer', $data);
    } else {
      $writer = htmlspecialchars($this->input->post('writer', true));
      $this->db->set('writer', $writer);
      $this->db->where('id', $data['writer']['id']);
      $this->db->update('writers');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Writer Edited!</div>');
      redirect('writers');
    }
  }
}
