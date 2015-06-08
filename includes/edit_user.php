<?php
    
    require "db.php";
    //Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    
    $id = $_POST['id'];

    /*
     * Updating the user data as need. 
     */
    
    if (isset($_POST['submit-edit'])) {
        
        //print_r($_POST);
        $program = $_POST['program'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $egd = $_POST['egd'];
        //echo $name;
        try
        {
            // New database connection
            $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
            
            // Updating the accout table. 
            $stmt = $dbh->prepare( "UPDATE account
                                    SET program = :program, name =:name, egd = :egd, email= :email
                                    WHERE email = '$id'" );
            
            $stmt->bindParam(':program', $program, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':egd', $egd, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            
            $stmt->execute();

            //Updating the feed's email 
            $stmt = $dbh->prepare( "UPDATE feed
                                    SET email = :email
                                    WHERE email = '$id'" );
            
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            
            //$sql1 = "DELETE FROM feed where user_email = '$id'";
            //$result = $dbh->query($sql1) ;
            
            //
            //$current_page = $_SERVER['HTTP_REFERER'];
            header("location: ../summary.php");
            echo "edited the user";
            
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
?>