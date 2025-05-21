<?php
// Debug file to test timeline functions
require_once 'includes/timeline_functions.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Test the getTimelineEvents function
echo "<h2>Testing getTimelineEvents('iloveyou')</h2>";
$events = getTimelineEvents('iloveyou');

// Print the result
echo "<pre>";
if (empty($events)) {
    echo "No events returned. Checking database...\n\n";
    
    // Try to get all malware types to see if the database is working
    $sql = "SELECT * FROM malware_types";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        echo "Malware types found in database:\n";
        while ($row = $result->fetch_assoc()) {
            print_r($row);
        }
    } else {
        echo "No malware types found in database. Error: " . $conn->error . "\n";
    }
    
    // Check if timeline_events table exists and has data
    $sql = "SELECT * FROM timeline_events LIMIT 5";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        echo "\nTimeline events found in database:\n";
        while ($row = $result->fetch_assoc()) {
            print_r($row);
        }
    } else {
        echo "\nNo timeline events found in database. Error: " . $conn->error . "\n";
    }
} else {
    echo count($events) . " events found:\n";
    foreach ($events as $event) {
        print_r($event);
    }
}
echo "</pre>";
?>
