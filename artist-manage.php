<?php
require('header.php');
if(isset($_POST['id'])){
  $id = $_POST['id'];

  $stmt = $db->prepare();
  $stmt->execute([":id"=>$id]);
}

$query = "SELECT * FROM artists ORDER BY id ASC";

$stmt = $db->prepare($query);
$stmt->execute([]);
$artists = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html>

<head>
  <title>Project</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
    crossorigin="anonymous" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
  <style type="text/css">
    body {
      background: #f1f1f1;
    }
  </style>
</head>

<body>
  <div class="container mx-auto my-5" style="max-width: 700px;">
    <div class="d-flex justify-content-between align-items-center mb-2">
      <h1 class="h1">Manage Posts</h1>
      <div class="text-end">
        <a href="artists-manage-add.php" class="btn btn-primary btn-sm">+ Add New Type</a>
      </div>
    </div>
    <div class="card mb-2 p-3">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col" style="width: 40%;">Type</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($artists as $type): ?>
                <tr>
                    <th scope="row"><?= $type['id'] ?></th>
                    <td><?= $type['name'] ?></td>
                        
                </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    </div>
        <div class="text-center">
        <a href="dashboard.php" class="btn btn-link btn-sm"><i class="bi bi-arrow-left"></i> Back to Dashboard</a>
        </div>
 </div>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>