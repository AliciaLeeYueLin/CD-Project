<?php
require('header.php');


if(isset($_POST['id'])){
  $id = $_POST['id'];

  $query_delete = "DELETE FROM users WHERE id = :id";
  $stmt = $db->prepare($query_delete);
  $stmt->execute([":id" => $id]);
}

$query = "SELECT * FROM users ORDER BY id ASC";
$stmt = $db->prepare($query);
$stmt->execute([]);
$users = $stmt->fetchAll();
?>
<!DOCtype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Formats Users</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;700&family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">

  <style style="text/css">
    body {
      background: #f4f6f9;
      font-family: 'Plus Jakarta Sans', sans-serif;
      color: #333333;
    }
    
    .merriweather {
      font-family: "Merriweather", serif;
    }

    .management-wrapper {
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
      border: 1px solid rgba(0, 0, 0, 0.05);
      overflow: hidden;
    }

    .panel-header {
      background: linear-gradient(135deg, #330867 0%, #30cceb 100%);
      padding: 30px;
      color: #ffffff;
    }

    /* List Item Row Styles */
    .user-item-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 16px 24px;
      border-bottom: 1px solid #efefef;
      transition: all 0.25s ease;
    }

    .user-item-row:last-child {
      border-bottom: none;
    }

    .user-item-row:hover {
      background-color: #f8fafc;
      transform: scale(1.01);
    }

    
    .id-badge {
      background: #f1f3f7;
      color: #6c757d;
      font-weight: 700;
      font-size: 0.85rem;
      padding: 4px 10px;
      border-radius: 8px;
      margin-right: 15px;
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
    
    .btn-edit:hover {
      color: #30cceb;
      background-color: rgba(48, 204, 235, 0.1);
    }

    .btn-delete:hover {
      color: #dc3545;
      background-color: rgba(220, 53, 69, 0.1);
    }

    .btn-add-custom {
      background: rgba(255, 255, 255, 0.2);
      border: 1px solid rgba(255, 255, 255, 0.4);
      color: #ffffff;
      font-weight: 600;
      backdrop-filter: blur(5px);
      transition: all 0.3s ease;
    }

    .btn-add-custom:hover {
      background: #ffffff;
      color: #330867;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
  </style>
</head>

<body>

  <div class="container my-5" style="max-width: 550px;">
    
    <div class="management-wrapper">
      
      <div class="panel-header d-flex justify-content-between align-items-center">
        <div>
          <h1 class="h3 mb-1 fw-bold merriweather">Manage Users</h1>
          <p class="small text-white-50 mb-0">User Management</p>
        </div>
        <a href="user-manage-add.php" class="btn btn-add-custom btn-sm py-2 px-3 rounded-pill">
          <i class="bi bi-plus-lg me-1"></i> Add New
        </a>
      </div>

      <div class="panel-body">
        <?php if(count($users) > 0): ?>
          <?php foreach ($users as $user): ?>
            <div class="user-item-row">
              <div class="d-flex align-items-center">
                <span class="id-badge">#<?= $user['id'] ?></span>
                <span class="fw-semibold text-dark fs-5"><?= $user['username'] ?>  [<?= $user['role'] ?>]</span>

              </div>
             
              <div class="d-flex gap-1">
                <a href="user-manage-edit.php?id=<?= $user['id'] ?>" class="action-btn btn-edit" title="Edit Category">
                  <i class="bi bi-pencil-square"></i>
                </a>
                <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" style="display:inline;">
                  <input type="hidden" name="id" value="<?= $user['id'] ?>">
                  <button type="submit" class="action-btn btn-delete" title="Delete Category">
                    <i class="bi bi-trash3-fill"></i>
                  </button>
                </form>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="p-5 text-center text-muted">
            <i class="bi bi-folder-x fs-1 d-block mb-2 text-black-50"></i>
            No formats found. Click "Add New" to begin.
          </div>
        <?php endif; ?>
      </div>

    </div>

    <div class="text-center mt-4">
      <a href="dashboard.php" class="btn btn-link btn-sm text-secondary text-decoration-none fw-semibold">
        <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
      </a>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>