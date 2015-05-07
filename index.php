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
        <script type="text/javascript" src="js/query.js"></script>
        <script type="text/javascript"  charset="utf-8" src="js/bootstrap.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    </head>
    <body>
        <div id="site-container">
        <div class="container-fluid" id="nav">
	    <div id='profile-bubble'>
                <a href='signout.php'> Sign Out </a>
		<img src='img/Headshot1.jpg' id='profile-picture-sm'>
	    </div>
        </div>
        
        <!-- Center the page in the middle and contain the layout
        to a specific width -->
        <div id="page-content" class="container-fluid"> <!-- start wrapper -->
            <form method="post" action="feed-post.php">
                <input type="text" name="message" size="50" maxlength="400">
                <input type="submit" name="post" value="Post">
            </form>
            <div class="page-data">
            </div>
       
            <h3 class="comment-title">News Feed</h3>

            <div class="comments-list">
                <ul class="comments-holder-ul">
                <?php foreach($result as $row) {
                    echo "<li class='comment-holder' id='_1'>
                            <div class='user-img'>
                                <img src='img/placeholder.jpeg'
                                class='user-img-pic img-responsive'
                                alt='Placeholder for image' />
                            </div>

                            <div class='comment-body'>
                                <form>
                                    <input type='hidden' name='user_email' value=".$row[user_email].">
                                    <button>".$row[user_name]."</button>
                                </form>
                                <div class='comment-text'>
                                    ".$row[user_post]." 
                                </div>
                                <div class='comment-date'>
                                    ".substr($row[post_date], 10, 6)." 
                                    ".substr($row[post_date], 0, 11)."
                                </div>
                            </div>
                        </li>";
                        }
                ?>
            </ul>
        </div>
    </div>
    </div> <!-- end wrapper -->
    </div>
</body>
</html>
