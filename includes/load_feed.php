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
    }
    catch (PDOException $e)
    {
            echo $e->getMessage();
    }
        
    try
    {
        // New database connection
        $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
        
        // Login account verification
        $sql = $dbh->prepare("SELECT user_name, user_post, post_date, user_email, picture, user_status, ID, hashtag FROM feed ORDER BY post_date DESC");
        $sql->execute();
        $result = $sql->fetchAll();

        // display all of the rows  
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
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