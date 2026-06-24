<?php
require('header.php');
$db = new PDO("mysql:host=localhost;dbname=project", "root", "");

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
    $song_list = $_POST['song_list'];
    $artist_id = $_POST['artist_name'];
    $type_id = $_POST['type_name'];
    $id = $_POST['id'];
    $query = "UPDATE cd
              SET cd_image=:cd_image, name=:cd_name, artist_id=:artist_id, type_id=:type_id ,song_list=:song_list
              WHERE id=:id";
    $stmt = $db->prepare($query);
    $stmt->execute([
        ":cd_image"   => $cd_image,
        ":cd_name"    => $cd_name,
        ":song_list"    => $song_list,
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
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit CD | Management Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Playfair+Display:wght@600;800&display=swap" rel="stylesheet">
    
    <style>
      body {
        background: linear-gradient(135deg, #fdf0cd 0%, #fadf86 50%, #eec12f 100%) !important;  
        font-family: "Merriweather", serif;
      }
      .title {
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        color: #332700;
        letter-spacing:2px;
        text-shadow: 1px 1px 0px rgba(255,255,255,0.5);
      }
      .card {
        border: 2px solid #453707;
        border-radius: 16px;          
        box-shadow: 0 15px 35px rgba(51, 39, 0, 0.15); 
      }
      .form-label {
        color: #4a3b00;
        letter-spacing: 0.5px;
      }
      .form-control, .form-select {
        border: 2px solid #d4c185;
        border-radius: 8px;
        padding: 0.6rem 0.75rem;
        background-color: #fffdf6;
        transition: all 0.3s ease;
      }
      .form-control:focus, .form-select:focus {
        border-color: #332700;
        box-shadow: 0 0 0 0.25rem rgba(238, 193, 47, 0.25);
        background-color: #ffffff;
      }
      .btn-update {
        background: #332700;
        color: #fadf86;
        border: 2px solid #332700;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        padding: 0.75rem;
        border-radius: 30px;
        transition: all 0.3s ease;
      }
      .btn-update:hover {
        background: #fadf86;
        color: #332700;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(51, 39, 0, 0.2);
      }
      .btn-back {
        color: #5c4900;
        font-weight: 600;
        transition: all 0.2s ease;
      }
      .btn-back:hover {
        color: #332700;
        transform: translateX(-3px);
      }
    </style>
  </head>
  
  <body>
    <div class="container mx-auto my-5" style="max-width: 600px;">
      
      <div class="text-center mb-4">
        <h1 class="title display-5">Edit CD Info</h1>
      </div>

      <form method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($cd['id']) ?>">

        <div class="card p-4 p-md-5">
          
          <div class="mb-4">
            <label for="cd_image" class="form-label fw-bold small">
              <i class="bi bi-image-fill me-1"></i> CD Image URL
            </label>
            <input type="text" class="form-control" id="cd_image" name="cd_image" value="<?= htmlspecialchars($cd['cd_image']) ?>"/>
          </div>

          <div class="mb-4">
            <label for="cd_price" class="form-label fw-bold small">
              <i class="bi bi-tag-fill me-1"></i> CD Price
            </label>
            <div class="input-group">
              <span class="input-group-text" style="background: #eedfa4; border: 2px solid #d4c185; border-right: none; border-radius: 8px 0 0 8px; color: #332700; font-weight: bold;">$</span>
              <input type="text" class="form-control" id="cd_price" name="cd_price" value="<?= htmlspecialchars($cd['price']) ?>" style="border-radius: 0 8px 8px 0;" />
            </div>
          </div>
          
          <div class="mb-4">
            <label for="cd_name" class="form-label fw-bold small">
              <i class="bi bi-bookmark-heart-fill me-1"></i> CD Name
            </label>
            <input type="text" class="form-control" id="cd_name" name="cd_name" value="<?= htmlspecialchars($cd['name']) ?>" placeholder="Album Title" />
          </div>

          <div class="mb-4">
            <label for="song_list" class="form-label fw-bold small">
              <i class="bi bi-disc-fill me-1"></i> Song List
            </label>
            <textarea class="form-control" rows="4" id="song_list" name="song_list" placeholder="Enter tracks (e.g., 1. Song Name)..." required><?= htmlspecialchars($cd['song_list']) ?></textarea>
          </div>
        
          <div class="mb-5">
            <div class="row g-3">
              <div class="col-6">
                <label for="artist_name" class="form-label fw-bold small">Artist</label>
                <select id="artist_name" name="artist_name" class="form-select">
                  <option value="">-- Select --</option>
                  <?php foreach ($artists as $artist): ?>
                    <option value="<?= $artist['id'] ?>" <?= ($cd['artist_id'] == $artist['id']) ? 'selected' : '' ?>>
                      <?= htmlspecialchars($artist['name']) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              
              <div class="col-6">
                <label for="type_name" class="form-label fw-bold small">Genre Type</label>
                <select id="type_name" name="type_name" class="form-select" required>
                  <option value="">-- Select --</option>
                  <?php foreach ($types as $type): ?>
                    <option value="<?= $type['id'] ?>" <?= ($cd['type_id'] == $type['id']) ? 'selected' : '' ?>>
                      <?= htmlspecialchars($type['name']) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>

          <div>
            <button type="submit" class="btn btn-update w-100 d-flex align-items-center justify-content-center gap-2"><i class="bi bi-cloud-arrow-up-fill"></i> Save Updates</button>
          </div>

        </div>
      </form>

      <div class="text-center mt-4">
        <a href="cd-manage.php" class="btn btn-link btn-sm btn-back text-decoration-none"><i class="bi bi-arrow-left-circle-fill"></i> Back to CD Manage</a>
      </div>
      
    </div>
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>