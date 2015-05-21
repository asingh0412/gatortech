<?php

include('includes/session.php');
require "includes/db.php";

// Form handling
$name = $_POST['name'];
$email = $_POST['email'];
$form_password = $_POST['password'];
$prog = $_POST['program'];
$_date = $_POST['datepicker'];

$vars = array('name', 'email', 'password', 'program', 'datepicker',);

foreach($vars as $var_name)
{

   if(!empty($_POST[$var_name])) 
   {
        
    }
}

try
        {
            // New database connection
            $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
    
            // $stmt = $dbh->prepare("INSERT INTO feed (user_email, user_name, user_post, picture) VALUES (:user_email, :user_name, :user_post, :picture)");
            // $stmt->bindParam(':user_name', $name);
            // $stmt->bindParam(':user_email', $_SESSION['login_session']);
            // $stmt->bindParam(':user_post', $_POST['message']);
            // $stmt->bindParam(':picture', $picture);
            // $stmt->execute();
    
            //header("Location: index.php");
            echo 'Connected';
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
    <title>Create a new account</title>
    <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
  </head>
  <body>
    <form action="create_account.php" method="POST" class="form-group">
      <p><label>Student Name
        <input type="text" name="name" placeholder="Full name" class="form-control" autofocus pattern="[A-Za-z]+\s[A-Za-z]+" required> </label>
        <p><label>Email
        <input type="email" name="email" placeholder="Email address" class="form-control" required></label>
                <p><label>Password
        <input type="password" name="password" placeholder="Password" class="form-control" required></label>

        <p><label>Program<select name="program" class="form-control">
          <option value="sd">Software Development</option>
          <option value="nw">Networking</option>
        </select></label>
        <p><label>Est. Grad Date
        <input type="text" name="datepicker" placeholder="Select a date" id="datepicker" class="form-control" required</label>
        <input id="submit" type="submit" value="Create">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
      </form>
      <script>
  // jQuery Datepicker  
  $(function()
  {
    $('#datepicker').datepicker();
  }
  );
   </script>

</body>
</html>



