<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Menu Management';

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required|is_unique[user_menu.menu]', [
      'is_unique' => 'The Menu has been taken!'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('dashboard/layouts/header', $data);
      $this->load->view('dashboard/layouts/sidebar', $data);
      $this->load->view('dashboard/layouts/topbar', $data);
      $this->load->view('dashboard/menu/index', $data);
      $this->load->view('dashboard/layouts/footer', $data);
    } else {
      $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
      redirect('menu');
    }
  }

  public function menuDelete($id)
  {
    $this->db->delete('user_menu', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">One Menu Deleted!</div>');
    redirect('menu');
  }

  public function menuEdit($id)
  {
    $menu = $this->db->get_where('user_menu', ['id' => $id])->row_array();
    $data['title'] = 'Edit Menu ' . $menu['menu'];

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required|is_unique[user_menu.menu]', [
      'is_unique' => 'The Menu has been taken!'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('dashboard/layouts/header', $data);
      $this->load->view('dashboard/layouts/sidebar', $data);
      $this->load->view('dashboard/layouts/topbar', $data);
      $this->load->view('dashboard/menu/menu-edit', $data);
      $this->load->view('dashboard/layouts/footer', $data);
    } else {
      $menu = $this->input->post('menu');

      $this->db->set('menu', $menu);
      $this->db->where('id', $data['menu']['id']);
      $this->db->update('user_menu');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Edited!</div>');
      redirect('menu');
    }
  }

  public function submenu()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Menu_model', 'menu');

    $data['subMenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Submenu Management';
      $this->load->view('dashboard/layouts/header', $data);
      $this->load->view('dashboard/layouts/sidebar', $data);
      $this->load->view('dashboard/layouts/topbar', $data);
      $this->load->view('dashboard/menu/submenu', $data);
      $this->load->view('dashboard/layouts/footer');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];

      $this->db->insert('user_sub_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Submenu added!</div>');
      redirect('menu/submenu');
    }
  }

  public function subMenuEdit($id)
  {

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['submenu'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();

    $this->form_validation->set_rules('menuId', 'Menu Id', 'required|integer');
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');
    $this->form_validation->set_rules('is_active', 'Is Active', 'required|integer');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Edit Sub Menu';
      $this->load->view('dashboard/layouts/header', $data);
      $this->load->view('dashboard/layouts/sidebar', $data);
      $this->load->view('dashboard/layouts/topbar', $data);
      $this->load->view('dashboard/menu/submenu-edit', $data);
      $this->load->view('dashboard/layouts/footer');
    } else {
      $id = $this->input->post('id');
      $data = [
        'menu_id' => $this->input->post('menuId'),
        'title' => $this->input->post('title'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];

      $this->db->where('id', $id);
      $this->db->update('user_sub_menu', $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu Edited!</div>');
      redirect('menu/submenu');
    }
  }

  public function subMenuDelete($id)
  {
    $this->db->delete('user_sub_menu', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">One Sub Menu Deleted!</div>');
    redirect('menu/submenu');
  }
}
