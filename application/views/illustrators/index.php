<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>


  <div class="row mt-4">
    <div class="col-md-4">
      <?= form_error('illustrator', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

      <?= $this->session->flashdata('message'); ?>

      <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#newIllustratorModal">Add New Illustrator</a>

      <table class="table table-hover table-striped mb-5">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($illustrators as $item) { ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $item['illustrator']; ?></td>
              <td>
                <a href="<?= base_url('illustrators/edit/') . $item['id']; ?>" class="badge text-bg-success">edit</a>
                <a href="<?= base_url('illustrators/delete/') . $item['id']; ?>" onclick="return confirm('delete illustrator?')" class="badge text-bg-danger">delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="newIllustratorModal" tabindex="-1" aria-labelledby="newIllustratorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newIllustratorModalLabel">Add New Illustrator</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('illustrators') ?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control" id="illustrator" name="illustrator" placeholder="Illustrator Name">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>