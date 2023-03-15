<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-10 text-center">
      <p><?= date('d F Y', strtotime($post['created_at'])); ?></p>
      <h1><?= $post['title']; ?></h1>
      <h5><?= $post['tagline']; ?></h5>
    </div>
    <div class="col-md-8">
      <p class="mt-5"><?= $post['body']; ?></p>
    </div>
  </div>
</div>