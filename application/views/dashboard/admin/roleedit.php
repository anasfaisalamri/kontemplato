    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <h5 class="mb-4">Role : <?= $role['role']; ?></h5>

          <form action="<?= base_url('admin/roleedit/') . $role['id']; ?>" method="post">
            <input type="hidden" name="id" value="<?= $role['id']; ?>">
            <div class="form-group">
              <label for="role">Role Name</label>
              <input type="Text" class="form-control" id="role" name="role" value="<?= $role['role']; ?>">
              <?= form_error('role', '<small class="text-danger">', '</small>'); ?>
            </div>

            <button type="submit" class="btn btn-primary">Change Role Name</button>
          </form>

        </div>
      </div>

    </div>
    <!-- /.container-fluid -->