<?php
    try
    {
        // New database connection
        $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
            
        // Login account verification
        $sql = $dbh->prepare("SELECT picture FROM account WHERE email = '$_SESSION[login_session]'");
        $sql->execute();
        $result = $sql->fetch();
        
        $nav_picture = $result['picture'];
    }
    catch (PDOException $e)
    {
            echo $e->getMessage();
    }
        
    try
    {
        // New database connection
        $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
        
        // Login account verification
        $sql = $dbh->prepare("SELECT user_name, user_post, post_date, user_email, picture, user_status, ID FROM feed ORDER BY post_date DESC");
        $sql->execute();
        $result = $sql->fetchAll();

        // display all of the rows  
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }   
?>