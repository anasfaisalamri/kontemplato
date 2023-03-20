<section class="hero" id="hero">
  <?php if (!empty($kontemplato_hl)) { ?>
    <div class="mx-auto logo text-uppercase">Kontemplato</div>
    <?php foreach ($kontemplato_hl as $item) { ?>
      <img src="<?= base_url('assets/'); ?>img/artwork/<?= $item['name_artwork']; ?>" alt="<?= $item['name_artwork']; ?>" class="img-cover">
      <div class="transparent"></div>
      <div class="container">
        <div class="hero-caption">
          <div class="row justify-content-center align-items-center">
            <div class="col-10 col-sm-8 col-md-8 col-lg-6">
              <a href="<?= base_url('home/' . strtolower($item['category'])); ?>" class="badge animate__animated animate__fadeInDownBig"><?= $item['category']; ?> vol.<?= $item['volume']; ?></a>
              <div class="animate__animated animate__fadeInLeftBig">
                <h1 class="judul">
                  <a href="<?= base_url('home/show/') . $item['slug']; ?>"><strong><?= $item['title']; ?></strong></a>
                </h1>
                <h4 class="penulis"><?= $item['writer']; ?></h4>
              </div>
              <div class="animate__animated animate__fadeInUpBig">
                <p class="tagline"><?= $item['tagline']; ?></p>
                <p class="date"><?= date("d/m/Y", strtotime($item['created_at'])); ?></p>
              </div>
            </div>

            <div class="col-lg-6 d-none d-lg-block">
              <div class="hero-img animate__animated animate__fadeInRightBig">
                <img src="<?= base_url('assets/'); ?>img/artwork/<?= $item['name_artwork']; ?>" alt="<?= $item['title']; ?>" class="img-fluid">
                <p class="ilustrator text-white mt-1">Ilustrator : <?= $item['illustrator']; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  <?php } else { ?>
    <div class="mx-auto text-center fw-bold text-black fs-2">Kontemplato</div>
    <div class="container">
      <div class="masih-kosong">
        <h1>masih kosong</h1>
      </div>
    </div>
  <?php } ?>
</section>