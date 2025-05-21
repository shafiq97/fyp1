<?php
/**
 * Database Connection File
 * 
 * Establishes a connection to the MySQL database for the timeline component
 */

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$db_host = 'localhost';
$db_user = 'root';      // Default XAMPP username
$db_pass = '';          // Default XAMPP password (empty)
$db_name = 'fyp_malware_db';

// Create connection with proper charset
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    die("Connection failed: " . $conn->connect_error);
}

// Set character set
if (!$conn->set_charset("utf8mb4")) {
    error_log("Error loading character set utf8mb4: " . $conn->error);
}

// Set SQL mode to strict
$conn->query("SET SESSION sql_mode = 'STRICT_ALL_TABLES'");
?>
