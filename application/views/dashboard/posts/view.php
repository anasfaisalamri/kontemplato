<!-- Begin Page Content -->
<div class="container-fluid" id="view">

  <!-- Page Heading -->
  <div class="mb-4">
    <a href="<?= base_url('posts'); ?>" class="btn btn-warning">Back to All Posts</a>
    <a href="<?= base_url('posts/edit/') . $post['slug']; ?>" class="btn btn-success">Edit</a>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-10 text-center">
      <p class="date"><?= date('d/m/Y', strtotime($post['created_at'])); ?></p>
      <h5><?= $post['category']; ?></h5>
      <h1 class="title mt-5"><?= $post['title']; ?></h1>
      <h4 class="tagline my-3"><?= $post['tagline']; ?></h4>
      <h4 class="mb-5"><?= $post['writer']; ?></h4>
    </div>

    <div class="col-12 px-0">
      <img src="<?= base_url('assets/'); ?>img/artwork/<?= $post['name_artwork']; ?>" alt="<?= $post['name_artwork']; ?>" class="img-fluid">
      <p>Illustrator : <?= $post['illustrator']; ?></p>
    </div>

    <div class="col-md-8 body">
      <p class="mt-3"><?= $post['body']; ?></p>
    </div>
  </div>

</div>