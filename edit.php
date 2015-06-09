<?php
    include('includes/session.php');
    require "includes/db.php";
    require "includes/load_edit.php";
    //require "includes/load_summary.php";
    
        //Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
?>

<!DOCTYPE html>

<html>
<head>
    <title>Edit User</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet">
    
</head>

<body>
    
    <div class="container">
    
        <h1>Edit Accounts</h1>
        <hr>
        
        <!-- This form will auto fill so that it is easy to update-->
        <form action="includes/edit_user.php" method="POST" class="form-group">
            
            <label>Student Name
                <input type="text" name="name" placeholder="Full name" class="form-control" maxlength="64" autofocus value="<?php echo $name;?>">
            </label>
            
            <!-- Just for ID sake-->
            <input type="hidden" name="id"  placeholder="id" class="form-control" maxlength="64" value="<?=$email?>" >
        
            <p>
            <label>Email
                <input type="email" name="email" placeholder="Email address" class="form-control" maxlength="64" value="<?=$email?>" >
            </label>
            </p>
            
            <!-- For auto fill the form -->  
            <?php
                $selected = $program;
            ?>
            <p>
            <label>Program
                <select name="program" class="form-control"  >
                  <option <?php if($selected == 'Advisor'){echo('selected');}?>>Advisor</option>
                  <option <?php if($selected == 'Software Development'){echo('selected');}?>>Software Development</option>
                  <option <?php if($selected == 'Networking'){echo('selected');}?>>Networking</option>
                </select>
            </label>
            </p>
            
            <p>
            <label>Est. Grad Date
                <input type="text" name="egd" placeholder="Select a date" id="datepicker" class="form-control" value="<?=$egd?>">
            </label>
            </p>    
 

            <button class="btn btn-default" type="submit" id="submit" name="submit-edit"> Update </button>
            <h4><a href="index.php">Back to Feed</a></h4>
        </form>
    
    </div><!--Ending containter div-->

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
