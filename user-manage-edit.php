<?php
require('header.php'); 

$id = $_GET['id'] ?? null;
$user = ['username' => '', 'role' => ''];

if ($id) {
    $stmt = $db->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute([':id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC) ?: $user;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $role = $_POST['role'];
    $id = $_POST['id'] ?? null;

    if ($id) {
        $stmt = $db->prepare("UPDATE users SET username=:username, role=:role WHERE id=:id");
        $stmt->execute([":username"=>$username, ":role"=>$role, ":id"=>$id]);
    } 
    header("Location: user-manage.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User | Management Dashboard</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Playfair+Display:wght@600;800&display=swap" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #fdf0cd 0%, #fadf86 50%, #eec12f 100%) !important;  
      min-height: 100vh;
      font-family: "Merriweather", serif;
    }
    .title {
      font-family: 'Playfair Display', serif;
      font-weight: 800;
      color: #332700;
      letter-spacing: 2px;
      text-shadow: 1px 1px 0px rgba(255,255,255,0.5);
    }
    .card {
      background: rgba(255, 255, 255, 0.9);
      border: 4px solid #332700;
      border-radius: 16px;          
      
    }
    .form-label {
      color: #4a3b00;
      letter-spacing: 0.5px;
      margin-bottom: 0.4rem;
    }
    .form-control, .form-select {
      border: 2px solid #d4c185;
      border-radius: 8px;
      padding: 0.6rem 0.75rem;
      background-color: #fffdf6;
      transition: all 0.3s ease;
    }
    .form-control:focus, .form-select:focus {
      border-color: #332700;
      box-shadow: 0 0 0 0.25rem rgba(238, 193, 47, 0.25);
      background-color: #ffffff;
    }
    .btn-edit {
      background: #332700;
      color: #fadf86;
      border: 2px solid #332700;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      padding: 0.75rem;
      border-radius: 30px;
      transition: all 0.3s ease;
    }
    .btn-edit:hover {
      background: #fadf86;
      color: #332700;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(51, 39, 0, 0.2);
    }
    .btn-back {
      color: #5c4900;
      font-weight: 600;
      transition: all 0.2s ease;
    }
    .btn-back:hover {
      color: #332700;
      transform: translateX(-3px);
    }
  </style>
</head>
<body>
<div class="container mx-auto my-5" style="max-width:600px;">

  <div class="text-center mb-4">
    <h1 class="title display-5">Edit User Info</h1>
  </div>

  <div class="card p-4 p-md-5">
    <form method="POST">
      <input type="hidden" name="id" value="<?= $id  ?>">
      
      <div class="mb-4">
        <label for="username" class="form-label fw-bold small"><i class="bi bi-person-fill me-1"></i> Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" placeholder="Enter username" required />
      </div>
      <!-- <div class="mb-4">
        <label for="username" class="form-label fw-bold small"><i class="bi bi-person-fill me-1"></i> Password</label>
        <input type="text" class="form-control" id="password" name="password" value="<?= $user['password'] ?>" placeholder="Enter password" required />
      </div> -->
      <div class="mb-4">
        <label for="username" class="form-label fw-bold small"><i class="bi bi-person-fill me-1"></i> Phone Number</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $user['phone_number'] ?>" placeholder="Enter phone number " required />
      </div>
      <div class="mb-4">
        <label for="email" class="form-label fw-bold small"><i class="bi bi-person-fill me-1"></i> Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" placeholder="Enter email" required />
      </div>
      <div class="mb-4">
        <label for="username" class="form-label fw-bold small"><i class="bi bi-person-fill me-1"></i> Email</label>
        <input type="text" class="form-control" id="address" name="address" value="<?= $user['address'] ?>" placeholder="Enter username" required />
      </div>

      <div class="mb-5">
        <label for="role" class="form-label fw-bold small"><i class="bi bi-shield-lock-fill me-1"></i> User Role Strategy</label>
        <select class="form-select" id="role" name="role" required>
          <option value="">Select Role</option>
          <option value="user" <?= $user['role'] == "user" ? "selected" : "" ?>>User</option>
          <option value="admin" <?= $user['role'] == "admin" ? "selected" : "" ?>>Admin</option>
        </select>
      </div>

      <div>
        <button type="submit" class="btn btn-edit w-100 d-flex align-items-center justify-content-center gap-2">
          <i class="bi bi-cloud-arrow-up-fill"></i> Save Edit</button>
      </div>
    </form>
  </div>

  <div class="text-center mt-4">
    <a href="user-manage.php" class="btn btn-link btn-sm btn-back text-decoration-none">
      <i class="bi bi-arrow-left-circle-fill"></i> Back to User Manage
    </a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>