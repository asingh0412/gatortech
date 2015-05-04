<?php
session_start();
unset($_SESSION['login_session']);
session_destroy();
header("location: login.php");
echo 'You have been logged out. <a href="login.php">Go back</a>';

?>