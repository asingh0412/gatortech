<?php
    
    //Turn on error reporting
    //ini_set('display_errors', 1);
    //error_reporting(E_ALL);
    //print_r($_GET);
    
    //echo 'I am in php';
    $id = $_GET['id'];
    // Database connection information
    require "db.php";
    try
    {
        // New database connection
        $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
        
        // Login account verification
        $sql = "DELETE FROM account where email = '$id'";
        $result = $dbh->query($sql) ;
        
        $sql1 = "DELETE FROM feed where user_email = '$id'";
        $result = $dbh->query($sql1) ;
        
        $current_page = $_SERVER['HTTP_REFERER'];
        header("location: $current_page");
        
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
?>