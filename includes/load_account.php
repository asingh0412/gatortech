<?php

include('includes/session.php');
require "includes/db.php";

// Form handling
if (isset($_POST['submit'])) {

  try
      {
            // New database connection
            $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);

            $sql = $dbh->prepare("SELECT name, picture, email status FROM account WHERE email = '$_SESSION[login_session]'");
            $sql->execute();

            $result = $sql->fetch();

            $email = $dbh->prepare("SELECT email FROM account WHERE email = '$_POST[email]'");
            $email->execute();

            // Testing if the account has been created 
            if ($email->rowCount() > 0) {
              echo 'Account already exists';
            } else {

            $program = $_POST['program'];
            $status = 'Student';
            $email = $_POST['email'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $picture = $result['picture'];
            $egd = $POST['egd'];

            // Password encryption using PHP 5.5 Password Hashing
            //$hash = password_hash($password, PASSWORD_DEFAULT);
    
            $stmt = $dbh->prepare("INSERT INTO account (program, status, email, password, name, picture, egd) 
              VALUES (:program, :status, :email, :password, :name, :picture, :egd)");
            $stmt->bindParam(':program', $program);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':picture', $picture);
            $stmt->bindParam(':egd', $_POST['egd']);

            $stmt->execute();
    
            //header("Location: index.php");
            echo '<p>Account created';
          }
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
      }
?>