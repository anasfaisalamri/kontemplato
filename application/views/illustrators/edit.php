<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <div class="row">
    <div class="col-md-4">
      <form action="<?= base_url('categories/edit/') . $illustrator['id']; ?>" method="post">
        <input type="hidden" name="id" value="<?= $illustrator['id']; ?>">
        <div class="form-group">
          <label for="illustrator">Illustrator Name</label>
          <input type="Text" class="form-control" id="illustrator" name="illustrator" value="<?= $illustrator['illustrator']; ?>" autofocus>
          <?= form_error('illustrator', '<small class="text-danger">', '</small>'); ?>
        </div>

        <button type="submit" class="btn btn-primary">Change Illustrator Name</button>
      </form>
    </div>
  </div>

</div>