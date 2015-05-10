<?php
// create a new DB connection 
 include('includes/session.php');
    
    // Database connection information
    require "includes/db.php";

    try
    {
        // New database connection
        $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
        
        // Login account verification
        $sql = $dbh->prepare("SELECT user_name, user_post, post_date, user_email FROM feed ORDER BY post_date DESC");
        $sql->execute();
        $result = $sql->fetchAll();

        // display all of the rows
        
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Responsive design -->
        <meta name="viewport" content="width=device-width, initial-scale=1 , maximum-scale=1">
        <meta charset="utf-8">
        <title>Feed</title>

        <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="all" href="css/index.css">
        <!-- <script type="text/javascript" src="js/query.js"></script>
        <!-- <script type="text/javascript"  charset="utf-8" src="js/bootstrap.min.js"></script> -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
    </head>
    
    <body>
        <div id="site-container">
            <div class="container-fluid" id="nav">
                <div id='profile-bubble'>
                    <a href='signout.php' id="signout-link"> Sign Out </a>
                    <img src='img/placeholder.jpeg' id='profile-picture-sm'>
                </div>
            </div>
        
        <!-- Center the page in the middle and contain the layout
        to a specific width -->
            <div id="page-content" class="container-fluid text-center"> <!-- start wrapper -->
                <form id="postForm" method="post" action="feed-post.php">
                    <span><input type="text" name="message" width='50px' maxlength="400"></span>
                    <input type="submit" id="post" name="post" value="Post">
                </form>
                
                <div id = 'feed-container'>
                <!--<h3>News Feed</h3>-->
                <?php foreach($result as $row) {
                    echo "<div class='post-container text-left'>
                            <div class='user-img-container'>
                                <img src='img/placeholder.jpeg'
                                class='user-img'
                                alt='Placeholder for image'/>
                            </div>
                            <div class='container-fluid post-body'>
                                <form class='user-btn-link'>
                                    <input type='hidden' id='user_email' name='user_email' value=".$row[user_email].">
                                    <button class='btn btn-primary profile-feed-btn'>".$row[user_name]."</button>
                                </form>
                                <div class='post-date'>
                                    ".substr($row[post_date], 10, 6)." 
                                    ".substr($row[post_date], 0, 11)."
                                </div>
                                <hr class='hr-basic'>
                                <div class='post-text'>".$row[user_post]."
                                <input type='hidden' id='user_post' name='user_post'
                                    value=".$row[user_post]."> 
                                </div>

                                <div class='comment-btn-holder'>
                                    <ul>
                                        <li class='delete-btn'>X</li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>";
                    }
                ?>
                </div>
            </div>
            <div id='page-footer' class='container-fluid'>
                <hr>
            </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/post_insert.js"></script>
</body>
</html>
