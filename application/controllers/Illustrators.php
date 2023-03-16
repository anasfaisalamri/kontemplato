<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Illustrators extends CI_Controller
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
    $data['illustrators'] = $this->db->get('illustrators')->result_array();

    $this->form_validation->set_rules('illustrator', 'Illustrator', 'required|is_unique[illustrators.illustrator]', [
      'is_unique' => 'Illustrator has been taken!'
    ]);

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Illustrators';
      $this->load->view('layouts/dashboard_header', $data);
      $this->load->view('layouts/dashboard_sidebar', $data);
      $this->load->view('layouts/dashboard_topbar', $data);
      $this->load->view('illustrators/index', $data);
      $this->load->view('layouts/dashboard_footer', $data);
    } else {
      $illustrator = htmlspecialchars($this->input->post('illustrator', true));
      $this->db->insert('illustrators', ['illustrator' => $illustrator]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Illustrator added!</div>');
      redirect('illustrators');
    }
  }

  public function delete($id)
  {
    $this->db->delete('Illustrators', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">One Illustrator Deleted!</div>');
    redirect('Illustrators');
  }

  public function edit($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['illustrator'] = $this->db->get_where('illustrators', ['id' => $id])->row_array();

    $this->form_validation->set_rules('illustrator', 'Illustrator', 'required|is_unique[illustrators.illustrator]', [
      'is_unique' => 'Illustrator has been taken!'
    ]);

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Edit ' . $data['illustrator']['illustrator'];
      $this->load->view('layouts/dashboard_header', $data);
      $this->load->view('layouts/dashboard_sidebar', $data);
      $this->load->view('layouts/dashboard_topbar', $data);
      $this->load->view('illustrators/edit', $data);
      $this->load->view('layouts/dashboard_footer', $data);
    } else {
      $illustrator = htmlspecialchars($this->input->post('illustrator', true));
      $this->db->set('illustrator', $illustrator);
      $this->db->where('id', $data['illustrator']['id']);
      $this->db->update('illustrators');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Illustrator Edited!</div>');
      redirect('illustrators');
    }
  }
}
