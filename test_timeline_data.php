<?php
// Simple test file to verify timeline data from database
require_once 'includes/timeline_functions.php';

// Check database connection
echo "<h2>Database Connection Test</h2>";
if ($conn && $conn->ping()) {
    echo "<p style='color:green'>Database connection successful!</p>";
} else {
    echo "<p style='color:red'>Database connection failed!</p>";
    exit;
}

// Check if timeline_events table exists
echo "<h2>Database Structure Test</h2>";
$result = $conn->query("SHOW TABLES LIKE 'timeline_events'");
if ($result->num_rows > 0) {
    echo "<p style='color:green'>Timeline_events table exists!</p>";
} else {
    echo "<p style='color:red'>Timeline_events table not found!</p>";
    exit;
}

// Test retrieving timeline data for each malware type
$malware_types = ['morrisworm', 'iloveyou', 'zeustrojan'];

foreach ($malware_types as $type) {
    echo "<h2>Timeline Events for $type</h2>";
    $events = getTimelineEvents($type);
    
    if (count($events) == 5) {
        echo "<p style='color:green'>Found exactly 5 events for $type ✅</p>";
    } else {
        echo "<p style='color:red'>Found " . count($events) . " events for $type (should be 5) ❌</p>";
    }
    
    echo "<table border='1' cellpadding='5' style='border-collapse:collapse'>";
    echo "<tr><th>Order</th><th>Title</th><th>Year</th><th>Icon</th><th>Description</th></tr>";
    
    foreach ($events as $event) {
        echo "<tr>";
        echo "<td>" . $event['event_order'] . "</td>";
        echo "<td>" . htmlspecialchars($event['title']) . "</td>";
        echo "<td>" . htmlspecialchars($event['year']) . "</td>";
        echo "<td><i class='fas " . htmlspecialchars($event['icon_class']) . "'></i> " . htmlspecialchars($event['icon_class']) . "</td>";
        echo "<td>" . htmlspecialchars(substr($event['description'], 0, 100)) . "...</td>";
        echo "</tr>";
    }
    
    echo "</table>";
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
