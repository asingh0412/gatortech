<?php
        try
        {
            // New database connection
            $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
                
            // Login account verification
            $sql = $dbh->prepare("SELECT picture, status FROM account WHERE email = '$_SESSION[login_session]'");
            $sql->execute();
            $result = $sql->fetch();
            
            $nav_picture = $result['picture'];
            $nav_color = $result['status'];
            
            $dbh = null;
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
                $sql = $dbh->prepare("SELECT program, status, name, picture, status FROM account WHERE email = '$_POST[user_email]'");
                $sql->execute();
                $result = $sql->fetch();
                
                $program = $result['program'];
                $status = $result['status'];
                $name = $result['name'];
                $picture = $result['picture'];
                $status = $result['status'];
    
                $sql2 = $dbh->prepare("SELECT user_name, user_post, post_date, user_email, picture, user_status, ID, hashtag FROM feed WHERE user_email = '$_POST[user_email]' ORDER BY post_date DESC");
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
                $sql = $dbh->prepare("SELECT program, status, name, picture, status FROM account WHERE email = '$_SESSION[login_session]'");
                $sql->execute();
                $result = $sql->fetch();
                
                $program = $result['program'];
                $status = $result['status'];
                $name = $result['name'];
                $picture = $result['picture'];
                $status = $result['status'];
    
                $sql2 = $dbh->prepare("SELECT user_name, user_post, post_date, user_email, picture, user_status, ID, hashtag FROM feed WHERE user_email = '$_SESSION[login_session]' ORDER BY post_date DESC");
                $sql2->execute();
                $result2 = $sql2->fetchAll();
                
            }
            catch (PDOException $e)
            {
                    echo $e->getMessage();
            }
        }
        
        function textToLink($text)
        {
            // force http: on www.
            $text = ereg_replace( "www\.", "http://www.", $text );
            // eliminate duplicates after force
            $text = ereg_replace( "http://http://www\.", "http://www.", $text );
            $text = ereg_replace( "https://http://www\.", "https://www.", $text );
          
            // The Regular Expression filter
            $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
            // Check if there is a url in the text
            if(preg_match($reg_exUrl, $text, $url))
            {
                   // make the urls hyper links
                   $text = preg_replace($reg_exUrl, '<a href="'.$url[0].'" rel="nofollow">'.$url[0].'</a>', $text);
            }    // if no urls in the text just return the text
                   return ($text);
        }
?>