<?php
session_start();

    $db = new PDO("mysql:host=localhost;dbname=project", "root", "");

$UserId = $_SESSION['user']['id'];

 if(isset($_POST['id'])){
 $id = $_POST['id'];
 $query_delete = "DELETE FROM orders WHERE id = :id";
 $stmt = $db->prepare($query_delete);
 $stmt->execute([':id' => $id]);;
} 

$query =  "SELECT 
    orders.id AS orders_id,
    orders.purchase_date,
    orders.address,
    users.id AS users_id,
    cd.id AS cd_id,
    cd.name AS cd_name,
    cd.cd_image AS cd_image,
    users.username AS users_username,
    orders.order_by
FROM project.orders
LEFT JOIN users 
       ON users.id = orders.order_by
LEFT JOIN cd 
       ON cd.id = orders.cd_id;";


    $stmt = $db->prepare($query);
$stmt->execute();
$order = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Order Manage</title>
  <style>
     .action-btn {
      color: #a0aec0;
      border: none;
      background: none;
      padding: 5px 10px;
      border-radius: 8px;
      transition: all 0.2s ease;
      text-decoration: none;
    }
    .btn-delete:hover {
      color: #dc3545;
      background-color: rgba(220, 53, 69, 0.1);
    }
    </style>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
    crossorigin="anonymous" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&display=swap" rel="stylesheet">
  
  <style type="text/css">
    body {
      background: #f1f1f1;
    }
    .table thead th {
      background-color: #ffe195 !important; 
    }
    .merriweather {
      font-family: "Merriweather", serif;
      font-style: normal;
    }
           .action-btn {
      color: #a0aec0;
      border: none;
      background: none;
      padding: 5px 10px;
      border-radius: 8px;
      transition: all 0.2s ease;
      text-decoration: none;
    }
    .btn-delete:hover {
      color: #dc3545;
      background-color: rgba(220, 53, 69, 0.1);
    }
  </style>
</head>
<body>

  <div class="merriweather">
    <div class="card mb-2 p-3" style="margin: 50px; border-radius: 15px; overflow: hidden; background-color: #ffffff;">
      <h1 class="d-flex justify-content-start">Order Manage</h1>
      <a href="dashboard.php" class="text-start text-decoration-none text-black mb-3">
        <i class="bi bi-arrow-left-circle"></i> Go Back to dashboard
      </a>

      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Username</th>
            <th scope="col">CD Image</th>
            <th scope="col" style="width: 35%;">CD Name <i class="bi bi-disc"></i></th>
            <th scope="col" style="width: 15%;">Purchase Date <i class="bi bi-calendar"></i></th>
            <th scope="col" style="width: 5%;">Dlt </th>
          
          </tr>
        </thead>
        <tbody>
          <?php foreach($order as $orders): ?>
            <tr>
              <th scope="row"><?= $orders['orders_id'] ?></th>
              <td><?= $orders['users_username'] ?></td>
              <td><img src="<?= $orders['cd_image'] ?>" class="img-fluid rounded" style="max-height: 100px; max-width: 100px; object-fit: cover;"></td>
              <td><?= $orders['cd_name'] ?></td>
              <td><?= $orders['purchase_date'] ?></td>
              <td>
                <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this order?');" style="display:inline;">
                  <input type="hidden" name="id" value="<?= $orders['orders_id'] ?>">
                  <button type="submit" class="action-btn btn-delete" title="Delete Category">
                    <i class="bi bi-trash3-fill"></i>
                  </button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>
  </div>    
       
</body>
</html>