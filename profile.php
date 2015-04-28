<?php
    include('includes/session.php');
    
	// Database connection information
	require "db.php";

	try
	{
		// New database connection
		$dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
		
		// Login account verification
		$sql = "SELECT program, status, name, picture FROM account WHERE email = '$_SESSION[\'login_session\']'";
		$result = $dbh->query($sql);
		
		foreach($result as $row) {
			$program = $row['program'];
			$status = $row['status'];
			$name = $row['name'];
			$picture = $row['picture'];
			
			echo "
			<div id='profile-picture'>
				<img src='$picture'>
			</div>
			
			<div id='student-info'>
				<p>$name<br>$program<br>$status</p>
			</div>
			";
		}
	}
	catch (PDOException $e)
	{
		echo $e->getMessage();
	}
?>