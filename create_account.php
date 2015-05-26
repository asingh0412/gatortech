<?php

include('includes/session.php');
require "includes/db.php";

// Form handling
if (isset($_POST['submit'])) {

  try
      {
            // New database connection
            $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);

            $sql = $dbh->prepare("SELECT name, picture, status FROM account WHERE email = '$_SESSION[login_session]'");
            $sql->execute();
            $result = $sql->fetch();

            $program = $_POST['program'];
            $status = 'Student';
            $email = $_POST['email'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $picture = $result['picture'];
            $egd = $POST['egd'];

            // Password encryption using PHP 5.5 Password Hashing
            //$hash = password_hash($password, PASSWORD_DEFAULT);
    
            $stmt = $dbh->prepare("INSERT INTO account (program, status, email, password, name, picture, egd) 
              VALUES (:program, :status, :email, :password, :name, :picture, :egd)");
            $stmt->bindParam(':program', $program);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':picture', $picture);
            $stmt->bindParam(':egd', $_POST['egd']);

            $stmt->execute();
    
            //header("Location: index.php");
            echo 'Account created';
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
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
    <link rel="stylesheet" type="text/css" href="css/create_account.css">

    
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
        <input type="text" name="name" placeholder="Full name" class="form-control" maxlength="64" autofocus required></label>
        <p><label>Email
        <input type="email" name="email" placeholder="Email address" class="form-control" maxlength="64" required></label>
                <p><label>Password
        <input type="password" name="password" placeholder="Password" class="form-control" maxlength="64" required></label>

        <p><label>Program<select name="program" class="form-control" required>
          <option value="">Please select a degree</option>
          <option value="sd">Software Development</option>
          <option value="nw">Networking</option>
        </select></label>
        <p><label>Est. Grad Date
        <input type="text" name="egd" placeholder="Select a date" id="datepicker" class="form-control" required</label>
        <input name="submit" id="submit" type="submit" value="Create">


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



