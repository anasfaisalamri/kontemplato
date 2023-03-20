<section id="preview-majalah" class="preview-majalah">
  <div class="container my-5 text-white">
    <?php if (!empty($kontemplato_hl)) { ?>
      <?php foreach ($kontemplato_hl as $hl) { ?>
        <div class="row">
          <div class="col-md-5">
            <h4 class="series">
              <a href="<?= base_url('home/' . strtolower($hl['category'])); ?>">
                <?= $hl['category']; ?> vol.<?= $hl['volume']; ?>
              </a>
            </h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <img src="<?= base_url('assets/'); ?>img/cover/<?= $hl['name_cover']; ?>" class="img-fluid" alt="<?= $hl['title']; ?>" />
            <p class="ilustrator float-end">Ilustrator : <?= $hl['illustrator'] ?></p>
          </div>
          <div class="col-md-7 desc">
            <h4 class="tagline"><?= $hl['tagline'] ?></h4>
            <div class="substr">
              <?= substr($hl['body'], strpos($hl['body'], "<div>"), strpos($hl['body'], "</div>")); ?>
            </div>
            <h6 class="penulis text-uppercase">- oleh <strong><?= $hl['writer']; ?></strong> -</h6>

            <div class="row justify-content-end">
              <div class="col-xl-6 text-end">
                <a href="<?= base_url('home/show/') . $hl['slug']; ?>" class="btn btn-dark text-capitalize fw-semibold">
                  lanjut baca
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
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