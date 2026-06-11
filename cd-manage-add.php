<?php
require('header.php');
$db = new PDO("mysql:host=localhost;dbname=project", "root", "");

if(isset($_POST['cd_name'], $_POST['cd_price'], $_POST['artist_name'], $_POST['type_name'])) {
    $cd_name = $_POST['cd_name'];
    $cd_price = $_POST['cd_price'];
    $artist_name = $_POST['artist_name'];
    $type_name = $_POST['type_name'];

  $query = "INSERT INTO project.cd (name, price, artist_id, type_id) 
          VALUES (:cd_name, :cd_price, :artist_id, :type_id)";

$stmt = $db->prepare($query);
$stmt->execute([
    ":cd_name" => $cd_name,
    ":cd_price" => $cd_price,
    ":artist_id" => $artist_name,  
    ":type_id" => $type_name,      
    
]);

    header("Location: cd-manage.php");
    exit;
}
$artistStmt = $db->query("SELECT id, name FROM artists");
$artists = $artistStmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch types
$typeStmt = $db->query("SELECT id, name FROM types");
$types = $typeStmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Project</title>
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
        background: #c5f0ff80;
      }
      .merriweather {
  font-family: "Merriweather", serif;
  font-optical-sizing: auto;
  font-weight: <weight>;
  font-style: normal;
  font-variation-settings:
    "wdth" 100;
}
    </style>
  </head>
  <body>

    <div class="container merriweather mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Add New CD</h1>
      </div>
      <div class="card mb-2 p-4">
        <form method="POST" >
          <div class="mb-3">
            <label for="cd_name" class="form-label">CD Name</label>
            <input type="text" class="form-control" id="cd_name" name="cd_name" />
          </div>

          <div class="mb-3">
            <label for="cd_image" class="form-label">CD IMG</label>
            <input type="text" class="form-control" id="cd_image" name="cd_image" />
          </div>

          <div class="mb-3">
            <label for="cd_price" class="form-label">Price</label>
            <input type="text" class="form-control" id="cd_price" name="cd_price" />
          </div>

       <div class="mb-3">
    <label for="artist_name" class="form-label">Artist</label>
    <select id="artist_name" name="artist_name" class="form-select" required>
      <option value="">-- Select Artist --</option>
      <?php foreach ($artists as $artist): ?>
        <option value="<?= $artist['id'] ?>"><?= htmlspecialchars($artist['name']) ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="type_name" class="form-label">Type</label>
    <select id="type_name" name="type_name" class="form-select" required>
      <option value="">-- Select Type --</option>
      <?php foreach ($types as $type): ?>
        <option value="<?= $type['id'] ?>"><?=$type['name'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
        <input type="hidden" name="post_by" value="1">
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
      <div class="text-center">
        <a href="cd-manage.php" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to CD</a
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