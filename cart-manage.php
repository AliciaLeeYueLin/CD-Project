<?php
session_start();

$db = new PDO("mysql:host=localhost;dbname=project", "root", "");
if(isset($_POST['id'])){
  $id = $_POST['id'];
  $query_delete = "DELETE FROM cart WHERE id = :id";
  $stmt = $db->prepare($query_delete);
  $stmt->execute([":id" => $id]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cd_id'])) {
    $cd_id = $_POST['cd_id'];
    
    $insert_stmt = $db->prepare("INSERT INTO cart (cd_id, cd_quantity) VALUES (?, 1)");
    $insert_stmt->execute([$cd_id]);

    
    header("Location: cart-manage.php");
    exit();
}

$query = "SELECT 
        cart.id AS cart_item_id, 
        cart.cd_quantity, 
        cart.cd_id, 
        cd.name, 
        cd.price, 
        cd.cd_image
          FROM cart
          INNER JOIN cd ON cd.id = cart.cd_id";

$stmt = $db->prepare($query);
$stmt->execute();
$cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
  <style>
    body { background: #f1f1f1; font-family: "Merriweather", serif; }
    .cart-container { 
        max-width: 700px; 
        margin: 40px auto; 
        background: white; 
        padding: 25px;
         border-radius: 8px; 
        }
    .cd-row {
         border-bottom: 1px solid #eee;
          padding: 15px 0; 
        }
        .btn-delete:hover {
      color: #dc3545;
      background-color: rgba(220, 53, 69, 0.1);
    }

  </style>
</head>
<body>

<div class="cart-container shadow-sm">
    <h2 class="mb-4 text-center" style="background:#ebe157; padding: 15px; border-radius: 5px;">Shopping Cart</h2>

    <?php if (empty($cart_items)): ?>
        <p class="text-center text-muted py-4">Your cart is empty.</p>
    <?php else: ?>
        <form action="order-form.php" method="POST">
        <?php foreach ($cart_items as $item): ?>
            <div class="row align-items-center cd-row">
                <div class="col-1">
                   <h6> #<?= $item['cart_item_id']; ?></h6>
                </div>
                
                <div class="col-2">
                    <img src="<?= $item['cd_image']; ?>" class="img-fluid rounded" style="max-height: 70px;">
                </div>
                <div class="col-3">
                    <h5><?= $item['name']; ?></h5>
                   
                </div>
                <div class="col-2">
                    <h5><?= $item['price']; ?></h5>
                  
                </div>
                <div class="col-2 text-center">
                    <h5>Qty: <?= $item['cd_quantity']; ?></h5>
                </div>
            
               <div class="col-1 text-center">
                    <a href="order-form.php?id=<?= $item['cd_id']; ?>&cart_id=<?= $item['cart_item_id']; ?>" class="btn btn-warning">Buy</a>         
                </div>

               <div class="col-1 text-center">
    <form method="POST" onsubmit="return confirm('Are you sure you want to delete this CD from cart?');">
        <input type="hidden" name="id" value="<?= $item['cart_item_id'] ?>">
        <button type="submit" class="btn btn-link text-danger p-0">
            <i class="bi bi-trash3-fill"></i>
        </button>
    </form>
</div>
</div>
        <?php endforeach; ?>
        </form>
        <div class="text-start mt-4">
            <a href="cd-manage.php" class="btn btn-outline-secondary btn-sm">← Back to Shop</a>
        </div>

    <?php endif; ?>
</div>

</body>
</html>