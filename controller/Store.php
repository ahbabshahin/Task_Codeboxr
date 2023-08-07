<?php
include_once 'db/Database.php';
class Store
{
      public $db;

      public function __construct()
      {
            $this->db = new Database();
      }

      public function add($data)
      {
            $title = $data['title'];
            $content = $data['content'];
            $status = $data['status'];

            if (empty($title) || empty($content)) {
                  $msg = 'Fields must not be empty';
                  return $msg;
            }
      }
}