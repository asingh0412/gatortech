<?php
    $id = $_GET['id'];
    // Database connection information
    require "db.php";
    try
    {
        // New database connection
        $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
        
        // Login account verification
        $sql = "DELETE FROM feed where ID = '$id'";
        $result = $dbh->query($sql) ;
        header("location: ../index.php");
        
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
?>