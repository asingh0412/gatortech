<?php

    if (isset($_POST[user_email]))
    {
        try
        {
            // New database connection
            $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
                
            // Login account verification
            $sql = $dbh->prepare("SELECT program, status, name, picture, egd, email  FROM account");// WHERE email = '$_POST[user_email]'");
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
    }
    else
    {
         try
        {
            // New database connection
            $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
                
            // Login account verification
            $sql = $dbh->prepare("SELECT program, status, name, picture, egd, email FROM account ");// WHERE email = '$_SESSION[login_session]'");
            $sql->execute();
            $result = $sql->fetchAll();
            
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
   }
?>