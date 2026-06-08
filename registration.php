<?php

$username=isset($_POST['username']) ? $_POST['username'] :null;
$password=isset($_POST['password']) ? $_POST['password'] :null;
$phone_number=isset($_POST['phone_number']) ? $_POST['phone_number'] :null;
$email=isset($_POST['email']) ? $_POST['email'] :null;
$address=isset($_POST['address']) ? $_POST['address'] :null;

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

    echo "<h1>User has been successfully registered.</h1>";

?>