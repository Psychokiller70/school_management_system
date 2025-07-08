<?php
session_start();

// If already logged in, go to dashboard
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
}

// Redirect to login form
header("Location: login-regester-form/login.html");
exit();
?>