<?php
/**
 * Timeline Database Installer
 * This file ensures the timeline database is properly set up
 */

// Enable full error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo '<h1>Timeline Database Installer</h1>';

// Connect to MySQL and create database if it doesn't exist
try {
    echo '<h2>Step 1: Connecting to MySQL</h2>';
    
    // Connect to MySQL server without database selection first
    $conn = new mysqli('localhost', 'root', '');
    if ($conn->connect_error) {
        throw new Exception("MySQL connection failed: " . $conn->connect_error);
    }
    
    echo '<div style="color:green;font-weight:bold;">✓ Connected to MySQL server</div>';
    
    // Create database if it doesn't exist
    echo '<h2>Step 2: Creating Database</h2>';
    $result = $conn->query("CREATE DATABASE IF NOT EXISTS fyp_malware_db");
    
    if ($result) {
        echo '<div style="color:green;font-weight:bold;">✓ Database created or already exists</div>';
    } else {
        throw new Exception("Failed to create database: " . $conn->error);
    }
    
    // Select the database
    $conn->select_db("fyp_malware_db");
    
    // Read and execute the SQL setup script for timelines
    echo '<h2>Step 3: Creating Tables</h2>';
    
    $sql_file = file_get_contents('db/timeline_setup.sql');
    if (!$sql_file) {
        throw new Exception("Could not read SQL file");
    }
    
    // Split the SQL commands and run them
    $commands = explode(';', $sql_file);
    $success = true;
    
    foreach ($commands as $command) {
        $command = trim($command);
        if (empty($command)) continue;
        
        // Skip the CREATE DATABASE and USE commands as we already handled them
        if (stripos($command, 'CREATE DATABASE') !== false || stripos($command, 'USE') !== false) {
            continue;
        }
        
        if (!$conn->query($command)) {
            echo '<div style="color:orange;font-weight:bold;">! Error executing: ' . substr($command, 0, 100) . '... : ' . $conn->error . '</div>';
            $success = false;
        }
    }
    
    if ($success) {
        echo '<div style="color:green;font-weight:bold;">✓ Tables and data created successfully</div>';
    } else {
        echo '<div style="color:orange;font-weight:bold;">! Some errors occurred, but the script continued</div>';
    }
    
    // Verify the tables
    echo '<h2>Step 4: Verifying Tables</h2>';
    
    // Check malware_types
    $result = $conn->query("SELECT COUNT(*) as count FROM malware_types");
    $row = $result->fetch_assoc();
    echo '<div>Malware types in database: <strong>' . $row['count'] . '</strong></div>';
    
    // Check timeline_events
    $result = $conn->query("SELECT COUNT(*) as count FROM timeline_events");
    $row = $result->fetch_assoc();
    echo '<div>Timeline events in database: <strong>' . $row['count'] . '</strong></div>';
    
    // Check specific timeline events
    $malware_types = ['iloveyou', 'morrisworm', 'zeustrojan'];
    foreach ($malware_types as $type) {
        $stmt = $conn->prepare("SELECT COUNT(*) as count FROM timeline_events e JOIN malware_types m ON e.malware_id = m.id WHERE m.slug = ?");
        $stmt->bind_param("s", $type);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        echo '<div>' . ucfirst($type) . ' events: <strong>' . $row['count'] . '</strong></div>';
        $stmt->close();
    }
    
    echo '<div style="margin-top:20px;font-weight:bold;color:green;">Database setup complete!</div>';
    
    echo '<p><a href="test_db_timeline.php">Run Database Timeline Test</a> | ';
    echo '<a href="morrisworm_history.php">Go to Morris Worm History Page</a> | ';
    echo '<a href="iloveyou_history.php">Go to ILOVEYOU History Page</a> | ';
    echo '<a href="zeustrojan_history.php">Go to Zeus Trojan History Page</a></p>';
    
} catch (Exception $e) {
    echo '<div style="color:red;font-weight:bold;">Error: ' . $e->getMessage() . '</div>';
}
?>
