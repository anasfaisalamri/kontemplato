<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('artwork'); ?>
    </div>
  </div>

  <form action="<?= base_url('posts/create'); ?>" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-4">
        <div class="mb-3 row">
          <label for="category" class="col-sm-4 col-form-label">Category</label>
          <div class="col-sm-8">
            <select class="form-select" name="category_id" id="category">
              <?php foreach ($categories as $category) { ?>
                <option value="<?= $category['id']; ?>"><?= $category['category']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="volume" class="col-sm-4 col-form-label">Volume</label>
          <div class="col-sm-8">
            <select class="form-select" name="volume_id" id="volume">
              <option value="" <?= set_select('volume_id', null) ?>>-</option>
              <?php foreach ($volumes as $volume) { ?>
                <option value="<?= $volume['id']; ?>"><?= $volume['volume']; ?></option>
              <?php } ?>
            </select>
            <?= form_error('volume', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="writer" class="col-sm-4 col-form-label">Writer</label>
          <div class="col-sm-8">
            <select class="form-select" name="writer_id">
              <?php foreach ($writers as $writer) { ?>
                <option value="<?= $writer['id']; ?>"><?= $writer['writer']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="illustrator" class="col-sm-4 col-form-label">Illustrator</label>
          <div class="col-sm-8">
            <select class="form-select" name="illustrator_id">
              <?php foreach ($illustrators as $illustrator) { ?>
                <option value="<?= $illustrator['id']; ?>"><?= $illustrator['illustrator']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="date" class="col-sm-4 col-form-label">Date</label>
          <div class="col-sm-8">
            <input type="date" class="form-control" id="date" name="date" value="<?= set_value('date'); ?>">
            <?= form_error('date', '<small class="text-danger mb-3">', '</small>'); ?>
          </div>
        </div>

        <div class="form-check form-switch mt-2 ms-3">
          <input name="is_highlight" value="0" type="checkbox" role="switch" class="form-check-input" checked hidden>
          <input name="is_highlight" id="highlight-input" value="1" type="checkbox" role="switch" class="form-check-input highlight">
          <label for="highlight-input" id="highlight-input" class="form-check-label">Highlight</label>
        </div>
      </div>

      <div class="col-md-8">
        <div class="mb-3 row">
          <label for="title" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" value="<?= set_value('title'); ?>">
            <?= form_error('title', '<small class="text-danger mb-3">', '</small>'); ?>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="tagline" class="col-sm-2 col-form-label">Tagline</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="tagline" name="tagline" value="<?= set_value('tagline'); ?>">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="theme" class="col-sm-2 col-form-label">Theme</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="theme" name="theme" value="<?= set_value('theme'); ?>">
            <?= form_error('theme', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <label for="artwork" class="col-form-label col-sm-2">Artwork (jpg/png)</label>
          <div class="col-sm-10">
            <input type="file" name="artwork" id="artwork" class="form-control">
            <?= form_error('artwork', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <label for="cover" class="col-form-label col-sm-2">Cover (jpg/png)</label>
          <div class="col-sm-10">
            <input type="file" name="cover" id="cover" class="form-control">
            <?= form_error('cover', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row">
          <label for="comic" class="col-form-label col-sm-2">Comic (jpg/png)</label>
          <div class="col-sm-10">
            <input type="file" name="comic[]" id="comic" class="form-control" multiple="true">
            <?= form_error('comic[]', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <label for="body" class="col-sm-2 col-form-label mb-2">Body</label>
        <?= form_error('body', '<small class="text-danger mb-3">', '</small>'); ?>
        <input id="body" type="hidden" name="body" value="<?= set_value('body'); ?>">
        <trix-editor input="body"></trix-editor>
      </div>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Post</button>
  </form>

</div>

<script src="<?= base_url('assets/'); ?>js/kontemplasi.js"></script>