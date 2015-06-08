<?php
    
    require "db.php";
    //Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    print_r($_POST);
    
    /*
     * Updating the user data as need. 
     */
    
    if (isset($_POST['submit-edit'])) {
        
        $id = $_POST['id'];
        $program = $_POST['program'];
        $name = $_POST['name'];
        $email1 = $_POST['email'];
        $egd = $_POST['egd'];

        try
        {
            // New database connection
            $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
            
            $email = $dbh->prepare("SELECT email FROM account WHERE email = '$_POST[email]'");
            $email->execute();
            
            // Testing if email already exists
            //if($id != $email){
            if($email -> rowCount() > 1){
                echo 'Email already exists';
            }
           else{
                
             //   echo "editing user";
                            // New database connection
            $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
            // Updating the accout table. 
            $stmt = $dbh->prepare( "UPDATE account
                                    SET program = :program, name =:name, egd = :egd, email= :email
                                    WHERE email = '$id'" );
            
            $stmt->bindParam(':program', $program, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':egd', $egd, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email1, PDO::PARAM_STR);
            
            $stmt->execute();
            //Updating the feed's email 
            $stmt = $dbh->prepare( "UPDATE feed
                                    SET email = :email
                                    WHERE email = '$id'" );
            
            $stmt->bindParam(':email', $email1, PDO::PARAM_STR);
            $stmt->execute();
            
            //header("location: ../summary.php");
            echo "edited the user";
          }
            
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
?>