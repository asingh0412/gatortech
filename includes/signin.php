<?php
    // Start session
    session_start();

    // Validation errors
    $login_error = '';
    $login_email_input_value = '';
    
    // If login form is submitted
    if (isset($_POST['submit-login']))
    {
        $login_email = $_POST['login_email'];
        $login_password = $_POST['login_password'];

        // Database connection information
	require "db.php";

	try
        {
            // New database connection
            $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
            
            // Login account verification
            $sql = "SELECT email FROM account where password = '$login_password' and email = '$login_email'";
            $result = $dbh->query($sql);
            $count = $result->rowCount();
            
            if ($count == 1)
            {
                $_SESSION['login_session'] = $login_email;
                $dbh = null;
                header("location: index.php");
            }
            else
            {
                $dbh = null;
                $login_error = "Email or Password is invalid";
		$login_email_input_value = $_POST['login_email'];
            }
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
?>