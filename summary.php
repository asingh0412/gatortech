<?php
    include('includes/session.php');
    require "includes/db.php";
    require "includes/load_summary.php";
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Summary</title>

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
    <h1>Summary</h1>
    <table>
        <thead>
	<tr>
            <th> Program </th>
            <th> Status </th>
            <th> Email</th>
            <th> Name</th>
            <th> Estimated Graduation Date</th>
        </tr>
       
        </thead>
	    <!--<h3>Display the values from DB</h3>-->
	    <?php
                 foreach($result as $row){
                    
                
                    echo"<tr class>
                            <td>{$row[program]}</td>
                            <td>{$row[status]}</td>
                            <td>{$row[email]}</td>
                            <td>{$row[name]}</td>
                            <td>{$row[egd]}</td>
                        </tr>";
                 }
                ?>
    </table>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>