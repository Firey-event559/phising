<?php
    session_start();



    require_once 'database.php';

    if(isset($_POST['login'])){
        $email = strip_tags($_POST['email']);

        
        $Query = $db->prepare("INSERT INTO gebruikers (email) VALUES (:email)");
        $Query->bindValue(':email', $email);
        $Query->execute();

       
        $sQuery = $db->prepare("SELECT * FROM gebruikers WHERE email = :email");
        $sQuery->bindValue(':email', $email);
        $sQuery->execute();
        $gebruiker = $sQuery->fetch(PDO::FETCH_ASSOC);

        if ($gebruiker) {
            
            $_SESSION['id'] = $gebruiker['id'];
            $_SESSION['email'] = $gebruiker['email'];

          

            echo  $_SESSION['id'] . "->".  $_SESSION['email'] ;


          
    }

    header('location: login2.php');

}
?>
