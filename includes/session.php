<?php
// Starts a session
    session_start();
    require "db.php";
    
    try
    {
        $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
        $user_check = $_SESSION['login_session'];
        $sql = "SELECT email FROM account where email = '$user_check'";
        $result = $dbh->query($sql);
        $login_email = $result;
        
        if(!isset($_SESSION['login_session']))
        {
            $dbh = null;
            header('Location: login.php');
        }
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    } 
?>
