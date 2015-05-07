<?php
    include('includes/session.php');
    
	// Database connection information
	require "includes/db.php";

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
	}
	catch (PDOException $e)
	{
		echo $e->getMessage();
	}
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/cloud.png" />
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
		<img src='img/Headshot1.jpg' id='profile-picture-sm'>
	    </div>
        </div> <!-- Page Header -->

        <div class="container-fluid text-center" id="profile-content">
	    <?php
		echo "
		    <div id='profile-picture-bubble'>
		        <img src='img/Headshot1.jpg' id='profile-picture'>
		    </div></p>
		    <div id='name-buble'>$name</div>
		    <div id='program-bubble'>$program</div>
		    <div id='status-bubble'>$status</div>"
	    ?>
        </div>
	<div id="profile-feed">
	    
	</div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>