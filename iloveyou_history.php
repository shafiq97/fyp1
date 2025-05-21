<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ILOVEYOU Virus</title>
    <link rel="stylesheet" href="css/iloveyou_history.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<section class="history-details">

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
    
    <?php
    // Include database connection and timeline functions
    require_once 'includes/timeline_functions.php';
    
    // Get timeline events for ILOVEYOU virus
    $events = getTimelineEvents('iloveyou');
    ?>
    
    <div class="timeline-section">
        <h2 class="section-title">Timeline of the Attack</h2>
        
        <div class="timeline-container">
            <!-- Timeline Line with Points -->
            <div class="timeline-line">
                <?php
                // Add hard-coded timeline points if database retrieval fails
                if (empty($events)) {
                    $hardcodedEvents = [
                        ['title' => 'Initial Infection', 'icon_class' => 'fa-virus'],
                        ['title' => 'Rapid Propagation', 'icon_class' => 'fa-share-alt'],
                        ['title' => 'Global Disruption', 'icon_class' => 'fa-globe'],
                        ['title' => 'Containment Efforts', 'icon_class' => 'fa-shield-alt'],
                        ['title' => 'Aftermath', 'icon_class' => 'fa-chart-line']
                    ];
                    foreach ($hardcodedEvents as $index => $event):
                ?>
                <div class="timeline-point" data-index="<?php echo $index; ?>" aria-label="<?php echo htmlspecialchars($event['title']); ?>">
                    <i class="fas <?php echo htmlspecialchars($event['icon_class']); ?>"></i>
                </div>
                <?php 
                    endforeach;
                } else {
                    foreach ($events as $index => $event): 
                ?>
                <div class="timeline-point" data-index="<?php echo $index; ?>" aria-label="<?php echo htmlspecialchars($event['title']); ?>">
                    <i class="fas <?php echo htmlspecialchars($event['icon_class']); ?>"></i>
                </div>
                <?php 
                    endforeach;
                }
                ?>
            </div>
            
            <!-- Timeline Event Cards -->
            <?php
            // Add hard-coded event cards if database retrieval fails
            if (empty($events)) {
                $hardcodedEventDetails = [
                    ['year' => '2000', 'title' => 'Initial Infection - May 4, 2000', 
                     'description' => 'The ILOVEYOU worm arrives via email with the subject "ILOVEYOU" and a malicious attachment. Opening the attachment begins the infection process. The virus was first detected in the Philippines.'],
                    ['year' => '2000', 'title' => 'Rapid Propagation - Hours Later', 
                     'description' => 'Within hours, the worm replicates and sends copies of itself to all Outlook contacts, spreading exponentially across the world.'],
                    ['year' => '2000', 'title' => 'Global Disruption - Same Day', 
                     'description' => 'Email servers are overwhelmed globally due to the massive volume of infected messages, causing widespread communication disruptions.'],
                    ['year' => '2000', 'title' => 'Containment Efforts - Days Later', 
                     'description' => 'Efforts to contain the worm include shutting down mail servers and urging users not to open suspicious attachments.'],
                    ['year' => '2000', 'title' => 'Aftermath - Weeks Later', 
                     'description' => 'The total economic impact of the ILOVEYOU worm is assessed, with estimates reaching between $5-10 billion in damages. It infected an estimated 10% of all internet-connected computers worldwide, making it one of the most destructive viruses in history.']
                ];
                foreach ($hardcodedEventDetails as $index => $event):
            ?>
            <div class="timeline-event-card" data-index="<?php echo $index; ?>">
                <h2><?php echo htmlspecialchars($event['year']); ?></h2>
                <h3><?php echo htmlspecialchars($event['title']); ?></h3>
                <p><?php echo htmlspecialchars($event['description']); ?></p>
            </div>
            <?php 
                endforeach;
            } else {
                foreach ($events as $index => $event): 
            ?>
            <div class="timeline-event-card" data-index="<?php echo $index; ?>">
                <h2><?php echo htmlspecialchars($event['year']); ?></h2>
                <h3><?php echo htmlspecialchars($event['title']); ?></h3>
                <p><?php echo htmlspecialchars($event['description']); ?></p>
            </div>
            <?php
                endforeach;
            }
            ?>
        </div>
    </div>
</section>

<script src="script.js"></script>
<script src="timeline_debug.js"></script>

<?php include 'footer.php'; ?>
