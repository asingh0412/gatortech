<?php
        try
	{
            // New database connection
	    $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
		
            // Login account verification
            $sql = $dbh->prepare("SELECT program, status, name, picture FROM account WHERE email = '$_SESSION[login_session]'");
            $sql->execute();
            $result = $sql->fetch();
            
            $program = $result['program'];
            $status = $result['status'];
            $name = $result['name'];
            $picture = $result['picture'];
	}
	catch (PDOException $e)
	{
		echo $e->getMessage();
	}
?>