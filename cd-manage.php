<?php
require('header.php');
 $db = new PDO("mysql:host=localhost;dbname=project", "root", "");
 $search = $_GET['search'] ?? ''; 

if (!empty($search)) {
       $query = "SELECT 
        cd.id,
        cd.name AS cd_name,
        cd.price AS cd_price,
        cd.song_list AS songlist,
        artists.id AS artist_id,
        artists.name AS artist_name,
        types.id AS type_id,
    types.name AS type_name,
        cd.cd_image
    FROM cd
    LEFT JOIN artists ON artists.id = cd.artist_id
    LEFT JOIN types ON types.id = cd.type_id
    WHERE cd.name LIKE :search OR artists.name LIKE :search OR types.name LIKE :search
    ORDER BY 
        CASE 
            WHEN cd.name LIKE :startsWith THEN 1
            WHEN artists.name LIKE :startsWith THEN 1
            WHEN types.name LIKE :startsWith THEN 1
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
      cd.song_list AS songlist,
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
    body{
    background: linear-gradient(
        135deg,
        #eefefe 0%,
        #fbf9cf 50%,
        #e9fb62 100%
    ) !important;
    min-height: 100vh;
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
.buyyy a {
    width: 150px; 
    height: 40px ;
    border: none ;
    border-radius: 30px ;
    color: white ;
    background-color: #f6d73b ; 
    text-decoration: none;
    transition: all 0.3s ease;
}

.buyyy a:hover {
    transform: scale(1.1);
    background-color: #7fff76 !important;
    color: black !important; 
}

.close-btn {
  background: none;
  border: none;
  font-size: 20px;
  float: right;
  cursor: pointer;
}
.navbar {
  background: #ebbc57;
  box-shadow: 0 4px 20px rgba(0,0,0,0.15);
  transition: left 0.3s ease;
}

.btn {
  border-radius: 25px;
  transition: all 0.3s ease;
}

.btn:hover {
  transform: scale(1.05);
}


.btn-edit {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  background-image: linear-gradient(to top, #dbe56c 0%, #daaf2d 100%);
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
  
}
.edit a{
  text-decoration:none;
}
.btn-edit:active {
  transform: scale(.9);
  transition: all 100s ease;
}

.btn-edit:hover {
  box-shadow: 0px 0px 0px 3px #b8af30;
}

.btn-edit svg {
  width: 16px;
}
.merriweather {
  font-family: "Merriweather", serif;
  font-style: normal;
}

.btn-corner {
  position: fixed; 
  bottom: 30px;      
  right: 30px;      
   background: linear-gradient(
        135deg,
        #eb9525,
        #fae360
    );

    box-shadow:
      0 10px 25px rgba(37,99,235,.4);
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
  background-color: #b3ad00;
  transform: scale(1.05);
}

.btn{
  width:40px;
   height:40px; 
   border-radius:50%;
    border:2px #d4c780 solid; 
    color: #d4d480;
}
.sidebar {
      height: 100%;
      width: 0;
      position: fixed;
      top: 0;
      left: 0;
      background: #EBE157;
      overflow-x: hidden;
      transition: 0.3s;
      padding-top: 60px;
      z-index: 888;
    }

    .sidebar a {
      padding: 10px 20px;
      text-decoration: none;
      font-size: 18px;
      color: white;
      display: block;
      transition: 0.2s;
      color: black;
    }


     .sidebar a:hover {
  background: rgba(255, 255, 255, 0.81);
  padding-left: 30px;
}


    .sidebar .closebtn {
      position: absolute;
      top: 15px;
      right: 20px;
      font-size: 30px;
      color: white;
    }
.sidebar {
    width: 0;
    transition: width 0.3s ease;
}

.sidebar.sidebar-open {
    width: 250px;
}

#mySidebar {
    font-size:20px;
}

@media(max-width:768px){
    #mySidebar {
        font-size:12px;
    }
}
    

    @media(max-width:768px){
      #mySidebar{
         width:100px;
         font-size:12px;
      }
    }
    .openbtn {
      font-size: 20px;
      background-color: rgb(191, 149, 0);
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      position: fixed;
      margin-left:0.5rem;
      width:60px;
      z-index: 1888;
    }
    @media(max-width: 576px){
    .openbtn{
      width:30px;
      font-size:12px;
    }
    }

    .openbtn:hover {
      background-color: #B37400;
    }

    .content-container {
      transition: all 0.3s ease;
    }

    body.sidebar-open {
      margin-left: 250px;
    }

    body.sidebar-open .content {
      justify-content: flex-end !important;
    }

    body.sidebar-open .content .col-lg-3 {
      flex: 0 0 auto;
      width: 33.333333%;
    }

 .search-form {
    width: 100%;
    max-width: 600px;
    margin-left: 80px;

    display: flex;
    align-items: center;
    gap: 8px;
}

.search-form input {
    flex: 1;
    min-width: 0;
}

.search-form button {
    flex-shrink: 0;
}

@media (max-width: 768px) {
    .search-form {
        max-width: 250px;
        margin-left: 70px;
    }
}

@media (max-width: 576px) {
    .search-form {
        max-width: 180px;
        margin-left: 65px;
    }

    .search-form input {
        font-size: 14px;
    }
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
<body class="merriweather">

   <section>
     <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid  p-1">
                <button class="openbtn navbar-brand text-white p-1" onclick="openNav()"><i class="bi bi-list"></i></button>

                    <div id="mySidebar" class="sidebar">
                      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                      <a href="index.php">Home</a>
                      <a href="dashboard.php">Dashboard</a>
                      <a href="order-history.php">Order History</a>
                      <a href="order-manage.php">Order Manage</a>
                      <a href="types-manage.php">Type Manage</a>
                      <a href="artist-manage.php">Artist Manage</a>
                      <a href="logout.php">Logout</a>

                    </div>
               <div class="w-100 d-flex justify-content-center">
    <form method="GET" action="" class="search-form">
        <input class="form-control me-2" type="search" name="search" placeholder="Search CDs / Artists / Types" aria-label="Search" value="<?= htmlspecialchars($search) ?>">
        <button class="btn" type="submit"><i class="bi bi-search"></i></button>
    </form>
                </form>
            </div>
        </div>
      </div>
    </nav>
                
   <script>
function openNav() {
  document.getElementById("mySidebar").classList.add("sidebar-open");
  document.body.classList.add("sidebar-open");
}

function closeNav() {
  document.getElementById("mySidebar").classList.remove("sidebar-open");
  document.body.classList.remove("sidebar-open");

}
</script>
   
   
  <div class="container-fluid content-container">
    <div class="row g-4 playfair-display d-flex justify-content-center content" style="margin-top:80px;">
      <?php foreach($cd as $cds): ?>
    <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center">
      <div class="card" style="width: 21rem; height:44rem;">
          <img class="card-img-top d-flex justify-content-center" 
               src="<?= $cds['cd_image'] ?>" 
               alt="Card image cap" width="200px">
          <div class="card-body"> 
            <h3 class="card-title d-flex justify-content-start">
              <i class="bi bi-tag-fill"></i><?= $cds['cd_price'] ?>
            </h3>
            <h3 class="card-title d-flex justify-content-start">
              <?= $cds['cd_name'] ?>
            </h3>
           
            <p class="card-title d-flex justify-content-start text-capitalize">  
             <?= $cds['songlist'] ?>
      </p>
            
            <p class="card-text">
              <span class="fw-bold"><?= $cds['artist_name'] ?></span> || <?= $cds['type_name'] ?>
            </p>

<div class="buyyy">
    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === "user"): ?>
        <div class="d-flex align-items-center gap-2">
            <a href="order-form.php?id=<?= $cds['id'] ?>" class="btn buy-now-btn">Buy Now</a>
            
            <form action="cart-manage.php" method="POST" class="m-0">
                <input type="hidden" name="cd_id" value="<?= $cds['id'] ?>">
                <button type="submit" class="btn cart-round-btn" title="Add to Cart">
                    <i class="bi bi-cart-plus"></i>
                </button>
            </form>
        </div>
    <?php endif; ?>
</div>
              <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === "admin"): ?>
                <div class="edit">
                <a href="cd-manage-update.php?id=<?= $cds['id'] ?>">
                  <button class="btn-edit">
                    <svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="#FFFFFF" height="24" width="24" viewBox="0 0 24 24">
                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg>
                      Edit
                  </button>
                </a>
                </div>
              <?php endif; ?>
            
            </div>
          </div>
        </div>
    <?php endforeach; ?>
  </div>
</div>

<a href="cd-manage-add.php">
 <button class="btn-corner">
  <i class="bi bi-plus"></i>
</button>
</a>
<footer class="bg-dark text-white text-center p-3 mt-auto">
  <p>&copy; 2026 CD Shop | Contact us at info@cdshop.com</p>
</footer>

</body>
</html>