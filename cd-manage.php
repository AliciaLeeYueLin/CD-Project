<?php
require('header.php');
 $db = new PDO("mysql:host=localhost;dbname=project", "root", "");
 $search = $_GET['search'] ?? ''; 

if (!empty($search)) {
       $query = "SELECT 
        cd.id,
        cd.name AS cd_name,
        cd.price AS cd_price,
        artists.id AS artist_id,
        artists.name AS artist_name,
        types.id AS type_id,
    types.name AS type_name,
        cd.cd_image
    FROM cd
    LEFT JOIN artists ON artists.id = cd.artist_id
    LEFT JOIN types ON types.id = cd.type_id
    WHERE cd.name LIKE :search OR artists.name LIKE :search
    ORDER BY 
        CASE 
            WHEN cd.name LIKE :startsWith THEN 1
            WHEN artists.name LIKE :startsWith THEN 1
            ELSE 2
        END,
        cd.name ASC";
    
    $stmt = $db->prepare($query);
    $stmt->execute([
        'search' => "%$search%",
        'startsWith' => "$search%"
    ]);
}else {
$query =  "SELECT 
    cd.id,
    cd.name AS cd_name,
    cd.price AS cd_price,
    artists.id AS artist_id,
    artists.name AS artist_name,
    types.id AS type_id,
    types.name AS type_name,
    cd.cd_image
FROM project.cd
LEFT JOIN artists 
       ON artists.id = cd.artist_id
LEFT JOIN types 
       ON types.id = cd.type_id;";

$stmt = $db->prepare($query);
$stmt->execute([]);
}
$cd = $stmt->fetchAll();
$typeStmt = $db->query("SELECT id, name FROM types");
$types = $typeStmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .navbar{
            background-color:gray;
        }
        .card-body {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
       .buyyy{
        display:flex;
        margin-top:auto;
        justify-content:start;
       
       }
        .btn{
            width:150px;
        }

.playfair-display {
  font-family: "Playfair Display", serif;
  font-optical-sizing: auto;
  font-weight: <weight>;
  font-style: normal;
}

.popup-box {
  display: none; /* hidden by default */
  position: fixed;
  top: 70px; /* just below navbar */
  right: 20px;
  width: 250px;
  background: #fff;
  border: 2px solid #007bff;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  z-index: 9999;
}

.popup-content {
  padding: 15px;
}

.close-btn {
  background: none;
  border: none;
  font-size: 20px;
  float: right;
  cursor: pointer;
}

    </style>
     <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
<link rel="stylesheet" 
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</head>
<body>
    <section> 
     <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid  p-1">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand p-1">CD</h1>
                <div class="collapse navbar-collapse" id="navbarNav">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <form method="GET" action="" class="d-flex ">
        <input class="form-control me-2"  style="width:800px;" type="search" name="search" placeholder="Search CDs or Artists" aria-label="Search">
        <div class="btn" type="submit"; style="width:40px; height:40px; border-radius:50%; border:2px blue solid; color:blue;"><i class="bi bi-search"></i></div>
        </form>
        </div>          
        
           
<button onclick="togglePopup()" class="btn btn-light">
  <i class="bi bi-toggles2"></i>
</button>

<!-- Popup box -->
<div id="topPopup" class="popup-box">
  <div class="popup-content">
    <button class="close-btn" onclick="togglePopup()">&times;</button>
    <h5>Filter Options</h5>
    <?php foreach ($types as $type): ?>
      <label>
        <input type="checkbox" name="type_id[]" value="<?= $type['id'] ?>">
        <?= htmlspecialchars($type['name']) ?>
      </label><br>
    <?php endforeach; ?>
    <button type="submit" class="btn btn-primary mt-2">Apply Filters</button>
  </div>
</div>

               
<script>
function togglePopup() {
  const popup = document.getElementById("topPopup");
  popup.style.display = (popup.style.display === "block") ? "none" : "block";
}
</script>


        <a href="cd-manage-add.php"><div class="btn">+</div></a>
        <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link ps-2" href="http://localhost/project/cd-manage.php/">Home</a></li>
                        <li class="nav-item"><a class="nav-link p-2" href="#education">Shop</a></li>
                        <li class="nav-item"><a class="nav-link p-2" href="#about">Register</a></li>
                        <li class="nav-item"><a class="nav-link p-2" href="#about">Log in</a></li>
                        
                    </ul>
                </div>
            </div>
            
    </nav>
    
     </section>
   
        <div class="row g-4 playfair-display d-flex justify-content-center  mt-5">
 <?php foreach($cd as $cds): ?>
  <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center ">
<div class="card" style="width: 18rem; height:35rem;">
  <img class="card-img-top d-flex justify-content-center" src="<?= htmlspecialchars($cds['cd_image']) ?>" alt="Card image cap" width="200px">
  <div class="card-body"> 
    <h1 class="card-title d-flex justify-content-start"><i class="bi bi-tag-fill"></i><?= $cds['cd_price'] ?></h1>
    <h1 class="card-title d-flex justify-content-start"></i><?= $cds['cd_name'] ?></h1>
    <p class="card-text d-flex justify-content-start"></i><?= $cds['artist_name'] ?> || </i><?= $cds['type_name'] ?></p>
    
    <div class="buyyy">
                    <a href="order-form.php?id=<?= $cds['id'] ?>" class=" btn btn-primary">Buy Now</a> 
                    <a href="cd-manage-update.php?id=<?= $cds['id'] ?>" class="btn btn-success btn-sm me-2"><i class="bi bi-pencil"></i></a>
                    </div>
  </div>
</div>
</div>
 <?php endforeach; ?>
 </div>
</body>
</html>