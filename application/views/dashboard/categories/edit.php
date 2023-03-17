<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <div class="row">
    <div class="col-md-4">
      <form action="<?= base_url('categories/edit/') . $category['id']; ?>" method="post">
        <input type="hidden" name="id" value="<?= $category['id']; ?>">
        <div class="form-group">
          <label for="category">Category Name</label>
          <input type="Text" class="form-control" id="category" name="category" value="<?= $category['category']; ?>" autofocus>
          <?= form_error('category', '<small class="text-danger">', '</small>'); ?>
        </div>

        <button type="submit" class="btn btn-primary">Change Category Name</button>
      </form>
    </div>
  </div>

</div>