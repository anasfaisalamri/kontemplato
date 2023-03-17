<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <div class="row">
    <div class="col-md-6">
      <form action="<?= base_url('userposts/update/') . $post['id']; ?>" method="post">
        <input type="hidden" name="id" value="<?= $post['id']; ?>">
        <div class="mb-3 row">
          <label for="writer_name" class="col-sm-2 col-form-label">Writer Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="writer_name" value="<?= $post['writer_name']; ?>" readonly>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="title" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" value="<?= $post['title']; ?>" readonly>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tagline" class="col-sm-2 col-form-label">Tagline</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="tagline" value="<?= $post['tagline']; ?>" readonly>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="approved" class="col-sm-2 col-form-label">Approved</label>
          <div class="col-sm-10">
            <select class="form-select" name="approved">
              <option selected><?= $post['approved']; ?></option>
              <option value="0">0: Not Approved</option>
              <option value="1">1: Approved</option>
            </select>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>

</div>