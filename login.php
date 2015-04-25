<?php
  if(isset($_SESSION['login_session']))
  {
    header("location: feed.php");
  }
  include('includes/signin.php');
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/cloud.png" />
    <title> GT </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  
    <div class="site-container">
      
        <div class="container-fluid" id="login-container">
	  <h3> Gator Tech </h3>
	  <form id="login-form" method="post">
	    <div class="error-text text-center">
          	<?php echo $login_error; ?>
	    </div>
	    <div class="form-group">
		<input type="email" class="form-control" name="login_email" placeholder="Email" value="<?php echo $login_email_input_value; ?>" required>
	    </div> <!-- Form Group -->
	    <br>
	    <div class="form-group">
	      <input type="password" class="form-control" name="login_password" placeholder="Password" required>
	    </div> <!-- Form Group -->
	    <br>
	    <div class="form-group text-center">
	      <button type="submit" class="btn btn-default login-btn" name="submit-login">Sign in</button><br><br>
	      <span class="text-left">Forgot your password? <a href="forgotten_password.php" target="_blank"> Click Here </a></span><br>
	    </div> <!-- Form Group -->
	  </form> <!-- Form -->
        </div> <!-- Container Fluid -->
	
    </div> <!-- Site Container -->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
</body>
</html>
