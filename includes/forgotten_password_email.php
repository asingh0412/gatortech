<?php
    $account_not_found_error = '';
    
    // If password reset form is submitted
    if (isset($_POST['submit_forgot_password_email']))
    {
        $email = $_POST['email'];
        
        // Database connection information
        require('db.php');
        
        // New database connection
        $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
        
        // Account exists verification
        $sql = "SELECT email FROM account where email = '$email'";
        $result = $dbh->query($sql);
        $count = $result->rowCount();
        
        if ($count == 1)
        {
            $sql = "SELECT password FROM account where email = '$email'";
            $result = $dbh->query($sql);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $password_requested = $row['password'];
            
            $to = $email;
            $email_subject = "Your Gator Tech Password";
            $email_body =   "Hello there, \n\n".
                            "Someone has recently requested a forgotten password for \n".
                            "your account. If this was not you, please ignore and delete \n".
                            "this email.\n\n".
                            "Email: $email\n ".
                            "Password: $password_requested\n\n".
                            "Thank you!\n";
            $headers = "From: no-reply@GatorTech.greenriver.edu\n";
            
            mail($to, $email_subject, $email_body, $headers);
            $account_not_found_error = 'An email has been sent to the specified email address. Thank you.';
            $dbh = null;
        }
        else
        {
            $dbh = null;
            $account_not_found_error = 'That account does not exist.';
        }
    }
?>