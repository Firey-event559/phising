<?php



session_start();
$_SESSION['id'];
$_SESSION['email'];

require_once 'database.php';

if (isset($_POST['login'])) {
    $userId = $_SESSION['id'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    


        $updateQuery = $db->prepare("UPDATE gebruikers SET wachtwoord = :password WHERE id = :userId");
        $updateQuery->bindParam(':password', $password);
        $updateQuery->bindParam(':userId', $userId);
        $updateQuery->execute();

}

?>

