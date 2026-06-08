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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
   <div class="row g-4">
        <?php foreach($order as $orders): ?>
    <p class=" d-flex justify-content-center">
        <?= $orders['orders_id'] ?> |
        <?= $orders['users_username'] ?>|
        <?= $orders['cd_name'] ?>|
        <?= $orders['purchase_date'] ?>

    </p>
<?php endforeach; ?>
       
</body>
</html>