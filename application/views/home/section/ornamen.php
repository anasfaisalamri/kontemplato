<section class="ornamen" id="ornamen">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5 col-lg-4">
        <div class="essay-highlight d-none d-md-block">
          <?php if (!empty($essay_hl)) { ?>
            <div class="item">
              <img src="<?= base_url('assets/'); ?>img/artwork/<?= $essay_hl['name_artwork']; ?>" alt="<?= $essay_hl['name_artwork']; ?>" class="img-fluid">
              <div class="redaksi">
                <h2 class="judul"><?= $essay_hl['title']; ?></h2>
                <h5 class="penulis">oleh <b><?= $essay_hl['writer']; ?></b></h5>
                <?php if ($essay_hl['tagline']) { ?>
                  <p class="tagline fst-italic">"<?= $essay_hl['tagline']; ?>"</p>
                <?php } else { ?>
                  <p class="tagline"><?= $essay_hl['tagline']; ?></p>
                <?php } ?>
                <p class="date"><?= date('d/m/Y', strtotime($essay_hl['created_at'])); ?></p>
                <a href="<?= base_url('home/show/') . $essay_hl['slug']; ?>" class="btn btn-primary">Lanjut Baca</a>
              </div>
            </div>
          <?php } else { ?>
            <div class="item">
              <img src="<?= base_url('assets/') ?>img/icon/logo.png" class="img-fluid">
              <div class="redaksi">
                <h2 class="judul text-center text-capitalize fw-semibold">kosong :(</h2>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="col-md-7 col-lg-8">
        <div class="d-none d-sm-block">
          <div class="owl-carousel owl-theme owl-height">
            <?php if (!empty($essay)) { ?>
              <?php foreach ($essay as $item) { ?>
                <div class="item">
                  <div class="highlight">
                    <div class="text-center">
                      <a href="<?= base_url('home/posts?category=' . strtolower($item['category'])); ?>" class="badge"><?= $item['category'] ?></a>
                      <p class="date"><?= date('d/m/Y', strtotime($item['created_at'])); ?></p>
                    </div>
                    <a href="<?= base_url('home/show/') . $item['slug']; ?>" class="img-overflow">
                      <img class="overflow img-fluid" src="<?= base_url('assets/'); ?>img/artwork/<?= $item['name_artwork']; ?>" alt="<?= $item['name_artwork']; ?>">
                    </a>
                    <h4 class="judul text-capitalize">
                      <a href="<?= base_url('home/show/') . $item['slug']; ?>" class="text-decoration-none text-dark font-serif">
                        <strong><?= $item['title']; ?></strong>
                      </a>
                    </h4>
                    <div class="d-block d-md-none">
                      <?php if ($item['tagline']) { ?>
                        <p class="tagline fst-italic">"<?= $item['tagline']; ?>"</p>
                      <?php } else { ?>
                        <p class="tagline"><?= $item['tagline']; ?></p>
                      <?php } ?>
                    </div>
                    <h6 class="penulis text-uppercase"><?= $item['writer']; ?></h6>
                    <div class="d-block d-md-none">
                      <a href="<?= base_url('home/show/') . $item['slug']; ?>" class="btn btn-primary text-capitalize">lanjut baca</a>
                    </div>
                  </div>
                  <div class="d-none d-lg-block overlay">
                    <div class="text-center overlay-item">
                      <a href="<?= base_url('home/posts?category=' . strtolower($item['category'])); ?>" class="badge">
                        <?= $item['category']; ?>
                      </a>
                      <p class="date"><?= date('d/m/Y', strtotime($item['created_at'])); ?></p>
                      <?php if ($item['tagline']) { ?>
                        <p class="tagline fst-italic">"<?= $item['tagline']; ?>"</p>
                      <?php } else { ?>
                        <p class="tagline"><?= $item['tagline']; ?></p>
                      <?php } ?>
                      <a href="<?= base_url('home/show/') . $item['slug']; ?>" class="btn btn-light fw-bold text-capitalize">lanjut baca</a>
                    </div>
                  </div>
                </div>
              <?php } ?>


            <?php } else { ?>
              <div class="item bg-white">
                <div class="highlight">
                  <div class="text-center">
                  </div>
                  <span class="img-overflow">
                    <img class="overflow img-fluid" src="<?= base_url('assets/') ?>img/icon/logo.png">
                  </span>
                  <h4 class="judul text-capitalize">kosong :(</h4>
                </div>
              </div>
            <?php } ?>
            <div class="item more bg-main d-flex align-items-center justify-content-center">
              <div class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Kategori
                </button>
                <ul class="dropdown-menu">
                  <?php foreach ($categories as $category) { ?>
                    <li><a class="dropdown-item" href="<?= base_url('home/posts?category=') . $category['slug']; ?>"><?= $category['category']; ?></a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="d-block d-sm-none">
          <div class="owl-carousel owl-theme owl-height">
            <?php foreach ($essayBlock as $item) { ?>
              <div class="item">
                <div class="highlight">
                  <div class="text-center">
                    <a href="<?= base_url('home/posts?category=' . strtolower($item['category'])); ?>" class="badge"><?= $item['category'] ?></a>
                    <p class="date"><?= date('d/m/Y', strtotime($item['created_at'])); ?></p>
                  </div>
                  <a href="<?= base_url('home/show/') . $item['slug']; ?>" class="img-overflow">
                    <img class="overflow img-fluid" src="<?= base_url('assets/'); ?>img/artwork/<?= $item['name_artwork']; ?>" alt="<?= $item['name_artwork']; ?>">
                  </a>
                  <h4 class="judul text-capitalize">
                    <a href="<?= base_url('home/show/') . $item['slug']; ?>" class="text-decoration-none text-dark font-serif">
                      <strong><?= $item['title']; ?></strong>
                    </a>
                  </h4>
                  <div class="d-block d-md-none">
                    <?php if ($item['tagline']) { ?>
                      <p class="tagline fst-italic">"<?= $item['tagline']; ?>"</p>
                    <?php } else { ?>
                      <p class="tagline"><?= $item['tagline']; ?></p>
                    <?php } ?>
                  </div>
                  <h6 class="penulis text-uppercase"><?= $item['writer']; ?></h6>
                  <div class="d-block d-md-none">
                    <a href="<?= base_url('home/show/') . $item['slug']; ?>" class="btn btn-primary text-capitalize">lanjut baca</a>
                  </div>
                </div>
                <div class="d-none d-lg-block overlay">
                  <div class="text-center overlay-item">
                    <a href="<?= base_url('home/posts?category=' . strtolower($item['category'])); ?>" class="badge">
                      <?= $item['category']; ?>
                    </a>
                    <p class="date"><?= date('d/m/Y', strtotime($item['created_at'])); ?></p>
                    <?php if ($item['tagline']) { ?>
                      <p class="tagline fst-italic">"<?= $item['tagline']; ?>"</p>
                    <?php } else { ?>
                      <p class="tagline"><?= $item['tagline']; ?></p>
                    <?php } ?>
                    <a href="<?= base_url('home/show/') . $item['slug']; ?>" class="btn btn-light fw-bold text-capitalize">lanjut baca</a>
                  </div>
                </div>
              </div>
            <?php } ?>
            <div class="item more bg-main d-flex align-items-center justify-content-center">
              <div class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Kategori
                </button>
                <ul class="dropdown-menu">
                  <?php foreach ($categories as $category) { ?>
                    <li><a class="dropdown-item" href="<?= base_url('home/posts?category=') . $category['slug']; ?>"><?= $category['category']; ?></a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>