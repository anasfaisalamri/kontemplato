<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('message'); ?></div>
  </div>

  <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">role_id</th>
        <th scope="col">is_active</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($users as $user) { ?>
        <tr>
          <th scope="row"><?= $i++; ?></th>
          <td><?= $user['name']; ?></td>
          <td><?= $user['email']; ?></td>
          <td><?= $user['role_id']; ?></td>
          <td><?= $user['is_active']; ?></td>
          <td>
            <a href="<?= base_url('admin/useredit/') . $user['id']; ?>" class="badge text-bg-success">edit</a>
            <a href="<?= base_url('admin/userdelete/') . $user['id']; ?>" onclick="return confirm('delete this user?')" class="badge text-bg-danger">delete</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

</div>
<!-- /.container-fluid -->