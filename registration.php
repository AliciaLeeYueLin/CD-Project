<?php

$username=isset($_POST['username']) ? $_POST['username'] :null;
$password=isset($_POST['password']) ? $_POST['password'] :null;
$phone_number=isset($_POST['phone_number']) ? $_POST['phone_number'] :null;
$email=isset($_POST['email']) ? $_POST['email'] :null;
$address=isset($_POST['address']) ? $_POST['address'] :null;

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
 $db = new PDO("mysql:host=localhost;dbname=project", "root", "");

    $query = "INSERT INTO users (username, password, phone_number, email, address, role)
              VALUES (:username, :password, :phone_number, :email, :address, :role)";

    $stmt = $db->prepare($query);

    $stmt->execute([
        ':username' => $username,
        ':password' => password_hash($password, PASSWORD_BCRYPT),
        ':phone_number' => $phone_number,
        ':email' => $email,
        ':address' => $address,
        ':role' => 'user'
    ]);

        error_page ("User successfully register!!");

?>