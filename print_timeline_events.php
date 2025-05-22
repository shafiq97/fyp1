<?php
// Simple script to print all timeline events for a given malware slug

// Direct DB connection (no includes)
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'fyp_malware_db';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "\n");
}

function getTimelineEvents($malware_slug, $conn) {
    $events = array();
    $sql = "SELECT e.*, m.name as malware_name FROM timeline_events e JOIN malware_types m ON e.malware_id = m.id WHERE m.slug = ? ORDER BY e.event_order ASC";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error . "\n");
    }
    $stmt->bind_param("s", $malware_slug);
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error . "\n");
    }
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
    $stmt->close();
    return $events;
}

$slug = isset($argv[1]) ? $argv[1] : 'iloveyou';
$events = getTimelineEvents($slug, $conn);

if (empty($events)) {
    echo "No events found for '$slug'\n";
    exit(1);
}

printf("%-3s | %-30s | %-20s | %-20s\n", 'ID', 'Title', 'Icon Class', 'Order');
echo str_repeat('-', 80) . "\n";
foreach ($events as $event) {
    printf("%-3d | %-30s | %-20s | %-20d\n",
        $event['id'],
        $event['title'],
        $event['icon_class'],
        $event['event_order']
    );
}
$conn->close();
