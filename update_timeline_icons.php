<?php
/**
 * Timeline Icon Update Script
 * This script updates problematic Font Awesome icons in the timeline database
 */

// Enable full error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo '<h1>Timeline Icons Update</h1>';

// Connect to database
require_once 'includes/db_connect.php';

try {
    echo '<h2>Updating ILOVEYOU timeline icons</h2>';
    
    // Update ILOVEYOU timeline icons
    $updates = [
        // Update the 2nd icon (fa-share-alt to fa-share-nodes)
        ["malware_slug" => "iloveyou", "event_order" => 1, "old_icon" => "fa-share-alt", "new_icon" => "fa-share-nodes"],
        // Update the 4th icon (fa-shield-alt to fa-shield-halved)
        ["malware_slug" => "iloveyou", "event_order" => 3, "old_icon" => "fa-shield-alt", "new_icon" => "fa-shield-halved"]
    ];
    
    foreach ($updates as $update) {
        $sql = "UPDATE timeline_events e 
                JOIN malware_types m ON e.malware_id = m.id 
                SET e.icon_class = ? 
                WHERE m.slug = ? AND e.event_order = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $update["new_icon"], $update["malware_slug"], $update["event_order"]);
        
        if ($stmt->execute()) {
            echo "<div style='color:green'>✓ Updated {$update['malware_slug']} event {$update['event_order']} icon from {$update['old_icon']} to {$update['new_icon']}</div>";
        } else {
            echo "<div style='color:red'>✗ Failed to update {$update['malware_slug']} event {$update['event_order']} icon</div>";
        }
        
        $stmt->close();
    }
    
    // Check for any other potentially problematic icons
    echo '<h2>Checking for other problematic icons</h2>';
    
    $outdatedIcons = [
        'fa-shield-alt',
        'fa-share-alt',
        'fa-binoculars',  // Check if this might be another problematic icon
        'fa-university'   // Check if this might be another problematic icon
    ];
    
    foreach ($outdatedIcons as $icon) {
        $sql = "SELECT m.name, m.slug, e.title, e.icon_class, e.event_order 
                FROM timeline_events e 
                JOIN malware_types m ON e.malware_id = m.id 
                WHERE e.icon_class = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $icon);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            echo "<div style='color:orange'>! Found {$result->num_rows} events using potentially outdated icon: {$icon}</div>";
            
            echo '<table border="1" cellpadding="5" style="border-collapse:collapse;">';
            echo '<tr><th>Malware</th><th>Event</th><th>Icon</th><th>Order</th></tr>';
            
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                echo '<td>' . htmlspecialchars($row['title']) . '</td>';
                echo '<td>' . htmlspecialchars($row['icon_class']) . '</td>';
                echo '<td>' . htmlspecialchars($row['event_order']) . '</td>';
                echo '</tr>';
            }
            
            echo '</table>';
        }
        
        $stmt->close();
    }
    
    echo '<h2>Update Complete</h2>';
    echo '<div style="margin-top:20px;font-weight:bold;color:green;">Timeline icons have been updated!</div>';
    
    echo '<p><a href="iloveyou_history.php">Go to ILOVEYOU History Page</a> | ';
    echo '<a href="morrisworm_history.php">Go to Morris Worm History Page</a> | ';
    echo '<a href="zeustrojan_history.php">Go to Zeus Trojan History Page</a></p>';
    
} catch (Exception $e) {
    echo '<div style="color:red;font-weight:bold;">Error: ' . $e->getMessage() . '</div>';
}
?>
