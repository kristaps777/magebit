<?php
session_start();
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['pwhash']);
unset($_SESSION['userID']);
header("Location: ../public/index.html");
?>
