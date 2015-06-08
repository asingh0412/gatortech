<?php

    // Id to edit a user.
    require "db.php";
    $id = $_GET['id'];
    //Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

   // if (isset($_POST[id]))
    //{
        try
        {
            // New database connection
            $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
                
            // Login account verification
            $sql = $dbh->prepare("SELECT program, status, name, picture, egd, email  FROM account WHERE email = '$id'");
            $sql->execute();
            $result = $sql->fetch();
            
            $program = $result['program'];
            $status = $result['status'];
            $name = $result['name'];
            $picture = $result['picture'];
            $egd = $result['egd'];
            $email = $result['email'];
        }
        catch (PDOException $e)
        {
                echo $e->getMessage();
        }
    //}
?>