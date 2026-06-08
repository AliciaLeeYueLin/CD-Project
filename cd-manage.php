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
        cd.cd_image
    FROM cd
    LEFT JOIN artists ON artists.id = cd.artist_id
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
    cd.quantity_left,
    artists.id AS artist_id,
    artists.name AS artist_name,
    cd.cd_image
FROM project.cd
LEFT JOIN artists 
       ON artists.id = cd.artist_id;";

$stmt = $db->prepare($query);
$stmt->execute([]);
}
$cd = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .buyyy{
            
            display:flex;
            justify-content:start;
            align-items:center;
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
    <!-- <section> -->
     <!-- <nav class="navbar navbar-expand-lg  fixed-top">
            <div class="container-fluid  p-1">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand pirata-one-regular me-auto ps-2">Filter</h1>
                <div class="collapse navbar-collapse" id="navbarNav">

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link ps-2" href="http://localhost/project/cd-manage.php/">Home</a></li>
                        <li class="nav-item"><a class="nav-link p-2" href="#education">Shop</a></li>
                        <li class="nav-item"><a class="nav-link p-2" href="#about">Register</a></li>
                        <li class="nav-item"><a class="nav-link p-2" href="#about">Log in</a></li>
                        
                    </ul>
                </div>
            </div>
    </nav>
     </section> -->
     <section>
<form method="GET" action="" class="d-flex mt-3" style="justify-content:center;">
  <input class="form-control me-2"  style="width:200px;" type="search" name="search" placeholder="Search CDs or Artists" aria-label="Search">
  <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
</form>

</section>
    <div class="row g-4 playfair-display">
          <?php foreach($cd as $cds): ?>
        <div id="starboy" class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
            <div class="flex-column d-flex "style="margin-top: 50px;">
                <div><img src="<?= htmlspecialchars($cds['cd_image']) ?>" alt="" width="200px"></div>
                <h1 class="d-flex justify-content-start"><i class="bi bi-tag-fill"></i><?= $cds['cd_price'] ?></h1>
                <h1 class="d-flex justify-content-start"><?= $cds['cd_name'] ?></h1>
                <h4 class="d-flex justify-content-start"><?= $cds['artist_name'] ?></h4>
                <div class="buyyy">
                    <a href="order-form.php?id=<?= $cds['id'] ?>" class=" btn btn-primary">Buy Now</a>
                    </div>
            </div>
        </div>
       
           <?php endforeach; ?>
    </div>

</body>
</html>