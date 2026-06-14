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
  <style>
body{
    background: #f4f6f9;
    min-height: 100vh;
}

.order-card{
    border:none;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.order-header{
    background: linear-gradient(135deg,#198754,#146c43);
    color:white;
    padding:30px;
}

.order-header h1{
    font-weight:700;
    margin-bottom:5px;
}

.section-title{
    font-size:14px;
    font-weight:600;
    color:#6c757d;
    text-transform:uppercase;
    letter-spacing:1px;
    margin-bottom:15px;
}

.form-control{
    border-radius:12px;
    padding:12px;
}

.form-control:read-only{
    background:#f8f9fa;
}

.cd-preview{
    background:#f8f9fa;
    border-radius:15px;
    padding:20px;
    border:1px solid #e9ecef;
}

.price-tag{
    font-size:28px;
    font-weight:700;
    color:#198754;
}

.submit-btn{
    border-radius:12px;
    padding:14px;
    font-size:18px;
    font-weight:600;
}
</style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card order-card">

                <div class="order-header text-center">
                    <h1>Confirm Your Order</h1>
                    <p class="mb-0">Review your information before checkout</p>
                    
            </div>
                <div class="card-body p-4">

                    <div class="cd-preview mb-4">

                        <div class="section-title">
                            CD Information
                        </div>

                        <div class="row align-items-center">

                            <div class="col-md-3 text-center">
                                <img src="<?= $cd['cd_image']; ?>"
                                     class="img-fluid rounded"
                                     style="max-height:150px;">
                            </div>
                          
                            <div class="col">
                                <h3 class="fw-bold mb-2">
                                    <?= $cd['name']; ?>
                                </h3>

                                <div class="price-tag">
                                    <?= $cd['price']; ?>
                                </div>
                            </div>

                        </div>

                    </div>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white text-center py-3">
                    <h2 class="mb-0">Order Confirmation</h2>
                </div>

                <div class="card-body p-4">

                    <form method="POST" action="order-success.php">
                        <input type="hidden" name="cd_id" value="<?= $cdId; ?>">
                         <div class="mb-4">
                            <label class="form-label fw-bold">Username</label>
                            <input type="text"
                                   class="form-control"
                                   value="<?= $user['username']; ?>"
                                   readonly>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Phone Number</label>
                            <input type="text"
                                   class="form-control"
                                   value="<?= $user['phone_number']; ?>"
                                   readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email"
                                   class="form-control"
                                   value="<?= $user['email']; ?>"
                                   readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Address</label>
                            <input type="text"
                                   class="form-control"
                                   name="address"
                                   value="<?= $user['address']; ?>"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">CD Ordered</label>
                            <input type="text"
                                   class="form-control"
                                   name="cd_name"
                                   value="<?= $cd['name']; ?>"
                                   required>
                        </div>

                        <div class="alert alert-light border">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>CD Name:</strong>
                                    <?= $cd['name']; ?>
                                </div>

                                <div class="col-md-6 text-md-end">
                                    <strong>Price:</strong>
                                    RM <?= $cd['price']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="confirm"
                                   required>

                            <label class="form-check-label">
                                I confirm my information is correct
                            </label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">
                                Submit Order
                            </button>
                            


                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<div class="d-flex flex-column justify-content-center align-items-center">
<a href="cd-manage.php" type="button" class="btn btn-danger rounded-circle d-inline-flex align-items-center justify-content-center " style="width: 40px; height: 40px;">
<i class="bi bi-bag-x"></i>
</a>
 <div class="tex-align-center">Cancel</div>
              </div>
</body>
</html>
