<?php
session_start();

if(!isset($_SESSION['loggedIn'])) {
    return header("location:../inventory/login.php");
}

?>