<?php
require('header.php'); 

function error_page($message){
    echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Error Page</title>
<style>
    body { 
    display:flex; 
    justify-content:center; 
    align-items:center; 
    height:100vh; 
    margin:0; 
    background:#cfcfcf; 
    }
    .card {
     border:none; 
     margin:8px; 
     border-radius:10px; 
     width:400px; 
     background:#fff; 
     opacity:0.9; 
     padding:20px; 
     box-shadow:0 4px 5px rgba(0,0,0,0.2
     ); }
    .card-content { 
    text-align:center; 
    }
    .card-content h1 {
     margin-top:0;
      }
    .card-content hr { 
    margin:16px 0; 
    border:none; 
    border-top:1px solid #333; 
    }
    .btn-back { 
    margin-top:12px; 
    padding:6px 12px; 
    text-decoration:none; 
    }
</style>
</head>
<body>
<div class="card"><div class="card-content">
<h1>' . htmlspecialchars($message) . '</h1>
<hr>
<a href="login-form.php" class="btn-back">OK</a>
</div></div>
</body></html>';
    exit;
}

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
<html>
<head>
<title>Project</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
<div class="container mx-auto my-5" style="max-width:700px;">
  <h1 class="h1 mb-3"><?= $id ? "Edit User" : "Add New User" ?></h1>
  <div class="card p-4">
    <form method="POST">
      <input type="hidden" name="id" value="<?= $id ?>">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user['username']) ?>" />
      </div>
      <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select class="form-control" id="role" name="role">
          <option value="">Select an option</option>
          <option value="user" <?= $user['role']=="user"?"selected":"" ?>>User</option>
          <option value="admin" <?= $user['role']=="admin"?"selected":"" ?>>Admin</option>
        </select>
      </div>
      <div class="text-end">
        <button type="submit" class="btn btn-primary"><?= $id ? "Update" : "Add" ?></button>
      </div>
    </form>
  </div>
  <div class="text-center mt-3">
    <a href="user-manage.php" class="btn btn-link btn-sm"><i class="bi bi-arrow-left"></i> Back to Users</a>
  </div>
</div>
</body>
</html>
