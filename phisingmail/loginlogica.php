<?php
    session_start();

    require_once 'database.php';

    if(isset($_POST['login'])){
        $email = strip_tags($_POST['email']);

        
        $insertQuery = $db->prepare("INSERT INTO gebruikers (email) VALUES (:email)");
        $insertQuery->bindValue(':email', $email);
        $insertQuery->execute();

        
        $selectQuery = $db->prepare("SELECT * FROM gebruikers WHERE email = :email");
        $selectQuery->bindValue(':email', $email);
        $selectQuery->execute();
        $gebruiker = $selectQuery->fetch(PDO::FETCH_ASSOC);

        if ($gebruiker) {
           
            $_SESSION['id'] = $gebruiker['id'];
            $_SESSION['email'] = $gebruiker['email'];

           
            echo $_SESSION['id'] . "->" . $_SESSION['email'];

            
            header('location: login2.php');
            exit(); 
        }
    }
?>



<?php

$username = "root";
$password = "";

$db = new PDO('mysql:host=localhost;dbname=test1', $username, $password);

if(isset($_POST['send'])){
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);

   

    $insertQuery = $db->prepare("INSERT INTO gebruikers (email, password) VALUES (:email, :password)");
    $insertQuery->bindValue(':email', $email);
    $insertQuery->bindValue(':password', $password);
    $insertQuery->execute();
}

?>
