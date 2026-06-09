<?php
require('header.php');
$id = $_GET['id'] ?? null;

if ($id) {
    $query = "SELECT * FROM cd WHERE id=:id";
    $stmt = $db->prepare($query);
    $stmt->execute([':id' => $id]);
    $cd = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cd_image = $_POST['cd_image'];
    $cd_name = $_POST['cd_name'];
    $artist_id = $_POST['artist_name'];
    $type_id = $_POST['type_name'];
    $id = $_POST['id'];

    $query = "UPDATE cd 
              SET cd_image=:cd_image, name=:cd_name, artist_id=:artist_id, type_id=:type_id 
              WHERE id=:id";
    $stmt = $db->prepare($query);
    $stmt->execute([
        ":cd_image"   => $cd_image,
        ":cd_name"    => $cd_name,
        ":artist_id"  => $artist_id,
        ":type_id"    => $type_id,
        ":id"         => $id
    ]);
    header("Location: cd-manage.php");
    exit();
}

$artistStmt = $db->query("SELECT id, name FROM artists");
$artists = $artistStmt->fetchAll(PDO::FETCH_ASSOC);

$typeStmt = $db->query("SELECT id, name FROM types");
$types = $typeStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Simple CMS</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
    <style type="text/css">
      body {
        background: #f1f1f1;
      }
    </style>
  </head>
  <body>
    <div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Edit User</h1>
      </div>
      <div class="card mb-2 p-4">
        <form method="POST">
          <div class="mb-3">
            <div class="row">
              <div class="">
                <label for="cd_image" class="form-label">CD Image</label>
                <input type="text" class="form-control" id="username" name="cd_image" value="<?= $cd['cd_image'] ?>" />
              </div>
              <div class="">
                <label for="cd_name" class="form-label">CD Name</label>
             <input type="text" class="form-control" name="cd_name" value="<?= $cd['name'] ?>" />
              </div>
               
            </div>
          </div>
          <div class="mb-3">
            <label for="artist_name" class="form-label">Artist</label>
         <select id="artist_name" name="artist_name" class="form-select" >
  <option value="">-- Select Artist --</option>
  <?php foreach ($artists as $artist): ?>
    <option value="<?= $artist['id'] ?>" <?= ($cd['artist_id'] == $artist['id']) ? 'selected' : '' ?>>
      <?= $artist['name'] ?>
    </option>
  <?php endforeach; ?>
</select>
</div>

<div class="mb-3">
    <label for="type_name" class="form-label">Type</label>
    <select id="type_name" name="type_name" class="form-select" required>
      <option value="">-- Select Type --</option>
      <?php foreach ($types as $type): ?>
        <option value="<?= $type['id'] ?>" <?= ($cd['type_id'] == $type['id']) ? 'selected' : '' ?>>
            <?= $type['name'] ?>
        </option>
      <?php endforeach; ?>
    </select>
</div>
            <input type="hidden" name="id" value="<?= $id ?>">
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
      <div class="text-center">
        <a href="manage-users.php" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Users</a
        >
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
    
</body>

</html>
  </body>
</html>
