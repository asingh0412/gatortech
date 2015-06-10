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
            <?php echo "<div class='container-fluid $nav_color' id='nav'>"; 
            if ($nav_color == 'Admin') {
                echo "<a href='create_account.php'>Create Account</a>";
                echo "<a href='summary.php'>View Accounts</a>";
            }
            ?>
            <a href='index.php' id="feed-link"> Feed </a>
			<a href='profile.php' id="signout-link"> Profile </a>
            <div id='profile-bubble'>
                <?php
                    echo "<a href='profile.php'><img src=$nav_picture id='profile-picture-sm'></a>";
                ?>
            </div>
            <a href='signout.php' id='nav-glyph' class='glyphicon glyphicon-log-out' title='Logout'></a>
            <a id='nav-glyph' class='glyphicon glyphicon-cog' title='Settings'></a>
        </div>
            <div id="page-content" class="container-fluid text-center"> <!-- start wrapper -->
                <div class='post-container text-left'>
                    <?php echo "
                            <div class='user-img-container $nav_color'>
                            <img src=$nav_picture
                            class='user-img'
                            alt='Placeholder for image'/>";
                        ?>
                    </div>
                    <div class='container-fluid post-body'>
                        <form id="post-form" method="post" action="feed_post.php">
                            <span><textarea type="text" autocomplete="off" placeholder="What's on your mind?"
                                            class="text-box-post" name="message" maxlength="400"
                                            required autofocus></textarea></span>
                            <hr class="hr-basic">
                            <div id="post-form-submit-btn" class="form-group">
                                <?php echo "<input class='btn btn-primary profile-feed-btn $nav_color' type='submit' id='post' name='post' value='Post'>"; ?>
                            </div>
                            <div id='hashtag-input-field-container'>
                                <label for='hashtag-input-field'> Select a tag : </label>
                                <select id='hashtag-input-field' name='hashtag-input-field'>
                                    <option value="general">general</option>
                                    <option value="jobs">jobs</option>
                                    <option value="events">events</option>
                                    <option value="books">books</option>
                                    <option value="internships">internships</option>
                                    <option value="scholarships">scholarships</option>
                                </select>
                            </div>
                        </form> 
                    </div>
                </div>
                <div id = 'feed-container'>
                    <?php
                    foreach($result as $row) {
                    $text = "<div class='post-container text-left'>
                            <div class='user-img-container ".$row[user_status]."'>
                                <img src=".$row[picture]."
                                class='user-img'
                                alt='Placeholder for image'/>
                            </div>
                            <div class='container-fluid post-body'>
                                <form class='user-btn-link' method='post' action='profile.php'>
                                    <input type='hidden' id='user_email' name='user_email' value=".$row[user_email].">
                                    <button class='btn btn-primary profile-feed-btn ".$row[user_status]."'>".$row[user_name]."</button>
                                </form>
                                <div class='delete-post-container'>";
                                if($_SESSION['login_session'] == $row[user_email]) {
                                    $text = $text . "<a href='includes/delete.php?id=$row[ID]'><span class='glyphicon glyphicon-remove side-bar-delete'></span></a>"; 
                                }
                                $text = $text . "</div><br>
                                <div class='post-date'>
                                    ".substr($row[post_date], 10, 6)." 
                                    ".substr($row[post_date], 0, 11)."
                                </div>
                                <hr class='hr-basic'>
                                <div class='post-text'>".$row[user_post]."<a href='tag_search.php?id=$row[hashtag]'>#".$row[hashtag]."</a>"."
                                <input type='hidden' id='user_post' name='user_post'
                                    value='{$row[user_post]}'> 
                                </div>
                            </div>
                        </div>";
                        $text = textToLink($text);
                        echo $text;
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
</body>
</html>
