<?php
// Enable error reporting for debugging
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Start session to preserve any messages
session_start();

// Simple redirect based on action
if (isset($_GET['action']) && $_GET['action'] === 'login') {
    header("Location: http://localhost/FYP1/login.php");
} else {
    header("Location: http://localhost/FYP1/signup.php");
}
exit();