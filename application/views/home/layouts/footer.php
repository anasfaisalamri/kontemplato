<footer class="py-5 bg-dark">
  <div class="container">
    <div class="d-none d-sm-block">
      <div class="row justify-content-between pt-5">
        <div class="d-flex justify-content-between text-white text-capitalize mb-3">
          <div class="col-md-6">
            <div class="scroll-to-top d-flex align-items-center">
              <img src="<?= base_url('assets'); ?>/img/icon/logo-white.png" alt="logo-white.png" width="50">
              <h1 class="text-uppercase fw-bold ms-1 mb-0">Kontemplato</h1>
            </div>
            <ul class="list-unstyled d-flex m-0 fs-1 mt-3">
              <li class="ms-1"><a class="text-secondary nav-link link-light" href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
              <li class="ms-5"><a class="text-secondary nav-link link-light" href="https://instagram.com/kontemplato.media" target="_blank"><i class="fab fa-instagram"></i></a></li>
              <li class="ms-5"><a class="text-secondary nav-link link-light" href="#" target="_blank"><i class="fas fa-envelope"></i></a></li>
            </ul>
          </div>

          <div class="col-6 col-md-2">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item"><a href="<?= base_url(); ?>" class="nav-link link-light p-0 text-secondary">Home</a></li>
              <li class="nav-item"><a href="<?= base_url('home/about'); ?>" class="nav-link link-light p-0 text-secondary">Prakata</a></li>
              <?php if ($user) { ?>
                <li class="nav-item dropdown link-light text-secondary">
                  <a class="nav-link dropdown-toggle link-light text-secondary p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $user['name']; ?>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?= base_url('user'); ?>"><i class="fas fa-columns"></i> Dashboard</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                  </ul>
                </li>
              <?php } else { ?>
                <li class="nav-item"><a href="<?= base_url('auth'); ?>" class="nav-link link-light p-0 text-secondary">Berkontribusi</a></li>
              <?php } ?>
            </ul>
          </div>

          <div class="col-6 col-md-2">
            <h5><a href="<?= base_url('home/categories'); ?>" class="nav-link link-light p-0 text-white">Kategori</a></h5>
            <ul class="nav flex-column">
              <?php foreach ($categories as $category) { ?>
                <li class="nav-item">
                  <a href="<?= base_url('home/posts?category=') . $category['slug']; ?>" class="nav-link link-light text-secondary p-0"><?= $category['category']; ?></a>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>

        <div class="d-flex flex-wrap text-white justify-content-between pt-3 mt-5 border-top">
          <div>Copyright &copy; Kontemplato <?= date('Y'); ?> All rights reserved.</div>
        </div>
      </div>
    </div>

    <div class="d-block d-sm-none text-white text-capitalize">
      <div class="scroll-to-top d-flex align-items-center justify-content-center">
        <img src="<?= base_url('assets/'); ?>img/icon/logo-white.png" alt="logo-white.png" width="30">
        <h3 class="text-uppercase fw-bold ms-1 mb-0">Kontemplato</h3>
      </div>
      <div class="d-flex align-items-center justify-content-center mt-3 pb-3 border-bottom">
        <ul class="nav list-unstyled fs-2">
          <li><a class="text-white" href="#"><i class="fab fa-twitter"></i></a></li>
          <li class="ms-3"><a class="text-white" href="https://instagram.com/kontemplato.media" target="_blank"><i class="fab fa-instagram"></i></a></li>
          <li class="ms-3"><a class="text-white" href="#"><i class="fas fa-envelope"></i></a></li>
        </ul>
      </div>

      <div class="row justify-content-center px-5 mt-4">
        <div class="col mb-4 section">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item"><a href="<?= base_url(); ?>" class="nav-link link-light p-0 text-secondary">Home</a></li>
            <li class="nav-item"><a href="<?= base_url('home/about'); ?>" class="nav-link link-light p-0 text-secondary">Prakata</a></li>
            <?php if ($user) { ?>
              <li class="nav-item dropdown link-light text-secondary">
                <a class="nav-link dropdown-toggle link-light text-secondary p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?= $user['name']; ?>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?= base_url('user'); ?>"><i class="fas fa-columns"></i> Dashboard</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
                  </li>
                </ul>
              </li>
            <?php } else { ?>
              <li class="nav-item"><a href="<?= base_url('auth'); ?>" class="nav-link link-light p-0 text-secondary">Berkontribusi</a></li>
            <?php } ?>
          </ul>
        </div>
        <div class="col section">
          <h5><a href="<?= base_url('home/categories'); ?>" class="nav-link link-light p-0 text-white">Kategori</a></h5>
          <ul class="nav flex-column">
            <?php foreach ($categories as $category) { ?>
              <li class="nav-item">
                <a href="<?= base_url('home/posts?category=') . $category['slug']; ?>" class="nav-link link-light text-secondary p-0"><?= $category['category']; ?></a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-11 text-center">
          <p class="mt-1 mb-0 text-secondary copy-right">Copyright &copy; Kontemplato <?= date('Y'); ?></p>
        </div>
      </div>
    </div>

  </div>
</footer>

<a class="scroll-to-top rounded up">
  <i class="fas fa-angle-up"></i>
</a>

<script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/carousel.js"></script>
<script src="<?= base_url('assets/'); ?>js/script.js"></script>

</body>

</html>