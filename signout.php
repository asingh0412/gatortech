<?php
    session_start();
    
    if(session_destroy())
    {
        unset($_SESSION['login_session']);
        header("Location: login.php");
    }
?>