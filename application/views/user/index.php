<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <div class="row">
    <div class="col-md-6">
      <?= $this->session->flashdata('message'); ?>
    </div>

    <div class="col-md-12">
      <a href="user/create" class="btn btn-primary mb-3">Add Post</a>

      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Tagline</th>
            <th scope="col">Approved</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($user_posts as $post) { ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $post['title']; ?></td>
              <td><?= $post['tagline']; ?></td>
              <td><?= $post['approved']; ?></td>
              <td>
                <a href="<?= base_url('user/edit/') . $post['id']; ?>" class="badge text-bg-success">edit</a>
                <a href="<?= base_url('user/show/') . $post['id']; ?>" class="badge text-bg-info">view</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>


</div>