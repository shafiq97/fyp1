<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<?php
// Debug section to display database connection status
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection and timeline functions early
require_once 'includes/timeline_functions.php';

// Get timeline events for ILOVEYOU virus with error reporting
try {
    $events = getTimelineEvents('iloveyou');
    if (empty($events)) {
        echo '<div class="alert alert-warning" style="margin: 10px;">Timeline data not found. Using hardcoded fallback.</div>';
    } else {
        echo '<div class="alert alert-success" style="margin: 10px;">Timeline data loaded successfully: ' . count($events) . ' events found.</div>';
    }
} catch (Exception $e) {
    echo '<div class="alert alert-danger" style="margin: 10px;">Database Error: ' . $e->getMessage() . '</div>';
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ILOVEYOU Virus</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/history-page.css">
    <link rel="stylesheet" href="css/iloveyou_history.css">
    <link rel="stylesheet" href="css/history-layout-fix.css">
    <link rel="stylesheet" href="css/timeline.css">
</head>

<section class="history-details content-container">

    <h1 class="heading">ILOVEYOU Virus (2000)</h1>

    <div class="detail-content">

        <div class="detail-section">
            <h2>Infect</h2>
            <p>
                The ILOVEYOU worm's infection process began with a deceptive email. On May 4, 2000, users received emails with the subject line "ILOVEYOU" and an attachment named "LOVE-LETTER-FOR-YOU.TXT.vbs".
                Opening this attachment, a VBScript file, initiated the infection.
            </p>
        </div>

        <div class="detail-section">
            <h2>Propagation</h2>
            <p>
                Upon execution, the worm copied itself to the Windows System directory. It also modified registry keys to ensure it would automatically run each time the system started.
                Critically, it then sent copies of itself to all contacts found in the user's Microsoft Outlook address book, leading to its rapid, self-propagating spread.
            </p>
        </div>

        <div class="detail-section">
            <h2>Damage (Impact)</h2>
            <p>
                The ILOVEYOU worm's impact was widespread and severe. Infected systems suffered file overwriting, resulting in data loss. The sheer volume of infected emails overwhelmed mail servers, causing significant disruptions to communication systems globally. The estimated financial damage reached billions of dollars.
            </p>
        </div>

        <div class="detail-section">
            <h2>Recovery</h2>
            <p>
                Efforts to contain the ILOVEYOU worm involved shutting down email servers in some regions to halt its spread. Antivirus vendors quickly worked to develop and distribute patches to remove the worm from infected systems.
            </p>
        </div>

        <div class="detail-section">
            <h2>Lessons Learned</h2>
            <p>
                The ILOVEYOU outbreak underscored the effectiveness of social engineering tactics in malware distribution. It highlighted the critical importance of user awareness regarding suspicious email attachments and the need for robust email security measures. The incident prompted changes in security practices and software design to mitigate similar threats.
            </p>
        </div>

    </div>
    
    <div class="timeline-section">
        <h2 class="section-title">Timeline of the Attack</h2>
        
        <div class="timeline-container">
            <!-- Timeline Line with Points -->
            <div class="timeline-line">
                <div class="timeline-point" data-index="0" aria-label="Initial Infection - May 4, 2000">
                    <i class="fas fa-virus" aria-hidden="true"></i>
                </div>
                <div class="timeline-point" data-index="1" aria-label="Rapid Propagation - Hours Later">
                    <i class="fas fa-share-nodes" aria-hidden="true"></i>
                </div>
                <div class="timeline-point" data-index="2" aria-label="Global Disruption - Same Day">
                    <i class="fas fa-globe" aria-hidden="true"></i>
                </div>
                <div class="timeline-point" data-index="3" aria-label="Containment Efforts - Days Later">
                    <i class="fas fa-shield-halved" aria-hidden="true"></i>
                </div>
                <div class="timeline-point" data-index="4" aria-label="Aftermath - Weeks Later">
                    <i class="fas fa-chart-line" aria-hidden="true"></i>
                </div>
            </div>
            
            <!-- Timeline Event Cards -->
            <?php
            // Only use database events for timeline cards
            foreach ($events as $index => $event): 
            ?>
            <div class="timeline-event-card" data-index="<?php echo $index; ?>">
                <h2><?php echo htmlspecialchars($event['year']); ?></h2>
                <h3><?php echo htmlspecialchars($event['title']); ?></h3>
                <p><?php echo htmlspecialchars($event['description']); ?></p>
            </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</section>

<script src="script.js"></script>
<script src="js/timeline.js"></script>

<?php include 'footer.php'; ?>
