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
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <style>
        .navbar{
            background-color:gray;
        }
        .card-body {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.card {
  border: 12px solid #000000;               
  border-radius: 10px;          
  box-shadow: 0 4px 12px rgba(0,0,0,0.15); 
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  background-color: #ffffff;     
  overflow: hidden;             
       
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
.navbar {
  background: linear-gradient(90deg, #57d8eb, #000c40);
}

.btn {
  border-radius: 25px;
  transition: all 0.3s ease;
}

.btn:hover {
  transform: scale(1.05);
}

   .archivo-black-regular {
  font-family: "Archivo Black", sans-serif;
  font-weight: 400;
  font-style: normal;
}


button {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  background-image: linear-gradient(to top, #30cceb 0%, #330867 100%);
  border: solid 3px transparent;
  background-clip: padding-box;
  box-shadow: 0px 0px 0px 3px #ffffff00;
  color: white;
  min-height: 43px;
  padding: 0 13px 0 13px;
  border-radius: 50px;
  text-transform: uppercase;
  letter-spacing: 2px;
  transition: all .5s ease;
  text-decoration:none
}

button:active {
  transform: scale(.9);
  transition: all 100s ease;
}

button:hover {
  box-shadow: 0px 0px 0px 3px #30a1b8;
}

button svg {
  width: 16px;
}
.merriweather {
  font-family: "Merriweather", serif;
  font-optical-sizing: auto;
  font-weight: <weight>;
  font-style: normal;
  font-variation-settings:
    "wdth" 100;
}

.btn-corner {
  position: fixed; 
  bottom: 30px;      
  right: 30px;      
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 50%;
  width:60px;
  height:60px;
  font-size: 16px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  transition: all 0.3s ease;
}

.btn-corner:hover {
  background-color: #0056b3;
  transform: scale(1.05);
}

.btn{
  width:40px;
   height:40px; 
   border-radius:50%;
    border:2px #809dd4 solid; 
    color: #809dd4;
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
 <div class="merriweather">
<body>
 
   <section> 
     <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid  p-1">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand text-white p-1">CD</h1>
                <div class="collapse navbar-collapse" id="navbarNav">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
             <form method="GET" action="" class="d-flex ">
        <input class="form-control me-2"  style="width:800px;" type="search" name="search" placeholder="Search CDs or Artists" aria-label="Search">
        <button class="btn" type="submit"><i class="bi bi-search"></i></div>
        </form>
</button>  
        <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link ps-2 text-white" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link p-2 text-white" href="dashboard.php">Dashboard</a></li>
                          <?php if ($_SESSION['user']['role']=="user"): ?>
                        <li class="nav-item"><a class="nav-link p-2 text-white" href="order-history.php">Order History</a></li>
                        <?php endif; ?>
                          <?php if ($_SESSION['user']['role']=="admin"): ?>
                        <li class="nav-item"><a class="nav-link p-2 text-white" href="order-manage.php">Order Manage</a></li>
                        <li class="nav-item"><a class="nav-link p-2 text-white" href="types-manage.php">Type Manage</a></li>
                        <li class="nav-item"><a class="nav-link p-2 text-white" href="artist-manage.php">Artist Manage</a></li>
                        <?php endif; ?>
                        <li class="nav-item"><a class="nav-link p-2 text-white" href="logout.php">Log Out</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
     </section>
   
   
    <div class="row g-4 playfair-display d-flex justify-content-center mt-5">
  <?php foreach($cd as $cds): ?>
    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
      <div class="card" style="width: 21rem; height:38rem;">
        <img class="card-img-top d-flex justify-content-center" 
             src="<?= $cds['cd_image'] ?>" 
             alt="Card image cap" width="200px">
        <div class="card-body"> 
          <h1 class="card-title d-flex justify-content-start">
            <i class="bi bi-tag-fill"></i><?= $cds['cd_price'] ?>
          </h1>
          <h1 class="card-title d-flex justify-content-start">
            <?= $cds['cd_name'] ?>
          </h1>
          <p class="card-text d-flex justify-content-start">
            <?= $cds['artist_name'] ?> || <?= $cds['type_name'] ?>
          </p>

          <div class="buyyy">
            <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === "user"): ?>
              <a href="order-form.php?id=<?= $cds['id'] ?>" class="btn btn-primary">Buy Now</a>
            <?php endif; ?>

            <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === "admin"): ?>
              <a href="cd-manage-update.php?id=<?= $cds['id'] ?>">
                <button>
                  <svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="#FFFFFF" height="24" width="24" viewBox="0 0 24 24">
                      <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                  </svg>
                    Edit
                </button>
              </a>
            <?php endif; ?>
          </div>

        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<a href="cd-manage-add.php">
 <button class="btn-corner">
  <i class="bi bi-plus">
</button>
</a>
</body>
</html>