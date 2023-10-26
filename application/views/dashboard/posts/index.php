<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <div class="row">
    <div class="col-lg-4">
      <?= $this->session->flashdata('insert'); ?>
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

  <a href="<?= base_url('posts/create'); ?>" class="btn btn-primary">Create New Post</a>

  <div class="row mt-4">
    <form action="<?= base_url('posts'); ?>" method="post">
      <div class="row">
        <div class="col-sm-4">
          <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="Search keyword..." autofocus autocomplete="off">
            <input class="btn btn-primary" type="submit" name="submit" value="Search">
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="row">
    <div class="col-md-12">
      <?php if (!empty($allPosts)) { ?>
        <h5 class="my-4">Total Posts : <?= $total_rows; ?></h5>
        <table class="table table-hover table-striped mb-5">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Category</th>
              <th scope="col">Writer</th>
              <th scope="col">Title</th>
              <th scope="col">is active</th>
              <th scope="col">Created at</th>
              <th scope="col">Updated at</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($allPosts as $item) { ?>
              <tr>
                <th><?= ++$start; ?></th>
                <td><?= $item['category']; ?></td>
                <td><?= $item['writer']; ?></td>
                <td><?= $item['title']; ?></td>
                <td><?= $item['is_active']; ?></td>
                <td><?= date('d F Y', strtotime($item['created_at'])); ?></td>
                <td><?= date('d F Y', strtotime($item['updated_at'])); ?></td>
                <td>
                  <a href="<?= base_url('posts/show/') . $item['slug']; ?>" class="badge text-bg-info">view</a>
                  <a href="<?= base_url('posts/edit/') . $item['slug']; ?>" class="badge text-bg-success">edit</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php } else { ?>
        <p class="mt-4">Hasil untuk "<span class="text-primary"><?= $keyword; ?></span>" tidak ditemukan.</p>
        <small class="text-gray-500">tekan tombol <em>cari/search</em> untuk melihat semua tulisan.</small>
      <?php } ?>
    </div>
  </div>

  <?= $this->pagination->create_links(); ?>

</div>