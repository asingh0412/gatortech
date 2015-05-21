<?php

include('includes/session.php');
require "includes/db.php";

// Form handling
if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['program']) && !empty($_POST['datepicker'])) {
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
            echo 'Form submitted';
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
} else {
  echo 'Please fill out all required fields';
}
    

  echo $error;

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
    
    <!-- Hide the calendar default view -->
    <style>
    .ui-datepicker-calendar {
    display: none;
}​
</style>

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
    /* Set to only show the month and year */
    $('#datepicker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
});
   </script>

</body>
</html>



