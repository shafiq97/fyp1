<?php
/**
 * Database Timeline Test File
 * This file tests the database connection and timeline data retrieval
 */

// Enable full error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo '<h1>Timeline Database Test</h1>';

// Test database connection
echo '<h2>1. Testing Database Connection</h2>';
try {
    require_once 'includes/db_connect.php';
    echo '<div style="color:green;font-weight:bold;">✓ Database connection successful</div>';
    
    // Display database info
    $result = $conn->query("SELECT DATABASE()");
    $dbName = $result->fetch_row()[0];
    echo "<div>Connected to database: <strong>{$dbName}</strong></div>";
    
    // Check MySQL version
    $result = $conn->query("SELECT VERSION()");
    $version = $result->fetch_row()[0];
    echo "<div>MySQL Version: <strong>{$version}</strong></div>";
} catch (Exception $e) {
    echo '<div style="color:red;font-weight:bold;">✗ Database connection failed: ' . $e->getMessage() . '</div>';
    exit;
}

// Test malware_types table
echo '<h2>2. Checking malware_types Table</h2>';
try {
    $result = $conn->query("SELECT * FROM malware_types");
    
    if ($result->num_rows > 0) {
        echo '<div style="color:green;font-weight:bold;">✓ Found ' . $result->num_rows . ' malware types</div>';
        
        echo '<table border="1" cellpadding="5" style="border-collapse:collapse;">';
        echo '<tr><th>ID</th><th>Name</th><th>Slug</th><th>Year</th></tr>';
        
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['id']) . '</td>';
            echo '<td>' . htmlspecialchars($row['name']) . '</td>';
            echo '<td>' . htmlspecialchars($row['slug']) . '</td>';
            echo '<td>' . htmlspecialchars($row['year']) . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        echo '<div style="color:red;font-weight:bold;">✗ No malware types found in database!</div>';
    }
} catch (Exception $e) {
    echo '<div style="color:red;font-weight:bold;">✗ Error accessing malware_types table: ' . $e->getMessage() . '</div>';
}

// Test timeline_events table
echo '<h2>3. Checking timeline_events Table</h2>';
try {
    $result = $conn->query("SELECT COUNT(*) as count, malware_id FROM timeline_events GROUP BY malware_id");
    
    if ($result && $result->num_rows > 0) {
        echo '<div style="color:green;font-weight:bold;">✓ Found timeline events</div>';
        
        echo '<table border="1" cellpadding="5" style="border-collapse:collapse;">';
        echo '<tr><th>Malware ID</th><th>Event Count</th></tr>';
        
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['malware_id']) . '</td>';
            echo '<td>' . htmlspecialchars($row['count']) . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        echo '<div style="color:red;font-weight:bold;">✗ No timeline events found in database!</div>';
    }
} catch (Exception $e) {
    echo '<div style="color:red;font-weight:bold;">✗ Error accessing timeline_events table: ' . $e->getMessage() . '</div>';
}

// Test timeline functions
echo '<h2>4. Testing getTimelineEvents() Function</h2>';
try {
    require_once 'includes/timeline_functions.php';
    
    $malwareTypes = ['morrisworm', 'iloveyou', 'zeustrojan'];
    
    foreach ($malwareTypes as $type) {
        echo '<h3>Testing: ' . htmlspecialchars($type) . '</h3>';
        
        $events = getTimelineEvents($type);
        
        if (!empty($events)) {
            echo '<div style="color:green;font-weight:bold;">✓ Found ' . count($events) . ' events</div>';
            
            if (count($events) == 5) {
                echo '<div style="color:green;font-weight:bold;">✓ Correct number of events (5) for ' . htmlspecialchars($type) . '</div>';
            } else {
                echo '<div style="color:red;font-weight:bold;">✗ Incorrect number of events: ' . count($events) . ' (should be 5) for ' . htmlspecialchars($type) . '</div>';
            }
            
            echo '<table border="1" cellpadding="5" style="border-collapse:collapse;">';
            echo '<tr><th>ID</th><th>Title</th><th>Year</th><th>Order</th><th>Icon</th></tr>';
            
            foreach ($events as $event) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($event['id']) . '</td>';
                echo '<td>' . htmlspecialchars($event['title']) . '</td>';
                echo '<td>' . htmlspecialchars($event['year']) . '</td>';
                echo '<td>' . htmlspecialchars($event['event_order']) . '</td>';
                echo '<td>' . htmlspecialchars($event['icon_class']) . '</td>';
                echo '</tr>';
            }
            
            echo '</table>';
        } else {
            echo '<div style="color:red;font-weight:bold;">✗ No events found for ' . htmlspecialchars($type) . ' - This will cause timeline_standardizer.js to create default points</div>';
        }
    }
} catch (Exception $e) {
    echo '<div style="color:red;font-weight:bold;">✗ Error testing timeline functions: ' . $e->getMessage() . '</div>';
}

echo '<p><a href="morrisworm_history.php">Go to Morris Worm History Page</a> | ';
echo '<a href="iloveyou_history.php">Go to ILOVEYOU History Page</a> | ';
echo '<a href="zeustrojan_history.php">Go to Zeus Trojan History Page</a></p>';
?>
