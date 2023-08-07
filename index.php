<?php
include_once 'controller/Store.php';

$store = new Store();

if (isset($_GET['id'])) {
      $id = base64_decode($_GET['id']);
      $dlt = $store->delete($id);
}
?>

<!doctype html>
<html lang="en">

<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

      <title>Read</title>
</head>

<body>
      <!-- <h1>Hello, world!</h1> -->
      <?php
      include_once "navbar.php";

      ?>
      <br>
      <div class="container">
            <div class="row d-flex justify-content-center">
                  <div class="col-md-10">
                        <div class="card shadow">
                              <div class="card-header">
                                    <div class="row">
                                          <div class="col-md-6">
                                                <h1>Task Read</h1>
                                          </div>
                                          <div class="col-md-6">
                                                <a class="btn btn-primary float-right"
                                                      href="/task/create.php">Create</a>
                                          </div>
                                    </div>

                              </div>

                              <div class="card-body">
                                    <?php
                                    if (isset($dlt)) {
                                    ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                          <strong><?= $dlt ?></strong>
                                          <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                    </div>
                                    <?php
                                    }
                                    ?>

                                    <table class="table table-striped">
                                          <thead>
                                                <tr>
                                                      <th scope="col">#</th>
                                                      <th scope="col">Title</th>
                                                      <th scope="col">Content</th>
                                                      <th scope="col">Status</th>
                                                      <th scope="col">Action</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                <?php

                                                $ind = $store->index();

                                                if ($ind) {
                                                      while ($row = mysqli_fetch_assoc($ind)) {
                                                ?>
                                                <tr>
                                                      <th scope="row"><?= $row['id'] ?></th>
                                                      <td><?= $row['title'] ?></td>
                                                      <td><?= $row['content'] ?></td>
                                                      <?php if ($row['status'] == '1') { ?>
                                                      <td>Agreed</td>
                                                      <?php } ?>
                                                      <?php if ($row['status'] == '0') { ?>
                                                      <td>Disagree</td>
                                                      <?php } ?>
                                                      <td><a class="btn btn-success"
                                                                  href="/task/edit.php?id=<?= base64_encode($row['id']) ?>">Edit</a>
                                                            <a class="btn btn-danger"
                                                                  onclick="return confirm('Are you sure?')"
                                                                  href="?id=<?= base64_encode($row['id']) ?>">Delete</a>
                                                      </td>

                                                </tr>
                                                <?php
                                                      }
                                                }

                                                ?>


                                          </tbody>
                                    </table>

                              </div>
                        </div>
                  </div>

            </div>

      </div>


      <!-- Optional JavaScript; choose one of the two! -->

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
      </script>

</body>

</html>