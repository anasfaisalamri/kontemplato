<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Volumes extends CI_Controller
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
    $data['volumes'] = $this->db->get('volumes')->result_array();

    $this->form_validation->set_rules('volume', 'Volume', 'required|is_unique[volumes.volume]', [
      'is_unique' => 'Volume has been taken!'
    ]);

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Volumes';
      $this->load->view('dashboard/layouts/header', $data);
      $this->load->view('dashboard/layouts/sidebar', $data);
      $this->load->view('dashboard/layouts/topbar', $data);
      $this->load->view('dashboard/volumes/index', $data);
      $this->load->view('dashboard/layouts/footer', $data);
    } else {
      $volume = htmlspecialchars($this->input->post('volume', true));
      $this->db->insert('volumes', ['volume' => $volume]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Writer added!</div>');
      redirect('volumes');
    }
  }

  public function delete($id)
  {
    $this->db->delete('volumes', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">One Volume Deleted!</div>');
    redirect('volumes');
  }
}
