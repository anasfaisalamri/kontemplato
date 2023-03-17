<?php

function insertPost($validatedData, $artwork, $cover, $comic)
{
  $ci = get_instance();
  $ci->db->trans_begin();
  $ci->load->library('upload');

  $postsData = [
    'category_id' => $validatedData['category_id'],
    'writer_id' => $validatedData['writer_id'],
    'illustrator_id' => $validatedData['illustrator_id'],
    'volume_id' => $validatedData['volume_id'],
    'is_highlight' => $validatedData['is_highlight'],
    'title' => $validatedData['title'],
    'tagline' => $validatedData['tagline'],
    'body' => $validatedData['body'],
    'theme' => $validatedData['theme'],
    'created_at' => $validatedData['created_at'],
    'updated_at' => $validatedData['created_at'],
  ];

  $ci->db->insert('posts', $postsData);
  $last_id = $ci->db->insert_id();

  if (!empty($artwork)) {
    uploadArtwork($last_id, $postsData['illustrator_id'], $postsData['created_at']);
  }

  if (!empty($cover)) {
    uploadCover($last_id, $postsData['illustrator_id'], $postsData['created_at']);
  } else {
    return;
  }

  if (!empty($comic)) {
    uploadComic($last_id, $postsData['illustrator_id'], $postsData['created_at']);
  } else {
    return;
  }
}

function uploadArtwork($last_id, $illustrator, $date)
{
  $ci = get_instance();

  $config['allowed_types'] = 'jpg|jpeg|png';
  $config['max_size'] = '1024';
  $config['upload_path'] = './assets/img/artwork/';
  $config['file_name'] = 'kontemplato_artwork_' . uniqid();

  $ci->upload->initialize($config);

  if ($ci->upload->do_upload('artwork')) {
    $data = [
      'name_artwork' => $ci->upload->data('file_name'),
      'extension' => $ci->upload->data('file_ext'),
      'size' => $ci->upload->data('file_size'),
      'post_id' => $last_id,
      'illustrator_id' => $illustrator,
      'created_at' => $date,
      'updated_at' => $date
    ];

    $ci->db->insert('file_artwork', $data);
  } else {
    $error = $ci->upload->display_errors();
    $ci->session->set_flashdata('artwork', '<div class="alert alert-danger mt-3" role="alert">' . $error . '</div>');
    redirect('posts/create');
  }
}

function uploadCover($last_id, $illustrator, $date)
{
  $ci = get_instance();

  $config['allowed_types'] = 'jpg|jpeg|png';
  $config['max_size'] = '1024';
  $config['upload_path'] = './assets/img/cover/';
  $config['file_name'] = 'kontemplato_cover_' . uniqid();

  $ci->upload->initialize($config);

  if ($ci->upload->do_upload('cover')) {
    $data = [
      'name_cover' => $ci->upload->data('file_name'),
      'extension' => $ci->upload->data('file_ext'),
      'size' => $ci->upload->data('file_size'),
      'post_id' => $last_id,
      'illustrator_id' => $illustrator,
      'created_at' => $date,
      'updated_at' => $date
    ];

    $ci->db->insert('file_cover', $data);
  } else {
    $error = $ci->upload->display_errors();
    $ci->session->set_flashdata('artwork', '<div class="alert alert-danger mt-3" role="alert">' . $error . '</div>');
    redirect('posts/create');
  }
}

function uploadComic($last_id, $illustrator, $date)
{
  $ci = get_instance();

  $config['allowed_types'] = 'jpg|jpeg|png';
  $config['upload_path'] = './assets/img/comic/';

  foreach ($_FILES["comic"]['name'] as $key => $val) {
    $_FILES['comic[]']['name'] = $_FILES["comic"]['name'][$key];
    $_FILES['comic[]']['type'] = $_FILES["comic"]['type'][$key];
    $_FILES['comic[]']['tmp_name'] = $_FILES["comic"]['tmp_name'][$key];
    $_FILES['comic[]']['error'] = $_FILES["comic"]['error'][$key];
    $_FILES['comic[]']['size'] = $_FILES["comic"]['size'][$key];

    $config['file_name'] = 'kontemplato_comic_' . uniqid();

    $ci->upload->initialize($config);

    if ($ci->upload->do_upload('comic[]')) {
      $data = [
        'name_comic' => $ci->upload->data('file_name'),
        'extension' => $ci->upload->data('file_ext'),
        'size' => $ci->upload->data('file_size'),
        'post_id' => $last_id,
        'illustrator_id' => $illustrator,
        'created_at' => $date,
        'updated_at' => $date
      ];

      $ci->db->insert('file_comic', $data);
    } else {
      $error = $ci->upload->display_errors();
      $ci->session->set_flashdata('artwork', '<div class="alert alert-danger mt-3" role="alert">' . $error . '</div>');
      redirect('posts/create');
    }
  }
}

function updatePost($validatedData)
{
  $ci = get_instance();
  $updated_at = date('Y-m-d H:i:s');

  $ci->db->set('category_id', $validatedData['category_id']);
  $ci->db->set('writer_id', $validatedData['writer_id']);
  $ci->db->set('illustrator_id', $validatedData['illustrator_id']);
  $ci->db->set('title', $validatedData['title']);
  $ci->db->set('tagline', $validatedData['tagline']);
  $ci->db->set('body', $validatedData['body']);
  $ci->db->set('updated_at', $updated_at);
  $ci->db->where('id', $validatedData['id']);
  $ci->db->update('posts');
}

function updateArtwork($id, $old_image)
{
  $ci = get_instance();

  $config['allowed_types'] = 'jpg|jpeg|png';
  $config['max_size'] = '1024';
  $config['upload_path'] = './assets/img/artwork/';
  $config['file_name'] = 'kontemplato_artwork_' . uniqid();

  $ci->load->library('upload', $config);

  if ($ci->upload->do_upload('artwork')) {
    $old_image = $old_image;
    if ($old_image != 'artwork.jpg') {
      unlink(FCPATH . 'assets/img/artwork/' . $old_image);
    }

    $new_image = $ci->upload->data('file_name');
    $extension = $ci->upload->data('file_ext');
    $size = $ci->upload->data('file_size');
    $updated_at = date('Y-m-d H:i:s');

    $ci->db->set('name_artwork', $new_image);
    $ci->db->set('extension', $extension);
    $ci->db->set('size', $size);
    $ci->db->set('updated_at', $updated_at);
    $ci->db->where('post_id', $id);
    $ci->db->update('file_artwork');
  } else {
    $display_error = $ci->upload->display_errors();
    $ci->session->set_flashdata('message', '<div class="alert alert-danger mt-3" role="alert">' . $display_error . '</div>');
    redirect('posts/edit');
  }
}
