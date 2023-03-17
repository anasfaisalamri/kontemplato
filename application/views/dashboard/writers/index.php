<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>


  <div class="row mt-4">
    <div class="col-md-4">
      <?= form_error('writer', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

      <?= $this->session->flashdata('message'); ?>

      <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#newWriterModal">Add New Writer</a>

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
          <?php foreach ($writers as $item) { ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $item['writer']; ?></td>
              <td>
                <a href="<?= base_url('writers/edit/') . $item['id']; ?>" class="badge text-bg-success">edit</a>
                <a href="<?= base_url('writers/delete/') . $item['id']; ?>" onclick="return confirm('delete wrtier?')" class="badge text-bg-danger">delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="newWriterModal" tabindex="-1" aria-labelledby="newWriterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newWriterModalLabel">Add New Writer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('writers') ?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control" id="writer" name="writer" placeholder="Writer Name">
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