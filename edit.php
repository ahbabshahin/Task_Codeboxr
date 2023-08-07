<?php
include_once 'controller/Store.php';

$store = new Store();

if (isset($_GET['id'])) {
      $id = base64_decode($_GET['id']);
      // echo $id;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $st = $store->update($_POST, $id);
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

      <title>Update</title>
</head>

<body>
      <!-- <h1>Hello, world!</h1> -->
      <?php
      include_once "navbar.php";

      ?>
      <br>
      <div class="container">
            <div class="row d-flex justify-content-center">
                  <div class="col-md-7">
                        <div class="card shadow">
                              <div class="card-header">
                                    <h1>Task Update</h1>
                              </div>

                              <div class="card-body">
                                    <?php
                                    if (isset($st)) {
                                    ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                          <strong><?= $st ?></strong>
                                          <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                    </div>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    $info = $store->edit($id);
                                    if ($info) {
                                          while ($row = mysqli_fetch_assoc($info)) {
                                    ?>
                                    <form method="post">
                                          <div class="mb-3">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text" name="title" class="form-control" id="title"
                                                      value="<?= $row['title'] ?>" aria-describedby="emailHelp">

                                          </div>
                                          <div class="mb-3">
                                                <label for="content" class="form-label">Content</label>
                                                <textarea type="text" class="form-control" name="content"
                                                      id="content"><?= $row['content'] ?></textarea>
                                          </div>

                                          <div class="mb-3 form-check">
                                                <input type="radio" name="status" class="form-check-input"
                                                      id="exampleCheck1" checked value="1">
                                                <label class="form-check-label" for="exampleCheck1">I agree</label>

                                          </div>
                                          <div class="mb-3 form-check">
                                                <input type="radio" name="status" class="form-check-input"
                                                      id="exampleCheck1" value="0">
                                                <label class="form-check-label" for="exampleCheck1">I strongly
                                                      disagree</label>

                                          </div>

                                          <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                                    <?php
                                          }
                                    }
                                    ?>

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