<?php
    include('includes/session.php');
    require "includes/db.php";
    require "includes/load_feed.php";
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
                    <a href='profile.php'><img src='img/placeholder.jpeg' id='profile-picture-sm'></a>
                </div>
            </div>
        
        <!-- Center the page in the middle and contain the layout
        to a specific width -->
            <div id="page-content" class="container-fluid text-center"> <!-- start wrapper -->
                
                <div class='post-container text-left'>
                    <div class='user-img-container'>
                        <img src='img/placeholder.jpeg'
                        class='user-img'
                        alt='Placeholder for image'/>
                    </div>
                    <div class='container-fluid post-body'>
                        <form id="post-form" method="post">
                            <span><textarea type="text" autocomplete="off" placeholder="What's on your mind?"
                                            class="text-box-post" name="message" maxlength="400"
                                            required></textarea></span>
                            <hr class="hr-basic">
                            <div id="post-form-submit-btn" class="form-group">
                                <input class="btn btn-primary profile-feed-btn"type="submit" id="post" name="post" value="Post">
                            </div>
                        </form> 
                    </div>
                </div>
                
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
                                <div>
                                    <a href='includes/delete.php?id=$row[ID]'><span class='glyphicon glyphicon-remove side-bar-delete'></span></a>
                                    <a href='includes/delete.php?id='.$row[ID].'><span class='glyphicon glyphicon-remove side-bar-delete'></span></a>
                                </div>
                                <hr class='hr-basic'>
                                <div class='post-text'>".$row[user_post]."
                                <input type='hidden' id='user_post' name='user_post'
                                    value=".$row[user_post]."> 
                                </div>
                            </div>
                        </div>";
                    }
                ?>
                </div>
                <hr class="hr-white">
            </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- <script src="js/post_insert.js"></script> -->
    <script src="ajax/script.js"></script>
</body>
</html>
