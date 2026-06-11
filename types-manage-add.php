<?php
require('header.php');


$query = "INSERT INTO types (name) VALUES (:name)";
function error_page($message){
    echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Error Page</title>
<style>
    body {
        display: flex;
        justify-content: center;  
        align-items: center;      
        height: 100vh;            
        margin: 0;                 
        background-color: #cfcfcf; 
    }

    .card {
        border: none;
        margin: 8px;
        border-radius: 10px;
        width: 400px;
        background-color: #ffffff;
        opacity: 0.7;              
        padding: 20px;         
        box-shadow: 0 4px 5px rgba(0, 0, 0, 0.2); 
    .card-content {
        text-align: center;
    }

    .card-content h1 {
        margin-top: 0;
    }

    .card-content hr {
        margin: 16px 0;
        border: none
        border-top: 1px solid #333;
    }

    .btn-back {
        margin-top: 12px;
        padding: 6px 12px;
        text-decoration: none;
    

</style>
</head>
<body>
    <div class="card">
        <div class="card-content">
        <h1>' . htmlspecialchars($message) . '</h1>
        <hr>
<a href="login-form.php" class="btn-back">OK</a>
</div>
</div>
</body>
</html>';
exit;
}
if(isset($_POST['name']) ){
    $name = $_POST['name'];
  
    $post_by = $_POST['post_by'];
    $stmt = $db->prepare($query);
    $stmt->execute([
        ":name"=>$name
    ]);

    error_page ("New type added!");

    header("Location: types-manage.php");
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Project</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
    <style type="text/css">
      body {
        background: #F1F1F1;
      }
    </style>
  </head>
  <body>
    <div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Add New Type</h1>
      </div>
      <div class="card mb-2 p-4">
        <form method="POST" >
          <div class="mb-3">
            <label for="name" class="form-label">Type:</label>
            <input type="text" class="form-control" id="name" name="name" />
          </div>
        <input type="hidden" name="post_by" value="1">
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
      <div class="text-center">
        <a href="types-manage.php" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Posts</a
        >
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
   
  </body>
</html>