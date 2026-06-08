<?php
session_start();

$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

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

            echo "<h1>Wrong password!</h1>";

        }

    } else {
        echo "<h1>User not found!</h1>";
    }

} 

?>