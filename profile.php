<?php
    include('includes/session.php');
    require "includes/db.php";
    require "includes/load_profile.php";
    require "includes/upload.php";
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="site-container">
	<?php echo "
	    <div class='container-fluid $nav_color' id='nav'>";
	?>
	    <a href='index.php' id="signout-link"> Feed </a>
	    <div id='profile-bubble'>
		<?php
		    echo "<a href='profile.php'><img src=$nav_picture id='profile-picture-sm'></a>";
		?>
	    </div>
	    <a href='signout.php' id='nav-glyph' class='glyphicon glyphicon-log-out'></a>
	    <!-- <a id='nav-glyph' class='glyphicon glyphicon-cog'></a> -->
        </div> <!-- Page Header -->
        <div class="container-fluid text-center" id="profile-content">
	    <?php
		echo "
		    <div id='profile-picture-bubble'>
			<figure>
			    <img src=$picture id='profile-picture'>";
			    if ((!isset($_POST[user_email]))||($_POST[user_email]==$_SESSION['login_session']))
			    {
				echo 	"<figcaption>
					    <a href='#' class='modal-link nav-link' data-toggle='modal' data-target='#upload-modal'>
					    <span class='glyphicon glyphicon-camera upload-photo'></span></a>
					</figcaption>";
			    }
			echo "</figure>
		    </div></p>
		    <div id='name-buble'>$name</div>
		    <div id='program-bubble'>$program</div>
		    <div id='status-bubble'>$status</div>";
	    ?>
	
	    <div id = 'feed-container'>
	    <!--<h3>News Feed</h3>-->
	    <?php foreach($result2 as $row) {
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
                                <div class='post-text'>".$row[user_post]."<a href='tag_search.php?id=$row[hashtag]'> #".$row[hashtag]."</a>"."
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
        </div>
	
	<div class="modal fade" id="upload-modal" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <form class="upload-form" method="post" enctype="multipart/form-data">
	        <div class="modal-body">
		    <label>Image File:</label>
		    <input type="file" name="image">
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-primary btn-upload" data-dismiss="modal">Cancel</button>
		  <input type="submit" name='submit-upload' class="btn btn-primary btn-upload" value='Upload'>
		</div> <!-- Modal Footer -->
	      </form>
	    </div> <!-- Modal Content -->
	  </div> <!-- Modal Dialog -->
	</div> <!-- Modal -->
	
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>