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
        
        if (isset($_POST[user_email]))
        {
            try
            {
                // New database connection
                $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
                    
                // Login account verification
                $sql = $dbh->prepare("SELECT program, status, name, picture FROM account WHERE email = '$_POST[user_email]'");
                $sql->execute();
                $result = $sql->fetch();
                
                $program = $result['program'];
                $status = $result['status'];
                $name = $result['name'];
                $picture = $result['picture'];
    
                $sql2 = $dbh->prepare("SELECT user_name, user_post, post_date, user_email, picture, ID FROM feed WHERE user_email = '$_POST[user_email]' ORDER BY post_date DESC");
                $sql2->execute();
                $result2 = $sql2->fetchAll();
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
                $sql = $dbh->prepare("SELECT program, status, name, picture FROM account WHERE email = '$_SESSION[login_session]'");
                $sql->execute();
                $result = $sql->fetch();
                
                $program = $result['program'];
                $status = $result['status'];
                $name = $result['name'];
                $picture = $result['picture'];
    
                $sql2 = $dbh->prepare("SELECT user_name, user_post, post_date, user_email, picture, ID FROM feed WHERE user_email = '$_SESSION[login_session]' ORDER BY post_date DESC");
                $sql2->execute();
                $result2 = $sql2->fetchAll();
                
            }
            catch (PDOException $e)
            {
                    echo $e->getMessage();
            }
        }
?>