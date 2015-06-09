<?php
  require 'includes/load_account.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1 , maximum-scale=1">
    <meta charset="utf-8">
    <title>Create Account</title>
    <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/create_account.css">

  </head>
  
  <body>
    
    <div class="container">
      <h1>Create Account</h1>
      <hr>

    <form action="create_account.php" id="create_form" method="POST" class="form-group" autocomplete="false" novalidate>
        <div class="form-group">
          <label for="name">Student Name</label>
          <input type="text" name="name" placeholder="Full name" class="form-control" maxlength="64" autofocus required>
        </div>
        
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" placeholder="Email address" class="form-control" maxlength="64" required>
        </div>
        
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" placeholder="Password" class="form-control" maxlength="64"  required>
        </div>
  
        <div class="form-group">
          <label for="program">Program</label>
          <select name="program" class="form-control" required>
            <option value="">Please select a degree</option>
            <option value="Software Development">Software Development</option>
            <option value="Networking">Networking</option>
          </select></label>
        </div>
        
        <div class="form-group">
          <label for="egd">Est. Grad Date</label>
          <input type="text" name="egd" placeholder="Select a date" id="datepicker" class="form-control" required>
        </div>  
        <button class='btn btn-default' name="submit" id="submit" type="submit">Create</button>
    
      <h4><a href="index.php">Back to Feed</a></h4>
    </div><!--Ending container div-->

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      
      <script src="js/datepicker.js"></script>
      <script src="js/validator.js"></script>
      <script src="js/dominar-standalone.min.js"></script>
      
  </body>
</html>