<section class="hero" id="hero">
  <?php if (!empty($kontemplato_hl)) { ?>
    <div class="mx-auto logo text-uppercase">Kontemplato</div>
    <img src="<?= base_url('assets/'); ?>img/artwork/<?= $kontemplato_hl['name_artwork']; ?>" alt="<?= $kontemplato_hl['name_artwork']; ?>" class="img-cover">
    <div class="transparent"></div>
    <div class="container">
      <div class="hero-caption">
        <div class="row justify-content-center align-items-center">
          <div class="col-10 col-sm-8 col-md-8 col-lg-6">
            <a href="<?= base_url('home/posts?category=' . strtolower($kontemplato_hl['category'])); ?>" class="badge animate__animated animate__fadeInDownBig"><?= $kontemplato_hl['category']; ?> vol.<?= $kontemplato_hl['volume']; ?></a>
            <div class="animate__animated animate__fadeInLeftBig">
              <h1 class="judul">
                <a href="<?= base_url('home/show/') . $kontemplato_hl['slug']; ?>"><strong><?= $kontemplato_hl['title']; ?></strong></a>
              </h1>
              <h4 class="penulis"><?= $kontemplato_hl['writer']; ?></h4>
            </div>
            <div class="animate__animated animate__fadeInUpBig">
              <p class="tagline"><?= $kontemplato_hl['tagline']; ?></p>
              <p class="date"><?= date("d/m/Y", strtotime($kontemplato_hl['created_at'])); ?></p>
            </div>
          </div>

          <div class="col-lg-6 d-none d-lg-block">
            <div class="hero-img animate__animated animate__fadeInRightBig">
              <img src="<?= base_url('assets/'); ?>img/artwork/<?= $kontemplato_hl['name_artwork']; ?>" alt="<?= $kontemplato_hl['title']; ?>" class="img-fluid">
              <p class="ilustrator text-white mt-1">Ilustrator : <?= $kontemplato_hl['illustrator']; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <div class="mx-auto text-center fw-bold text-black fs-2">Kontemplato</div>
    <div class="container">
      <div class="masih-kosong">
        <h1>masih kosong</h1>
      </div>
    </div>
  <?php } ?>
</section>