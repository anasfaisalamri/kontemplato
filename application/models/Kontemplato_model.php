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
                      posts.id, posts.category_id, posts.writer_id, posts.illustrator_id, posts.title, posts.created_at, posts.updated_at');
    $this->db->from('posts');
    $this->db->join('categories', 'categories.id = posts.category_id');
    $this->db->join('writers', 'writers.id = posts.writer_id');
    $this->db->join('illustrators', 'illustrators.id = posts.illustrator_id');
    $this->db->order_by('posts.created_at', 'DESC');

    $this->db->limit($limit)->offset($start);
    return $this->db->get()->result_array();
  }

  public function getPostById($id)
  {
    $query = "SELECT `categories`.`id`, `categories`.`category`,
                      `writers`.`id`, `writers`.`writer`,
                      `illustrators`.`id`, `illustrators`.`illustrator`,
                      `file_artwork`.`name_artwork`, `file_artwork`.`post_id`,
                      `posts`.`id`, `posts`.`category_id`, `posts`.`writer_id`, `posts`.`illustrator_id`, `posts`.`title`, `posts`.`tagline`, `posts`.`body`, `posts`.`created_at`
              FROM `posts` JOIN `categories` ON `categories`.`id` = `posts`.`category_id` 
              JOIN `writers` ON `writers`.`id` = `posts`.`writer_id` 
              JOIN `illustrators` ON `illustrators`.`id` = `posts`.`illustrator_id`
              JOIN `file_artwork` ON `file_artwork`.`post_id` = `posts`.`id`
              WHERE `posts`.`id` = $id";

    return $this->db->query($query)->row_array();
  }



  public function getAllMagazine()
  {
    $query = "SELECT `posts`.`id`, `posts`.`category_id`, `posts`.`writer_id`, `posts`.`illustrator_id`, `posts`.`volume_id`, `posts`.`title`, `posts`.`slug`, `posts`.`created_at`, `posts`.`updated_at`,
                    `writers`.`id`, `writers`.`writer`,
                    `categories`.`id`, `categories`.`category`,
                    `illustrators`.`id`, `illustrators`.`illustrator`,
                    `volumes`.`id`, `volumes`.`volume`
              FROM `posts` JOIN `categories` ON `posts`.`category_id` = `categories`.`id` 
              JOIN `writers` ON `posts`.`writer_id` = `writers`.`id` 
              JOIN `illustrators` ON `posts`.`illustrator_id` = `illustrators`.`id` 
              JOIN `volumes` ON `posts`.`volume_id` = `volumes`.`id`
              WHERE `categories`.`category` = 'kontemplato' 
              ORDER BY `posts`.`created_at` DESC";

    return $this->db->query($query)->result_array();
  }

  public function getAllOrnamen()
  {
    $query = "SELECT `posts`.`id`, `posts`.`category_id`, `posts`.`writer_id`, `posts`.`illustrator_id`, `posts`.`volume_id`, `posts`.`title`, `posts`.`slug`, `posts`.`created_at`, `posts`.`updated_at`,
                    `writers`.`id`, `writers`.`writer`,
                    `categories`.`id`, `categories`.`category`,
                    `illustrators`.`id`, `illustrators`.`illustrator`
              FROM `posts` JOIN `categories` ON `posts`.`category_id` = `categories`.`id` 
              JOIN `writers` ON `posts`.`writer_id` = `writers`.`id` 
              JOIN `illustrators` ON `posts`.`illustrator_id` = `illustrators`.`id` 
              WHERE `categories`.`category` = 'ornamen' 
              ORDER BY `posts`.`created_at` DESC";

    return $this->db->query($query)->result_array();
  }
}
