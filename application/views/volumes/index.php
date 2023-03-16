<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>


  <div class="row mt-4">
    <div class="col-md-3">
      <?= form_error('volume', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

      <?= $this->session->flashdata('message'); ?>

      <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#newVolumeModal">Add New Volume</a>

      <table class="table table-hover mb-5">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Volume</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($volumes as $item) { ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $item['volume']; ?></td>
              <td>
                <a href="<?= base_url('volumes/delete/') . $item['id']; ?>" onclick="return confirm('delete volume?')" class="badge text-bg-danger">delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="newVolumeModal" tabindex="-1" aria-labelledby="newVolumeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newVolumeModalLabel">Add New Volume</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('volumes') ?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <input type="number" class="form-control" id="volume" name="volume" placeholder="Volume">
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