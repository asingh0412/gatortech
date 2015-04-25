<?php
    include("includes/forgotten_password_email.php");
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/cloud.png" />
    <title> Forgot your Password? </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/forgotten_password.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="site-container">
        <div class="container-fluid" id="page-head">
            <div id="site-header">
            </div>
        </div> <!-- Page Header -->
        <div class="containter-fluid" id="page-content">
            <div id="forgot-password-form-container">
                <form method="post">
                    <div class="text-left">
                        <h2> Forgot your password? </h2>
                        Enter the your Green River College email address that is associated with your account
                        and we will send you your password.
                    </div>
                    <div>
                        <br>
                        <div class="error-text text-left">
                            <?php echo $account_not_found_error; ?>
                        </div>
                        <input type="email" class="form-control" name="email" placeholder="Email" required><br>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-default text-right" name="submit_forgot_password_email">Submit</button>
                    </div>
                </form>
            </div>    
        </div>

        <div class="container-fluid" id="page-foot">
        </div> <!-- Page Footer -->
    </div> <!-- Site Container -->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>