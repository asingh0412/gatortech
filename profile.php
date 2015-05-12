<?php
    include('includes/session.php');
    // Database connection information
    require "includes/db.php";
    require "includes/load_profile.php";
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
        <div class="container-fluid" id="nav">
	    <div id='profile-bubble'>
		<a href='signout.php' id="signout-link"> Sign Out </a>
		<?php
		    echo "<img src=$picture id='profile-picture-sm'>";
		?>
	    </div>
        </div> <!-- Page Header -->
        <div class="container-fluid text-center" id="profile-content">
	    <?php
		echo "
		    <div id='profile-picture-bubble'>
		        <img src=$picture id='profile-picture'>
		    </div></p>
		    <div id='name-buble'>$name</div>
		    <div id='program-bubble'>$program</div>
		    <div id='status-bubble'>$status</div>"
	    ?>
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
				<a href='includes/delete.php?id=$row[id]'><span class='glyphicon glyphicon-remove side-bar-delete'></span></a>
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
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>