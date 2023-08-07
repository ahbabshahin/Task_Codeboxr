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

      public function index()
      {
            $query = "SELECT * from `task`";

            $result = $this->db->select($query);

            if (!$result) {
                  echo "<h1>No data found</h1>";
            }
            return $result;
      }

      public function edit($id)
      {
            $query = "SELECT * from `task` WHERE `id`='$id'";

            $result = $this->db->select($query);

            if (!$result) {
                  echo "<h1>No data found</h1>";
                  // exit();
            }
            return $result;
      }

      public function update($data, $id)
      {
            $title = $data['title'];
            $content = $data['content'];
            $status = $data['status'];

            $query = "UPDATE `task` SET `title`='$title',`content`='$content',`status`='$status' WHERE `id`='$id'";

            $result = $this->db->insert($query);
            $msg = ($result) ? 'Update successful' : 'Update failed';
            return $msg;
            header("Location: index.php");
            // header("Location: index.php");
      }

      public function delete($id)
      {
            $query = "DELETE FROM `task` WHERE `id`='$id'";
            $result = $this->db->delete($query);
            $msg = ($result) ? 'Deletion successful' : 'Deletion failed';
            return $msg;
      }
}
