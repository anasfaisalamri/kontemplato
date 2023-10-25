<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
    $data['users'] = $this->db->get_where('user', ['role_id' => 2])->result_array();

    $data['title'] = 'Dashboard';

    $this->load->view('dashboard/layouts/header', $data);
    $this->load->view('dashboard/layouts/sidebar', $data);
    $this->load->view('dashboard/layouts/topbar', $data);
    $this->load->view('dashboard/admin/index', $data);
    $this->load->view('dashboard/layouts/footer', $data);
  }

  public function userEdit($id)
  {
    $data['user_edit'] = $this->db->get_where('user', ['id' => $id])->row_array();

    $data['user_role'] = $this->db->get('user_role')->result_array();

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('role_id', 'Role', 'required');


    if ($this->form_validation->run() == false) {
      $data['title'] = 'Edit User';
      $this->load->view('dashboard/layouts/header', $data);
      $this->load->view('dashboard/layouts/sidebar', $data);
      $this->load->view('dashboard/layouts/topbar', $data);
      $this->load->view('dashboard/admin/useredit', $data);
      $this->load->view('dashboard/layouts/footer');
    } else {
      $role_id = $this->input->post('role_id');
      $is_active = $this->input->post('is_active');
      $updated_at = date('Y-m-d H:i:s');

      $this->db->set('role_id', $role_id);
      $this->db->set('is_active', $is_active);
      $this->db->set('updated_at', $updated_at);
      $this->db->where('id', $id);
      $this->db->update('user');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Changed!</div>');
      redirect('admin');
    }
  }

  public function userdelete($id)
  {
    $this->db->delete('user', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">One User was Deleted!</div>');
    redirect('admin');
  }

  public function role()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->db->get('user_role')->result_array();

    $this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Role';
      $this->load->view('dashboard/layouts/header', $data);
      $this->load->view('dashboard/layouts/sidebar', $data);
      $this->load->view('dashboard/layouts/topbar', $data);
      $this->load->view('dashboard/admin/role', $data);
      $this->load->view('dashboard/layouts/footer');
    } else {
      $role = $this->input->post('role');

      $this->db->insert('user_role', ['role' => $role]);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Role added!</div>');
      redirect('admin/role');
    }
  }

  public function roleAccess($role_id)
  {
    $data['title'] = 'Role Access';

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

    $this->db->where(('id !=' . 1));
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->load->view('dashboard/layouts/header', $data);
    $this->load->view('dashboard/layouts/sidebar', $data);
    $this->load->view('dashboard/layouts/topbar', $data);
    $this->load->view('dashboard/admin/role-access', $data);
    $this->load->view('dashboard/layouts/footer');
  }

  public function changeAccess()
  {
    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');

    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ];

    $result = $this->db->get_where('user_access_menu', $data);

    if ($result->num_rows() < 1) {
      $this->db->insert('user_access_menu', $data);
    } else {
      $this->db->delete('user_access_menu', $data);
    }

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
  }

  public function roleedit($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->db->get_where('user_role', ['id' => $id])->row_array();

    $this->form_validation->set_rules('role', 'Role', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Role Edit';
      $this->load->view('dashboard/layouts/header', $data);
      $this->load->view('dashboard/layouts/sidebar', $data);
      $this->load->view('dashboard/layouts/topbar', $data);
      $this->load->view('dashboard/admin/roleedit', $data);
      $this->load->view('dashboard/layouts/footer');
    } else {
      $role = $this->input->post('role');

      $this->db->set('role', $role);
      $this->db->where('id', $id);
      $this->db->update('user_role');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role Name Changed!</div>');
      redirect('admin/role');
    }
  }

  public function roledelete($id)
  {
    $this->db->delete('user_role', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">One Role Deleted!</div>');
    redirect('admin/role');
  }
}
