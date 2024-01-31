<?php

session_start();
$userId = $_SESSION['id'];
$userEmail = $_SESSION['email'];

require_once 'database.php';

if (isset($_POST['login'])) {
    $password = $_POST['password'];

    $salt = uniqid(mt_rand(), true);
$saltedPassword = $password . $salt;
$hashedPassword = password_hash($saltedPassword, PASSWORD_DEFAULT);


    $updateQuery = $db->prepare("UPDATE gebruikers SET wachtwoord = :wachtwoord WHERE email = :userEmail");
    $updateQuery->bindParam(':wachtwoord', $hashedPassword);
    $updateQuery->bindParam(':userEmail', $userEmail);
    $updateQuery->execute();
}

?>




