<?
require 'includes/load_account.php';
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
          <option value="Software Development">Software Development</option>
          <option value="Networking">Networking</option>
        </select></label>
        <p><label>Est. Grad Date
        <input type="text" name="egd" placeholder="Select a date" id="datepicker" class="form-control" required</label>
        <input name="submit" id="submit" type="submit" value="Create">

        <h4><a href="index.php">Back to Feed</a>


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



