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
            } else {
                  $query = "INSERT INTO `task`(`title`, `content`, `status`) VALUES('$title', '$content', '$status')";

                  $result = $this->db->insert($query);
                  $msg = ($result) ? 'Insertion successful' : 'Insertion failed';

                  return $msg;
            }
      }
}
