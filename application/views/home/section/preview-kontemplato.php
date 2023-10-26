<section id="preview-majalah" class="preview-majalah">
  <div class="container my-5 text-white">
    <?php if (!empty($kontemplato_hl)) { ?>
      <div class="row">
        <div class="col-md">
          <h4 class="series">
            <a href="<?= base_url('home/posts?category=' . strtolower($kontemplato_hl['category'])); ?>">
              <?= $kontemplato_hl['category']; ?> vol.<?= $kontemplato_hl['volume']; ?> : <?= $kontemplato_hl['theme']; ?>
            </a>
          </h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <img src="<?= base_url('assets/'); ?>img/cover/<?= $kontemplato_hl['name_cover']; ?>" class="img-fluid" alt="<?= $kontemplato_hl['title']; ?>" />
          <p class="ilustrator float-end">Ilustrator : <?= $kontemplato_hl['illustrator'] ?></p>
        </div>
        <div class="col-md-7 desc">
          <h4 class="tagline fst-italic">"<?= $kontemplato_hl['tagline'] ?>"</h4>
          <div class="substr">
            <?= substr($kontemplato_hl['body'], strpos($kontemplato_hl['body'], "<p>"), strpos($kontemplato_hl['body'], "</p>")); ?>
          </div>
          <h6 class="penulis text-uppercase">- oleh <strong><?= $kontemplato_hl['writer']; ?></strong> -</h6>

          <div class="row justify-content-end">
            <div class="col-xl-6 text-end">
              <a href="<?= base_url('home/show/') . $kontemplato_hl['slug']; ?>" class="btn btn-dark text-capitalize fw-semibold">
                lanjut baca
              </a>
            </div>
          </div>
        </div>
      </div>
    <?php } else { ?>
      <div class="row">
        <div class="col-md-5">
          <h4 class="text-uppercase text-center text-white bg-dark font-secondary series">kontemplato</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <img src="<?= base_url('assets/') ?>img/icon/logo.png" class="img-fluid" />
        </div>
        <div class="col-md-7 desc">
          <h4 class="tagline">kosong :(</h4>
          <div class="substr">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ipsam doloremque dolor veritatis adipisci similique in mollitia alias quibusdam ut. Necessitatibus, neque doloremque aperiam expedita nihil aliquam consectetur inventore deserunt rem praesentium laborum. Quaerat at sunt corrupti laudantium praesentium? Eveniet!
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</section>