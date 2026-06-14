<?php
require('header.php');
$db = new PDO("mysql:host=localhost;dbname=project", "root", "");


if(isset($_POST['cd_name'], $_POST['cd_price'], $_POST['artist_name'], $_POST['type_name'], $_POST['cd_image'])) {
    $cd_name = $_POST['cd_name'];
    $cd_price = $_POST['cd_price'];
    $artist_name = $_POST['artist_name'];
    $type_name = $_POST['type_name'];
    $cd_image = $_POST['cd_image']; 
  
    $query = "INSERT INTO project.cd (name, price, artist_id, type_id, cd_image) 
              VALUES (:cd_name, :cd_price, :artist_id, :type_id, :cd_image)";

    $stmt = $db->prepare($query);
    $stmt->execute([
        ":cd_name" => $cd_name,
        ":cd_price" => $cd_price,
        ":artist_id" => $artist_name,  
        ":type_id" => $type_name,      
        ":cd_image" => $cd_image      
    ]);

    header("Location: cd-manage.php");
    exit;
}

//  artists
$artistStmt = $db->query("SELECT id, name FROM artists");
$artists = $artistStmt->fetchAll(PDO::FETCH_ASSOC);

//  types
$typeStmt = $db->query("SELECT id, name FROM types");
$types = $typeStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Add New CD</title>
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
        <h1 class="h1">Add New CD</h1>
      </div>

      <form method="POST">
        <div class="row g-4 d-flex justify-content-center">
          <div class="col-12 d-flex justify-content-center align-items-center">
            
            <div class="card p-3" style="width: 30rem; height: 38rem;">
              <h1>
              <div class="" style="margin:50px;">
                <label for="cd_image" class="form-label fw-bold small"><i class="bi bi-image"></i> CD Image URL</label>
                <input type="text" class="form-control" id="cd_image" name="cd_image" placeholder="images/cd.jpg" required />
              </div>
            </h1>

              <div class="card-body d-flex flex-column justify-content-between"> 
                <div>
                  <h1 class="card-title h4 mb-3">
                    <label for="cd_price" class="form-label fw-bold small d-block"><i class="bi bi-tag-fill"></i> Cd Price</label>
                    <input type="text" class="form-control" id="cd_price" name="cd_price" placeholder="e.g. $19.99" required />
                  </h1>
                  
                  <h1 class="card-title h4 mb-3">
                    <label for="cd_name" class="form-label fw-bold small d-block"><i class="bi bi-disc"></i> Cd Name</label>
                    <input type="text" class="form-control" id="cd_name" name="cd_name" placeholder="Cd Title" required />
                  </h1>
                
                  <div class="card-text mb-3">
                    <div class="row g-2">
                      <div class="col-6">
                        <p>
                        <label for="artist_name" class="form-label fw-bold small">Artist</label>
                        <select id="artist_name" name="artist_name" class="form-select form-select-sm" required>
                          <option value="">-- Select --</option>
                          <?php foreach ($artists as $artist): ?>
                            <option value="<?= $artist['id'] ?>"><?= htmlspecialchars($artist['name']) ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      
                      <div class="col-6">
                        <label for="type_name" class="form-label fw-bold small">Type</label>
                        <select id="type_name" name="type_name" class="form-select form-select-sm" required>
                          <option value="">-- Select --</option>
                          <?php foreach ($types as $type): ?>
                            <option value="<?= $type['id'] ?>"><?= htmlspecialchars($type['name']) ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                </p>
                <div class="text-end mt-auto">
                  <button type="submit" class="btn btn-warning w-100">Add New CD</button>
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