<?php
    include('includes/session.php');
    require "includes/db.php";
    require "includes/load_summary.php";
?>

<!DOCTYPE html>

<html lang="en">
<head>

    <title>Accounts</title
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

        <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet">
                
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.css">
		
    
    <!-- DataTables-->
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.js"></script>
    

        
<body>
    
<div class="container">

    <h1>Student Accounts</h1><hr>
    
        <table id="table-transform" class='table table-bordered table-hover table-striped'>
            <thead>
            <tr>
                <th> Program </th>
                <th> Status </th>
                <th> Email </th>
                <th> Name </th>
                <th> Estimated Graduation Date</th>
                <th> Edit</th>
                <th> Delete </th>
            </tr>
            </thead>
            <tbody>
                <!--<h3>Display the values from DB</h3>-->
                <?php
                     foreach($result as $row){
                    
                        echo"<tr class>
                                <td>{$row[program]}</td>
                                <td>{$row[status]}</td>
                                <td>{$row[email]}</td>
                                <td>{$row[name]}</td>
                                <td>{$row[egd]}</td>
                                
                                <td><a href='edit.php?id=$row[email]'>
                                <button type='button' class='btn btn-default btn-xs'>Edit / Update</button></td>
                                
                                <td><a href='includes/delete_user.php?id=$row[email]'>
                                <button type='button' class='btn btn-default btn-xs'>Delete</button></td>
                            </tr>";
                     }
                    ?>
            
            </tbody>
        </table> <!-- End of table-->
            <h4 style="float: right"><a href="index.php">Back to Feed</a></h4>
</div><!-- End of Container div-->

    <script>
      //Script for the data table to look good and searchable.
        $(document).ready( function () {
            $('#table-transform').DataTable({"aaSorting": []});
        });
    
    </script>
    
</body>
</html>