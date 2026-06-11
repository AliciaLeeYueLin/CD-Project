<?php
session_start();
$db = new PDO("mysql:host=localhost;dbname=project", "root", "");

$UserId = $_SESSION['user']['id'];

$query = "SELECT 
    orders.id AS orders_id,
    orders.purchase_date,
    orders.address,
    users.id AS users_id,
    cd.id AS cd_id,
    cd.name AS cd_name,
    users.username AS users_username,
    orders.order_by
FROM project.orders
LEFT JOIN users 
       ON users.id = orders.order_by
LEFT JOIN cd 
       ON cd.id = orders.cd_id
WHERE orders.order_by = :user_id";

$stmt = $db->prepare($query);
$stmt->execute([':user_id' => $UserId]);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html>

<head>
  <title>Project</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
    crossorigin="anonymous" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
  <style type="text/css">
    body {
      background: #f1f1f1;
    }
  </style>
</head>

<body>
   
      <div class="card mb-2 p-3">
      <table class="table table table-striped table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col">Order ID</th>
            <th scope="col" >Username</th>
            <th scope="col" style="width: 40%;">CD Name</th>
            <th scope="col" style="width: 10%;">Purchase Date</th>
          </tr>
        </thead>
        <tbody>

<?php foreach($orders as $order): ?>
    <tr>
        <th scope="row"><?= $order['orders_id'] ?></th>
        <td><i class="bi bi-person"></i><?= $order['users_username'] ?></td>
        <td><?= $order['cd_name'] ?></td>
       <td><?= $order['purchase_date']?></td>
    </tr>
<?php endforeach; ?>


</tbody>

      </table>
    </div>
      
<a href="dashboard.php">  <i class="bi bi-arrow-right-circle"></i> Go Back to dashboard</a>
       
</body>
</html>