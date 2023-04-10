<?php
session_start();

session_destroy();

header('Location:2_Login/login.php');
?>