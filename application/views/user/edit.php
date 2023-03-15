<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <div class="row">
    <div class="col-md-8">
      <form action="<?= base_url('user/edit/') . $post['id']; ?>" method="post">
        <input type="hidden" name="id" value="<?= $post['id']; ?>">
        <div class="mb-3 row">
          <label for="title" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" value="<?= $post['title']; ?>">
            <?= form_error('title', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="tagline" class="col-sm-2 col-form-label">Tagline</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="tagline" name="tagline" value="<?= $post['tagline']; ?>">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="body" class="col-sm-2 col-form-label mb-2">Body</label>
          <?= form_error('body', '<small class="text-danger mb-3">', '</small>'); ?>
          <input id="body" type="hidden" name="body" value="<?= $post['body']; ?>">
          <trix-editor input="body"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Post</button>
      </form>
    </div>
  </div>

</div>