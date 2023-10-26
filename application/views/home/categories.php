<?php require_once 'partials/navbars.php'; ?>

<div class="container" id="kontemplato-all">
  <div class="row justify-content-center text-capitalize text-center mb-5">
    <h1 class="display-3 font-serif pt-5">Kategori</h1>
  </div>

  <div class="row mt-5">
    <?php foreach ($categories as $category) { ?>
      <div class="col-md-4 mb-5 pb-5">
        <div class="item">
          <a href="<?= base_url('home/posts?category=') . $category['slug'] ?>" class="text-decoration-none text-black">
            <div class="card text-dark bg-black">
              <img src="<?= base_url('assets/') ?>img/icon/logo-white.png" class="img-fluid card-img-top">
              <div class="card-img-overlay d-flex align-items-center p-0">
                <h4 class="judul font-serif my-4 text-white card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0, 0, 0, 0.8)"><?= $category['category']; ?></h4>
              </div>
            </div>
          </a>
        </div>
      </div>
    <?php } ?>
  </div>
</div>