<?php
session_start();

$db = new PDO("mysql:host=localhost;dbname=project", "root", "");

//For User

$userId = $_SESSION['user']['id'];
$userStmt = $db->prepare("SELECT *FROM users WHERE id = ?");
$userStmt->execute([$userId]);
$user = $userStmt->fetch(PDO::FETCH_ASSOC);

//For CD

$cdId = $_GET['id'];
$cdStmt = $db->prepare("SELECT *FROM cd WHERE id = ?");
$cdStmt->execute([$cdId]);
$cd = $cdStmt->fetch(PDO::FETCH_ASSOC);;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container my-5">

  <h1 class="mb-4">Order Confirmation</h1>
  <!-- <p>You are ordering: <strong><?php echo ($cd['name']); ?></strong> 
     (RM <?php echo ($cd['price']); ?>)</p> -->

  <form method="POST" action="order-sucess.php">
    <input type="hidden" name="cd_id" value="<?php echo htmlspecialchars($cdId); ?>">

    <div class="mb-3">
      <label class="form-label">Username</label>
      <input type="text" class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" readonly>
    </div>

    <div class="mb-3">
      <label class="form-label">Phone Number</label>
      <input type="text" class="form-control" value="<?php echo htmlspecialchars($user['phone_number']); ?>" readonly>
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
    </div>

    <div class="mb-3">
      <label class="form-label">Address (editable)</label>
      <input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($user['address']); ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">ORDER CD</label>
      <input type="text" class="form-control" name="cd_name" value="<?php echo htmlspecialchars($cd['name']); ?>" required>
    </div>

    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" name="confirm" required>
      <label class="form-check-label">I confirm my information is correct</label>
    </div>

    <button type="submit" class="btn btn-success">Submit Order</button>
  </form>

</body>
</html>
