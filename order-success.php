<?php
session_start();
$db = new PDO("mysql:host=localhost;dbname=project", "root", "");

function submit_page($message, $icon = "bi-check-circle") {
    echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Submit Page</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;  
        align-items: center;      
        height: 100vh;            
        margin: 0;                 
        background-color: #ffffff; 
    }

    .icon-wrap {
        font-size: 60px;
        color: green;
        animation: rotate 1s ease forwards;
    }

    h1 {
        margin-top: 20px;
        font-size: 24px;
        animation: fadeSlide 1.5s ease forwards;
    }

    @keyframes slideIn {
        from {
            transform: translateX(-100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes rotate {
        from {
            transform: rotate(180deg);
            opacity: 0;
        }
        to {
            transform: rotate(0deg);
            opacity: 1;
        }
    }

    @keyframes fadeSlide {
        from {
            transform: translateX(-50%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .btn-back {
        display: inline-block;
        margin-top: 20px;
        padding: 8px 16px;
        text-decoration: none;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
    }
</style>
</head>
<body>
    <div class="icon-wrap"><i class="' . $icon . '"></i></div>
    <h1>' . htmlspecialchars($message) . '</h1>
    <hr>
    <a href="order-history.php" class="btn-back">OK</a>
</body>
</html>';
    exit;
}
$userId = $_SESSION['user']['id'];

$address = $_POST['address'];
$cdId = $_POST['cd_id'];

$stmt = $db->prepare("
    INSERT INTO orders (purchase_date, address, order_by, cd_id)
    VALUES (NOW(), ?, ?, ?)
");
$stmt->execute([$address, $userId, $cdId]);

  submit_page("Form submitted successfully!", "bi-check-circle");
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
