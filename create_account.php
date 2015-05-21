<?php

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
      <p><label>Student name:
        <input type="text" name="name" placeholder="Full name" class="form-control"></label>
        <p><label>Program:<select name="program" class="form-control">
          <option value="sd">Software Development</option>
          <option value="nw">Networking</option>
        </select></label>
        <p><label>Estimated graduation date:
        <input type="text" name="datepicker" placeholder="Select a date" id="datepicker" class="form-control"</label>
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



