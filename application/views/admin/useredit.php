    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="mb-3">
            <p class="mt-3">Created at : <?= date('d F Y', strtotime($user_edit['created_at'])); ?></p>
          </div>

          <form action="<?= base_url('admin/useredit/') . $user_edit['id']; ?>" method="post">
            <input type="hidden" name="id" value="<?= $user_edit['id']; ?>">
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="<?= $user_edit['name']; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="<?= $user_edit['email']; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="role_id" class="col-sm-2 col-form-label">Role</label>
              <div class="col-sm-10">
                <select name="role_id" id="role_id" class="form-select">
                  <option value="<?= $user_edit['role_id']; ?>" selected><?= $user_edit['role_id']; ?></option>
                  <?php $i = 1; ?>
                  <?php foreach ($user_role as $role) { ?>
                    <option value="<?= $role['id']; ?>"><?= $i . ' : ' . $role['role']; ?></option>
                    <?php $i++; ?>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="is_active" class="col-sm-2 col-form-label">Is Active</label>
              <div class="col-sm-10">
                <select name="is_active" id="is_active" class="form-select">
                  <option value="<?= $user_edit['is_active']; ?>" selected><?= $user_edit['is_active']; ?></option>
                  <option value="1">1 : Active</option>
                  <option value="0">0 : Deactive</option>
                </select>
              </div>
            </div>

            <div class="form-group row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Edit User</button>
              </div>
            </div>
          </form>

        </div>
      </div>

    </div>
    <!-- /.container-fluid -->