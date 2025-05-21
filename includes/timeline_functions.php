<?php
/**
 * Timeline Functions
 * 
 * Helper functions for retrieving timeline data from the database
 */

require_once 'db_connect.php';

/**
 * Get timeline events for a specific malware type
 * 
 * @param int|string $malware_id The ID or slug of the malware type
 * @return array Array of timeline events
 */
function getTimelineEvents($malware_id) {
    global $conn;
    
    $events = array();
    
    // Check if $malware_id is a string (slug) or numeric (ID)
    if (is_numeric($malware_id)) {
        $condition = "m.id = ?";
    } else {
        $condition = "m.slug = ?";
    }
    
    // Prepare the SQL query with JOIN to get malware name as well
    $sql = "SELECT e.*, m.name as malware_name 
            FROM timeline_events e
            JOIN malware_types m ON e.malware_id = m.id
            WHERE $condition
            ORDER BY e.event_order ASC";
    
    // Prepare and execute the query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(is_numeric($malware_id) ? "i" : "s", $malware_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
    }
    
    $stmt->close();
    return $events;
}

/**
 * Get a specific malware type by ID or slug
 * 
 * @param int|string $id The ID or slug of the malware type
 * @return array|null Malware information or null if not found
 */
function getMalwareType($id) {
    global $conn;
    
    // Check if $id is a string (slug) or numeric (ID)
    if (is_numeric($id)) {
        $condition = "id = ?";
    } else {
        $condition = "slug = ?";
    }
    
    $sql = "SELECT * FROM malware_types WHERE $condition";
    
    // Prepare and execute the query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(is_numeric($id) ? "i" : "s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $malware = null;
    if ($result->num_rows === 1) {
        $malware = $result->fetch_assoc();
    }
    
    $stmt->close();
    return $malware;
}
?>
