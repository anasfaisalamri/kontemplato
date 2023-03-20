<section id="kontemplato" class="kontemplato">
  <div class="container">
    <div class="row justify-content-center pt-2">
      <div class="col-md">
        <h4 class="font-secondary text-uppercase text-center bg-black rounded-3 text-white my-4 py-2">Kontemplato</h4>
      </div>
    </div>
    <div class="owl-carousel owl-carousel-majalah owl-theme owl-height">
      <?php if (!empty($kontemplato)) { ?>
        <?php foreach ($kontemplato as $item) { ?>
          <div class="item">
            <div class="highlight">
              <div class="text-center">
                <a href="<?= base_url('home/' . strtolower($item['category'])); ?>" class="badge"><?= $item['category']; ?> vol.<?= $item['volume']; ?></a>
                <p class="date"><?= date('d/m/Y', strtotime($item['created_at'])); ?></p>
              </div>
              <a href="<?= base_url('home/show/') . $item['slug']; ?>" class="img-overflow">
                <img class="overflow img-fluid" src="<?= base_url('assets/'); ?>img/artwork/<?= $item['name_artwork']; ?>" alt="<?= $item['name_artwork']; ?>">
              </a>
              <h4 class="judul text-capitalize">
                <a href="<?= base_url('home/show/') . $item['slug']; ?>">
                  <strong><?= $item['title']; ?></strong>
                </a>
              </h4>
              <h6 class="penulis text-uppercase"><?= $item['writer']; ?></h6>
              <p class="tagline"><?= $item['tagline']; ?></p>
              <a href="<?= base_url('home/show/') . $item['slug']; ?>" class="btn btn-primary">Lanjut Baca</a>
            </div>
          </div>
        <?php } ?>
      <?php } else { ?>
        <div class="item">
          <img src="<?= base_url('assets/') ?>img/icon/logo.png" />
        </div>
      <?php } ?>
      <div class="item more bg-main d-flex align-items-center justify-content-center">
        <a href="<?= base_url('home/' . strtolower($item['category'])); ?>" class="d-block btn btn-dark text-capitalize text-decoration-none text-white">
          kumpulan kontemplato
        </a>
      </div>
    </div>
  </div>
</section>