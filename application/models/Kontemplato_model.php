<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontemplato_model extends CI_Model
{
  public function getCategories()
  {
    return $this->db->get('categories')->result_array();
  }

  public function getVolumes()
  {
    return $this->db->get('volumes')->result_array();
  }

  public function getWriters()
  {
    return $this->db->get('writers')->result_array();
  }

  public function getIllustrators()
  {
    return $this->db->get('illustrators')->result_array();
  }

  public function countPosts()
  {
    return $this->db->get('posts')->num_rows();
  }

  public function getAllPosts($limit, $start, $keyword = null)
  {
    if ($keyword) {
      $query = "SELECT `categories`.`id`, `categories`.`category`,
                      `writers`.`id`, `writers`.`writer`,
                      `illustrators`.`id`, `illustrators`.`illustrator`,
                      `posts`.`id`, `posts`.`category_id`, `posts`.`writer_id`, `posts`.`illustrator_id`, `posts`.`title`, `posts`.`slug`, `posts`.`created_at`, `posts`.`updated_at`
              FROM `posts` JOIN `categories` ON `categories`.`id` = `posts`.`category_id` 
              JOIN `writers` ON `writers`.`id` = `posts`.`writer_id` 
              JOIN `illustrators` ON `illustrators`.`id` = `posts`.`illustrator_id`
              WHERE `posts`.`title` LIKE '%$keyword%'
                OR `writers`.`writer` LIKE '%$keyword%'
                OR `categories`.`category` LIKE '%$keyword%'
              ORDER BY `posts`.`created_at` DESC";

      return $this->db->query($query)->result_array();
    }

    $this->db->select('categories.id, categories.category, 
                      writers.id, writers.writer,
                      illustrators.id, illustrators.illustrator,
                      posts.id, posts.category_id, posts.writer_id, posts.illustrator_id, posts.title, posts.slug,  posts.created_at, posts.updated_at');
    $this->db->from('posts');
    $this->db->join('categories', 'categories.id = posts.category_id');
    $this->db->join('writers', 'writers.id = posts.writer_id');
    $this->db->join('illustrators', 'illustrators.id = posts.illustrator_id');
    $this->db->order_by('posts.created_at', 'DESC');

    $this->db->limit($limit)->offset($start);
    return $this->db->get()->result_array();
  }

  public function getPostBySlug($slug)
  {
    $query = "SELECT `categories`.`id`, `categories`.`category`,
                      `writers`.`id`, `writers`.`writer`,
                      `illustrators`.`id`, `illustrators`.`illustrator`,
                      `file_artwork`.`name_artwork`, `file_artwork`.`post_id`,
                      `posts`.`id`, `posts`.`category_id`, `posts`.`writer_id`, `posts`.`illustrator_id`, `posts`.`title`, `posts`.`slug`, `posts`.`tagline`, `posts`.`body`, `posts`.`created_at`
              FROM `posts` JOIN `categories` ON `categories`.`id` = `posts`.`category_id` 
              JOIN `writers` ON `writers`.`id` = `posts`.`writer_id` 
              JOIN `illustrators` ON `illustrators`.`id` = `posts`.`illustrator_id`
              JOIN `file_artwork` ON `file_artwork`.`post_id` = `posts`.`id`
              WHERE `posts`.`slug` = '$slug'";

    return $this->db->query($query)->row_array();
  }

  public function getKontemplatoHl()
  {
    $query = "SELECT `posts`.`id`, `posts`.`category_id`, `posts`.`writer_id`, `posts`.`illustrator_id`, `posts`.`volume_id`, `posts`.`is_highlight`, `posts`.`title`, `posts`.`slug`, `posts`.`tagline`, `posts`.`body`, `posts`.`created_at`, `posts`.`updated_at`,
                    `writers`.`id`, `writers`.`writer`,
                    `categories`.`id`, `categories`.`category`,
                    `illustrators`.`id`, `illustrators`.`illustrator`,
                    `volumes`.`id`, `volumes`.`volume`,
                    `file_artwork`.`name_artwork`, `file_artwork`.`post_id`,
                    `file_cover`.`name_cover`, `file_cover`.`post_id`
              FROM `posts` JOIN `categories` ON `posts`.`category_id` = `categories`.`id` 
              JOIN `writers` ON `posts`.`writer_id` = `writers`.`id` 
              JOIN `illustrators` ON `posts`.`illustrator_id` = `illustrators`.`id` 
              JOIN `volumes` ON `posts`.`volume_id` = `volumes`.`id`
              JOIN `file_artwork` ON `file_artwork`.`post_id` = `posts`.`id`
              JOIN `file_cover` ON `file_cover`.`post_id` = `posts`.`id`
              WHERE `categories`.`category` = 'kontemplato'
                AND `posts`.`is_highlight` = 1
              ORDER BY `posts`.`created_at` DESC LIMIT 1";

    return $this->db->query($query)->result_array();
  }

  public function getEssayHl()
  {
    $query = "SELECT `writers`.`id`, `writers`.`writer`,
                    `categories`.`id`, `categories`.`category`,
                    `illustrators`.`id`, `illustrators`.`illustrator`,
                    `file_artwork`.`name_artwork`, `file_artwork`.`post_id`,
                    `posts`.`id`, `posts`.`category_id`, `posts`.`writer_id`, `posts`.`illustrator_id`, `posts`.`volume_id`, `posts`.`title`, `posts`.`slug`, `posts`.`tagline`, `posts`.`created_at`, `posts`.`updated_at`
              FROM `posts` JOIN `categories` ON `posts`.`category_id` = `categories`.`id` 
              JOIN `writers` ON `posts`.`writer_id` = `writers`.`id` 
              JOIN `illustrators` ON `posts`.`illustrator_id` = `illustrators`.`id`
              JOIN `file_artwork` ON `file_artwork`.`post_id` = `posts`.`id`
              WHERE `categories`.`category` = 'ornamen'
              ORDER BY `posts`.`created_at` DESC LIMIT 1";

    return $this->db->query($query)->result_array();
  }

  public function getAllKontemplato()
  {
    $query = "SELECT `writers`.`id`, `writers`.`writer`,
                    `categories`.`id`, `categories`.`category`,
                    `volumes`.`id`, `volumes`.`volume`,
                    `file_artwork`.`id`, `file_artwork`.`name_artwork`,
                    `posts`.`id`, `posts`.`category_id`, `posts`.`writer_id`, `posts`.`volume_id`, `posts`.`title`, `posts`.`tagline`, `posts`.`slug`, `posts`.`created_at`, `posts`.`updated_at`
              FROM `posts` JOIN `categories` ON `posts`.`category_id` = `categories`.`id` 
              JOIN `writers` ON `posts`.`writer_id` = `writers`.`id` 
              JOIN `volumes` ON `posts`.`volume_id` = `volumes`.`id`
              JOIN `file_artwork` ON `file_artwork`.`post_id` = `posts`.`id`
              WHERE `categories`.`category` = 'kontemplato' 
              ORDER BY `posts`.`created_at` DESC LIMIT 3";

    return $this->db->query($query)->result_array();
  }

  public function getAllEssay()
  {
    $query = "SELECT `writers`.`id`, `writers`.`writer`,
                    `categories`.`id`, `categories`.`category`,
                    `illustrators`.`id`, `illustrators`.`illustrator`,
                    `file_artwork`.`name_artwork`, `file_artwork`.`post_id`,
                    `posts`.`id`, `posts`.`category_id`, `posts`.`writer_id`, `posts`.`illustrator_id`, `posts`.`volume_id`, `posts`.`title`, `posts`.`slug`, `posts`.`tagline`, `posts`.`created_at`, `posts`.`updated_at`
              FROM `posts` JOIN `categories` ON `posts`.`category_id` = `categories`.`id` 
              JOIN `writers` ON `posts`.`writer_id` = `writers`.`id` 
              JOIN `illustrators` ON `posts`.`illustrator_id` = `illustrators`.`id`
              JOIN `file_artwork` ON `file_artwork`.`post_id` = `posts`.`id`
              WHERE `categories`.`category` = 'ornamen' 
              ORDER BY `posts`.`created_at` DESC LIMIT 4 OFFSET 1";

    return $this->db->query($query)->result_array();
  }

  public function getAllEssayBlock()
  {
    $query = "SELECT `writers`.`id`, `writers`.`writer`,
                    `categories`.`id`, `categories`.`category`,
                    `illustrators`.`id`, `illustrators`.`illustrator`,
                    `file_artwork`.`name_artwork`, `file_artwork`.`post_id`,
                    `posts`.`id`, `posts`.`category_id`, `posts`.`writer_id`, `posts`.`illustrator_id`, `posts`.`volume_id`, `posts`.`title`, `posts`.`slug`, `posts`.`tagline`, `posts`.`created_at`, `posts`.`updated_at`
              FROM `posts` JOIN `categories` ON `posts`.`category_id` = `categories`.`id` 
              JOIN `writers` ON `posts`.`writer_id` = `writers`.`id` 
              JOIN `illustrators` ON `posts`.`illustrator_id` = `illustrators`.`id`
              JOIN `file_artwork` ON `file_artwork`.`post_id` = `posts`.`id`
              WHERE `categories`.`category` = 'ornamen' 
              ORDER BY `posts`.`created_at` DESC LIMIT 4";

    return $this->db->query($query)->result_array();
  }

  public function getKontemplatoById($slug)
  {
    $query = "SELECT `posts`.*,
                      `file_artwork`.`post_id`, `file_artwork`.`name_artwork`,
                      `writers`.`id`, `writers`.`writer`,
                      `categories`.`id`, `categories`.`category`,
                      `illustrators`.`id`, `illustrators`.`illustrator`,
                      `volumes`.`id`, `volumes`.`volume`
              FROM `posts` JOIN `categories` ON `posts`.`category_id` = `categories`.`id` 
              JOIN `writers` ON `posts`.`writer_id` = `writers`.`id` 
              JOIN `file_artwork` ON `posts`.`id` = `file_artwork`.`post_id`
              JOIN `illustrators` ON `illustrators`.`id` = `posts`.`illustrator_id`
              JOIN `volumes` ON `posts`.`volume_id` = `volumes`.`id`
              WHERE `posts`.`slug` = '$slug'";

    return $this->db->query($query)->row_array();
  }

  public function getEssayById($slug)
  {
    $query = "SELECT `posts`.*,
                      `categories`.`id`, `categories`.`category`,
                      `file_artwork`.`post_id`, `file_artwork`.`name_artwork`,
                      `writers`.`id`, `writers`.`writer`,
                      `illustrators`.`id`, `illustrators`.`illustrator`
              FROM `posts` 
              JOIN `categories` ON `categories`.`id` = `posts`.`category_id` 
              JOIN `writers` ON `writers`.`id` = `posts`.`writer_id` 
              JOIN `file_artwork` ON `file_artwork`.`post_id` = `posts`.`id`
              JOIN `illustrators` ON `illustrators`.`id` = `posts`.`illustrator_id`
              WHERE `posts`.`slug` = '$slug'";

    return $this->db->query($query)->row_array();
  }

  public function getComicBySlug($slug)
  {
    $query = "SELECT `posts`.`id`, `posts`.`slug`,
                      `file_comic`.`post_id`, `file_comic`.`slug`, `file_comic`.`name_comic`,
                      `illustrators`.`id`, `illustrators`.`illustrator`
              FROM `posts`
              JOIN `file_comic` ON `file_comic`.`slug` = `posts`.`slug`
              JOIN `illustrators` ON `illustrators`.`id` = `file_comic`.`illustrator_id`
              WHERE `posts`.`slug` = '$slug'";

    return $this->db->query($query)->result_array();
  }
}
