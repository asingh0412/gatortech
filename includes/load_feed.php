<?php
    try
    {
        // New database connection
        $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
        
        // Login account verification
        $sql = $dbh->prepare("SELECT user_name, user_post, post_date, user_email, ID FROM feed ORDER BY post_date DESC");
        $sql->execute();
        $result = $sql->fetchAll();

        // display all of the rows
        
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }   
?>