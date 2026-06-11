<?php
    $db = new PDO("mysql:host=localhost;dbname=project", "root", "");
$query =  "SELECT 
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
       ON cd.id = orders.cd_id;";


    $stmt = $db->prepare($query);
$stmt->execute();
$order = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
   <div class="merriweather">
      <div class="card mb-2 p-3">
      <table class="table table-striped table-hover table-bordered">

        <thead>
          <tr>
            <th scope="col" style="width: 2%;">Order ID</th>
            <th scope="col" style="width: 5%;">Username</th>
            <th scope="col" style="width: 20%;">CD Name <i class="bi bi-disc"></th>
            <th scope="col" style="width: 10%;">Purchase Date <i class="bi bi-calendar"></i></th>
          </tr>
        </thead>
        <tbody>

<?php foreach($order as $orders): ?>
    <tr>
        <th scope="row"><?=$orders['orders_id'] ?></th>
        <td><i class="bi bi-person"></i><?= $orders['users_username'] ?></td>
        <td></i> <?= $orders['cd_name'] ?></td>
        <td><?= date("d M Y", strtotime($orders['purchase_date'])) ?></td>
    </tr>
<?php endforeach; ?>
</tbody>

      </table>
    </div>
        </div>

      </div>
</body>
</html>