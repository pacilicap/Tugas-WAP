<?php

session_start();
unset($_SESSION['loggedIn']);
unset($_SESSION['id']);
unset($_SESSION['name']);
    
return header("location:/inventory/login.php");

?>