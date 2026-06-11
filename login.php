<?php
session_start();

$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

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
        <p>Please Try Again.</p>
        <hr>
<a href="login-form.php" class="btn-back">OK</a>
</div>
</div>
</body>
</html>';
exit;
}
if (isset($_POST['username'])) {

    $db = new PDO("mysql:host=localhost;dbname=project", "root", "");
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $db->prepare($query);
    $stmt->execute([
        ':username' => $username
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {

        $is_password_match = password_verify($password, $user['password']);

        if ($is_password_match) {

            $_SESSION['user'] = $user;

            header("Location: dashboard.php");
            exit;

        } else {
            error_page ("Incorrect Password!");
        }
    } else {
        error_page ("User not found!");
    }

} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>

</style>
</head>
<body>
    
</body>
</html>