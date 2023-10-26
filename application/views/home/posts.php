<?php require_once 'partials/navbars.php'; ?>

<div class="container" id="kontemplato-all">
  <div class="row justify-content-center text-capitalize text-center mb-5">
    <h1 class="display-3 font-serif pt-5"><?= $title; ?></h1>
    <p><?= $desc; ?></p>
  </div>

  <?php if (!$this->input->get('category')) { ?>
    <div class="row py-3">
      <form action="<?= base_url('home/posts?category=') . $category; ?>" method="post">
        <div class="row justify-content-center">
          <div class="col-sm-4">
            <div class="input-group">
              <input type="text" name="keyword" class="form-control" placeholder="Masukkan keyword..." autofocus>
              <input class="btn btn-primary" type="submit" name="submit" value="Cari">
            </div>
          </div>
        </div>
      </form>
    </div>
  <?php } ?>

  <div class="row mt-5">
    <?php if (empty($posts)) { ?>
      <div class="row justify-content-center text-center mb-5">
        <div class="col-10 mb-5 col-sm-6">
          <h5>Konten yang Kamu cari gak ketemu! </h5>
          <h5 class="mt-3">Coba ganti keyword dengan benar berdasarkan <strong>Nama Penulis</strong>, <strong>Judul</strong> dari tulisan atau <strong>Kategori</strong> tulisan.</h5>
          <small class="text-gray-500 mt-5">tekan tombol <em>cari/search</em> untuk melihat semua tulisan.</small>
        </div>
      </div>
    <?php } else { ?>
      <?php foreach ($posts as $post) { ?>
        <div class="col-md-4 mb-5">
          <div class="item">
            <!-- <a href="<?= base_url('home/posts?category=' . strtolower($post['category'])); ?>" class="badge"><?= $post['category'] ?></a> -->
            <p class="date"><?= date("d/m/Y", strtotime($post["created_at"])) ?></p>
            <a href="<?= base_url('home/show/') . $post['slug'] ?>" class="text-decoration-none text-black">
              <img src="<?= base_url('assets/') ?>img/artwork/<?= $post['name_artwork']; ?>" alt="<?= $post['name_artwork'] ?>" class="img-fluid">
              <h4 class="judul font-serif my-4"><?= $post['title']; ?></h4>
              <p class="penulis"><?= $post['writer']; ?></p>
            </a>
          </div>
        </div>
      <?php } ?>
    <?php } ?>
  </div>
</div>