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
        background: #fadf86;
      }
      .merriweather {
        font-family: "Merriweather", serif;
      }
     
    </style>
  </head>
  <body>
    <div class="container merriweather mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-center align-items-center mb-4">
        <h1 class="h1">Edit CD Info</h1>
      </div>

      <form method="POST">
        <div class="row g-4 d-flex justify-content-center">
          <div class="col-12 d-flex justify-content-center align-items-center">
            
            <div class="card p-3" style="width: 30rem; height: 38rem;">
              <h1>
              <div class="" style="margin:50px;">
                <label for="cd_image" class="form-label fw-bold small"><i class="bi bi-image"></i> CD Image URL</label>
                <input type="text" class="form-control" name="cd_image"  value="<?= $cd['cd_image'] ?>" />
              </div>
            </h1>

              <div class="card-body d-flex flex-column justify-content-between"> 
                <div>
                  <h1 class="card-title h4 mb-3">
                    <label for="cd_price" class="form-label fw-bold small d-block"><i class="bi bi-tag-fill"></i> Cd Price</label>
                    <input type="text" class="form-control" name="cd_price" value="<?= $cd['price'] ?>" />
                  </h1>
                  
                  <h1 class="card-title h4 mb-3">
                      <label for="cd_name" class="form-label fw-bold small d-block">CD Name</label>
             <input type="text" class="form-control" name="cd_name" value="<?= $cd['name'] ?>" />
                  </h1>
                
                  <div class="card-text mb-3">
                    <div class="row g-2">
                      <div class="col-6">
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
                      
                      <div class="col-6">
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
                    </div>
                  </div>
                </div>
                </p>
                <div class="text-end mt-auto">
                  <button type="submit" class="btn btn-warning w-100">Update</button>
                </div>

              </div>
            </div>

          </div>
        </div>
      </form>

      <div class="text-center mt-4">
        <a href="cd-manage.php" class="btn btn-link btn-sm text-decoration-none">
          <i class="bi bi-arrow-left"></i> Back to CD
        </a>
      </div>
    </div>
       
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
  