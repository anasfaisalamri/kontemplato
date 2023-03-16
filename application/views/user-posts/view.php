<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h5 mb-0 text-gray-800">Writer: <?= $post['writer_name']; ?></h1>
  </div>

  <div class="row justify-content-center" id="view">
    <div class="col-md-10 text-center mt-3">
      <p><?= date('d F Y', strtotime($post['created_at'])); ?></p>
      <h1 class="title"><?= $post['title']; ?></h1>
      <h5 class="tagline"><?= $post['tagline']; ?></h5>
    </div>

    <div class="col-md-8 body">
      <?= $post['body']; ?>
    </div>
  </div>

</div>