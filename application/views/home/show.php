<?php require_once 'partials/navbars.php' ?>

<div class="container-fluid px-0" id="comics">
  <div class="comic">
    <?php if (!empty($comics)) { ?>
      <?php foreach ($comics as $comic) { ?>
        <img src="<?= base_url('assets/') ?>img/comic/<?= $comic['name_comic']; ?>" alt="<?= $comic['name_comic']; ?>">
      <?php } ?>
      <p class="ilustrator float-start px-2">Ilustrator : <?= $comic['illustrator']; ?></p>
    <?php } ?>
  </div>
</div>

<div class="container-fluid" id="baca">
  <?php if (!empty($postKontemplato)) { ?>
    <div class="comic">
      <?php if (!empty($postKontemplato['name_comic'])) { ?>
        <?php foreach ($comics as $comic) { ?>
          <img src="<?= base_url('assets/') ?>img/comic/<?= $comic['name_comic']; ?>" alt="<?= $comic['name_comic']; ?>">
        <?php } ?>
        <p class="ilustrator float-start px-2">Ilustrator : <?= $comic['illustrator']; ?></p>
      <?php } ?>
    </div>
    <div class="row justify-content-center">
      <div class="text-center">
        <a href="<?= base_url('home/' . strtolower($postKontemplato['category'])); ?>" class="badge">
          <?= $postKontemplato['category']; ?> vol.<?= $postKontemplato['volume']; ?>
        </a>
        <p class="date"><?= date("d/m/Y", strtotime($postKontemplato['created_at'])); ?></p>
      </div>
      <div class="col-10 col-md-10 col-lg-8 col-xl-6">
        <h1 class="judul"><?= $postKontemplato['title']; ?></h1>
        <h4 class="penulis">oleh <b><?= $postKontemplato['writer']; ?></b></h4>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-11 col-md-10 col-lg-8 col-xl-6">
        <p class="tagline text-center"><?= $postKontemplato['tagline']; ?></p>
      </div>
      <div class="text-center px-0">
        <img src="<?= base_url('assets/'); ?>img/artwork/<?= $postKontemplato['name_artwork']; ?>" alt="<?= $postKontemplato['title']; ?>" class="artwork">
        <p class="ilustrator float-start px-2">Ilustrator : <?= $postKontemplato['illustrator']; ?></p>
      </div>
      <div class="col-11 col-md-8 col-lg-8 col-xl-6 konten-tulisan">
        <?= $postKontemplato['body'] ?>
      </div>
    </div>
  <?php } elseif (!empty($postOrnamen)) { ?>
    <div class="row justify-content-center">
      <div class="text-center">
        <a href="<?= base_url('home/' . strtolower($postOrnamen['category'])); ?>" class="badge">
          <?= $postOrnamen['category']; ?>
        </a>
        <p class="date"><?= date("d/m/Y", strtotime($postOrnamen['created_at'])); ?></p>
      </div>
      <div class="col-10 col-md-10 col-lg-8 col-xl-6">
        <h1 class="judul"><?= $postOrnamen['title']; ?></h1>
        <h4 class="penulis">oleh <b><?= $postOrnamen['writer']; ?></b></h4>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-11 col-md-10 col-lg-8 col-xl-6">
        <p class="tagline text-center"><?= $postOrnamen['tagline']; ?></p>
      </div>
      <div class="text-center px-0">
        <img src="<?= base_url('assets/'); ?>img/artwork/<?= $postOrnamen['name_artwork']; ?>" alt="<?= $postOrnamen['title']; ?>" class="artwork">
        <p class="ilustrator float-start px-2">Ilustrator : <?= $postOrnamen['illustrator']; ?></p>
      </div>
      <div class="col-11 col-md-8 col-lg-8 col-xl-6 konten-tulisan">
        <?= $postOrnamen['body'] ?>
      </div>
    </div>
  <?php } ?>
</div>