    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
      </div>

      <div class="row">
        <div class="col-lg-4">

          <h5 class="mb-3">Title : <?= $submenu['title']; ?></h5>

          <?php
          $menu_id = $submenu['id'];
          $queryMenu = "SELECT *, `user_sub_menu`.`menu_id` 
                        FROM `user_menu` JOIN `user_sub_menu`
                        ON `user_menu`.`id` = `user_sub_menu`.`menu_id`
                        WHERE `user_menu`.`id` = `user_sub_menu`.`menu_id` AND `user_sub_menu`.`id` = $menu_id
                        ";
          $menuSelect = $this->db->query($queryMenu)->row_array();
          $menu = $this->db->get('user_menu')->result_array();
          ?>


          <form action="<?= base_url('menu/submenuedit/') . $submenu['id']; ?>" method="post">
            <input type="hidden" name="id" value="<?= $submenu['id']; ?>">
            <div class="form-group">
              <label for="menuId">Select Menu</label>
              <select name="menuId" id="menuId" class="form-select">
                <option value="<?= $menuSelect['menu_id']; ?>"><?= $menuSelect['menu']; ?></option>
                <?php foreach ($menu as $m) { ?>
                  <option value="<?= $m['id'] ?>"><?= $m['menu']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="title">Submenu Title</label>
              <input type="Text" class="form-control" id="title" name="title" value="<?= $submenu['title']; ?>">
              <?= form_error('title', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="url">Submenu url</label>
              <input type="Text" class="form-control" id="url" name="url" value="<?= $submenu['url']; ?>">
              <?= form_error('url', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="icon">Submenu icon</label>
              <input type="Text" class="form-control" id="icon" name="icon" value="<?= $submenu['icon']; ?>">
              <?= form_error('icon', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="is_active">is_active</label>
              <select name="is_active" id="is_active" class="form-select">
                <option value="<?= $submenu['is_active']; ?>"><?= $submenu['is_active']; ?></option>
                <option value="0">0</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Change Submenu</button>
          </form>

        </div>
      </div>

    </div>
    <!-- /.container-fluid -->