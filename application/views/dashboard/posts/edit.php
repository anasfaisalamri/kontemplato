<!-- Begin Page Content -->
<div class="container-fluid" id="view">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <form action="<?= base_url('posts/edit/') . $post['id']; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $post['id']; ?>">
    <div class="row">
      <div class="col-md-5">
        <div class="mb-3 row">
          <label for="category" class="col-sm-2 col-form-label">Category</label>
          <div class="col-sm-10">
            <select class="form-select" name="category_id">
              <?php foreach ($categories as $category) { ?>
                <?php if ($post['category_id'] == $category['id']) { ?>
                  <option value="<?= $category['id']; ?>" selected><?= $category['category']; ?></option>
                <?php } else { ?>
                  <option value="<?= $category['id']; ?>"><?= $category['category']; ?></option>
                <?php } ?>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="writer" class="col-sm-2 col-form-label">Writer</label>
          <div class="col-sm-10">
            <select class="form-select" name="writer_id">
              <?php foreach ($writers as $writer) { ?>
                <?php if ($post['writer_id'] == $writer['id']) { ?>
                  <option value="<?= $writer['id'] ?>" selected><?= $writer['writer']; ?></option>
                <?php } else { ?>
                  <option value="<?= $writer['id'] ?>"><?= $writer['writer']; ?></option>
                <?php } ?>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="illustrator" class="col-sm-2 col-form-label">Illustrator</label>
          <div class="col-sm-10">
            <select class="form-select" name="illustrator_id">
              <?php foreach ($illustrators as $illustrator) { ?>
                <?php if ($post['illustrator_id'] == $illustrator['id']) { ?>
                  <option value="<?= $illustrator['id'] ?>" selected><?= $illustrator['illustrator']; ?></option>
                <?php } else { ?>
                  <option value="<?= $illustrator['id'] ?>"><?= $illustrator['illustrator']; ?></option>
                <?php } ?>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>

      <div class="col-md-7">
        <div class="row mb-3">
          <label for="title" class="col-form-label col-sm-2">Title</label>
          <div class="col-sm-10">
            <input type="text" name="title" id="title" class="form-control" value="<?= set_value('title') ? set_value('title') : $post["title"] ?>">
            <?= form_error('title', '<small class="text-danger mb-3">', '</small>'); ?>
          </div>
        </div>

        <div class="row mb-3">
          <label for="tagline" class="col-form-label col-sm-2">Tagline</label>
          <div class="col-sm-10">
            <input type="text" name="tagline" id="tagline" class="form-control" value="<?= set_value('tagline') ? set_value('tagline') : $post["tagline"] ?>">
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="mb-3">
          <label for="artwork" class="form-label">Artwork</label>
          <?php if ($post['name_artwork']) { ?>
            <input type="hidden" name="oldImage" value="<?= $post['name_artwork'] ?>">
            <img class="img-preview img-fluid mb-3 col-sm-6">
            <img src="<?= base_url('assets/'); ?>img/artwork/<?= $post['name_artwork']; ?>" class="img-preview img-fluid mb-3 col-sm-6 d-block">
          <?php } else { ?>
            <img class="img-preview img-fluid mb-3 col-sm-6">
          <?php }  ?>
          <input class="form-control col-md-8" type="file" id="artwork" name="artwork" onchange="previewImage()">
        </div>
      </div>

      <div class="col-md-8">
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          <?= form_error('body', '<small class="text-danger mb-3">', '</small>'); ?>
          <input id="body" type="hidden" name="body" value="<?= set_value($post['body']); ?>">
          <trix-editor input="body">
            <?= $post['body']; ?>
          </trix-editor>
        </div>
      </div>

    </div>
    <button type="submit" class="btn btn-primary">Update Post</button>

  </form>

</div>