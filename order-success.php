<?php
session_start();
$db = new PDO("mysql:host=localhost;dbname=project", "root", "");

$userId = $_SESSION['user']['id'];

$address = $_POST['address'];
$cdId = $_POST['cd_id'];

$stmt = $db->prepare("
    INSERT INTO orders (purchase_date, address, order_by, cd_id)
    VALUES (NOW(), ?, ?, ?)
");
$stmt->execute([$address, $userId, $cdId]);

echo "<h1>Order Submitted</h1>";

exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
