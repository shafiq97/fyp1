<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<?php
// Debug section to display database connection status
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection and timeline functions early
require_once 'includes/timeline_functions.php';

// Get timeline events for Zeus Trojan with error reporting
try {
    $events = getTimelineEvents('zeustrojan');
    if (empty($events)) {
        echo '<div class="alert alert-warning" style="margin: 10px;">Timeline data not found. Using hardcoded fallback.</div>';
    } 
} catch (Exception $e) {
    echo '<div class="alert alert-danger" style="margin: 10px;">Database Error: ' . $e->getMessage() . '</div>';
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zeus Trojan Details</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/history-page.css">
    <link rel="stylesheet" href="css/zeustrojan_history.css">
    <link rel="stylesheet" href="css/history-layout-fix.css">
    <link rel="stylesheet" href="css/timeline.css">
</head>

<section class="history-details content-container">

    <h1 class="heading">Zeus Trojan (2007)</h1>

    <div class="detail-content">

        <div class="detail-section">
            <h2>Infect</h2>
            <p>
                The Zeus trojan, also known as Zbot, typically infected systems through drive-by downloads from compromised websites or via phishing emails containing malicious attachments.
                Users were often tricked into installing the malware by clicking on seemingly legitimate links or opening infected files.
            </p>
        </div>

        <div class="detail-section">
            <h2>Propagation</h2>
            <p>
                Zeus itself did not actively spread like a worm. Instead, its propagation relied on the spread of infected files or the user's interaction with malicious websites.
                Once installed, it could download configuration files and additional modules to enhance its capabilities.
            </p>
        </div>

        <div class="detail-section">
            <h2>Damage (Impact)</h2>
            <p>
                Zeus's primary impact was the theft of sensitive information, particularly online banking credentials. It employed techniques like keylogging to record keystrokes and form grabbing to capture data entered into web forms.
                This enabled attackers to commit financial fraud, resulting in significant monetary losses for individuals and organizations. Zeus was also used to create botnets for DDoS attacks.
            </p>
        </div>

        <div class="detail-section">
            <h2>Recovery</h2>
            <p>
                Recovery from Zeus infections involved removing the malware from infected systems using anti-malware software. Banks and financial institutions implemented stronger security measures,
                such as multi-factor authentication and improved fraud detection systems, to combat the threat. Law enforcement agencies worked to disrupt Zeus botnets and prosecute the perpetrators.
            </p>
        </div>

        <div class="detail-section">
            <h2>Lessons Learned</h2>
            <p>
                The Zeus trojan highlighted the sophistication of financial malware and the importance of layered security. It underscored the need for strong passwords,
                anti-malware protection, and user vigilance against phishing attacks and malicious websites. The incident also demonstrated the global nature of cybercrime and the challenges in combating it.
            </p>
        </div>

    </div>
    
    <div class="timeline-section">
        <h2 class="section-title">Timeline of the Attack</h2>
        
        <div class="timeline-container">
            <!-- Timeline Line with Points -->
            <div class="timeline-line">
                <div class="timeline-point" data-index="0" aria-label="Initial Discovery - 2007">
                    <i class="fas fa-binoculars"></i>
                </div>
                <div class="timeline-point" data-index="1" aria-label="Major Banking Attacks - 2009">
                    <i class="fas fa-university"></i>
                </div>
                <div class="timeline-point" data-index="2" aria-label="Zeus 2.0 Released - 2010">
                    <i class="fas fa-code-branch"></i>
                </div>
                <div class="timeline-point" data-index="3" aria-label="Operation Trident Breach - 2010">
                    <i class="fas fa-handcuffs"></i>
                </div>
                <div class="timeline-point" data-index="4" aria-label="GameOver Zeus - 2011-2014">
                    <i class="fas fa-skull-crossbones"></i>
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
