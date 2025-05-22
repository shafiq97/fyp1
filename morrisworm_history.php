<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<?php
// Debug section to display database connection status
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection and timeline functions early
require_once 'includes/timeline_functions.php';

// Get timeline events for Morris Worm with error reporting
try {
    $events = getTimelineEvents('morrisworm');
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
    <title>Morris Worm Details</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/history-page.css">
    <link rel="stylesheet" href="css/morrisworm_history.css">
    <link rel="stylesheet" href="css/history-layout-fix.css">
    <link rel="stylesheet" href="css/timeline.css">
</head>

<section class="history-details content-container">

    <h1 class="heading"><i class="fas fa-bug"></i> Morris Worm (1988)</h1>

    <div class="detail-content">

        <div class="detail-section">
            <h2><i class="fas fa-viruses"></i> Initial Infection</h2>
            <p>
                The Morris worm made history on November 2, 1988, when Robert Tappan Morris, a graduate student at Cornell University, released it from MIT's computer lab. Morris intended the worm as an academic experiment to measure the size of the early internet (then called ARPANET). However, a critical design flaw in the worm's code would turn this experiment into the first major internet security crisis.
            </p>
        </div>

        <div class="detail-section">
            <h2><i class="fas fa-network-wired"></i> Propagation Method</h2>
            <p>
                The worm used multiple sophisticated methods to propagate across Unix-based systems, exploiting several vulnerabilities:
            </p>
            <ul>
                <li><strong>Buffer Overflow in fingerd:</strong> The worm exploited a buffer overflow vulnerability in the finger daemon (fingerd) program.</li>
                <li><strong>Debug Mode in Sendmail:</strong> It took advantage of a debug mode in the Sendmail program that allowed remote command execution.</li>
                <li><strong>Password Cracking:</strong> The worm attempted to crack passwords using a small dictionary and by checking variations of the user's name.</li>
                <li><strong>Trust Relationships:</strong> It exploited trusted relationships between Unix machines using the .rhosts mechanism, rsh (remote shell), and rexec protocols.</li>
            </ul>
            <p>
                The most significant flaw was in the worm's infection control mechanism. It was designed to check if a machine was already infected to avoid reinfecting it, but a programming error made this check ineffective. This allowed the worm to repeatedly infect the same machine, leading to exponential resource consumption.
            </p>
        </div>

        <div class="detail-section">
            <h2><i class="fas fa-exclamation-triangle"></i> Impact and Damage</h2>
            <p>
                Though not designed to be destructive, the Morris worm had a devastating impact on the early internet:
            </p>
            <ul>
                <li><strong>System Overload:</strong> Multiple copies of the worm on each machine consumed substantial CPU resources, causing extreme slowdowns.</li>
                <li><strong>Network Saturation:</strong> An estimated 10% of all internet-connected computers (approximately 6,000 machines) were affected.</li>
                <li><strong>Service Disruption:</strong> Many systems had to be disconnected from the network to be cleaned, causing significant disruption.</li>
                <li><strong>Financial Cost:</strong> The estimated cost of the damage and cleanup ranged from $100,000 to $10 million.</li>
            </ul>
        </div>

        <div class="detail-section">
            <h2><i class="fas fa-shield-alt"></i> Containment and Recovery</h2>
            <p>
                System administrators and security researchers responded quickly:
            </p>
            <ul>
                <li><strong>Network Isolation:</strong> Affected systems were disconnected from the network to prevent further spread.</li>
                <li><strong>Code Analysis:</strong> Researchers at Berkeley and other institutions analyzed the worm's code to understand its behavior.</li>
                <li><strong>Patch Development:</strong> Security patches were developed for the exploited vulnerabilities.</li>
                <li><strong>Kill Program:</strong> Programs were created to detect and remove the worm from infected systems.</li>
            </ul>
            <p>
                Complete recovery took several days, with some institutions taking more than a week to fully restore operations.
            </p>
        </div>

        <div class="detail-section">
            <h2><i class="fas fa-gavel"></i> Legal Aftermath</h2>
            <p>
                Robert Morris became the first person convicted under the 1986 Computer Fraud and Abuse Act. In May 1990, he was sentenced to:
            </p>
            <ul>
                <li>Three years of probation</li>
                <li>400 hours of community service</li>
                <li>A fine of $10,050 plus the costs of his supervision</li>
            </ul>
            <p>
                Despite this conviction, Morris went on to have a successful academic career and later co-founded the startup company Viaweb, which was acquired by Yahoo in 1998.
            </p>
        </div>

        <div class="detail-section">
            <h2><i class="fas fa-history"></i> Historical Significance</h2>
            <p>
                The Morris worm incident was a watershed moment in computer security history:
            </p>
            <ul>
                <li><strong>CERT Formation:</strong> It led to the creation of the Computer Emergency Response Team (CERT) to coordinate responses to future security incidents.</li>
                <li><strong>Security Awareness:</strong> It raised awareness about the importance of network security and the potential dangers of self-replicating code.</li>
                <li><strong>Security Research:</strong> It sparked increased funding and interest in cybersecurity research.</li>
                <li><strong>Programming Ethics:</strong> It prompted discussions about the ethics of security research and the responsibility of programmers.</li>
            </ul>
            <p>
                The Morris worm is considered a pivotal moment that transformed the field of computer security from an academic pursuit to a practical necessity.
            </p>
        </div>

        <!-- New Worm Propagation Diagram Section -->
        <div class="worm-diagram">
            <h3><i class="fas fa-project-diagram"></i> How the Morris Worm Propagated</h3>
            <div class="diagram-container">
                <div class="diagram-step">
                    <div class="diagram-icon">
                        <i class="fas fa-bug"></i>
                    </div>
                    <div class="diagram-title">Initial Infection</div>
                    <div class="diagram-description">Exploited vulnerabilities in Unix fingerd via buffer overflow and Sendmail's debug mode</div>
                </div>
                <div class="diagram-step">
                    <div class="diagram-icon">
                        <i class="fas fa-key"></i>
                    </div>
                    <div class="diagram-title">Password Cracking</div>
                    <div class="diagram-description">Attempted to guess passwords using built-in dictionary and user information</div>
                </div>
                <div class="diagram-step">
                    <div class="diagram-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <div class="diagram-title">Lateral Movement</div>
                    <div class="diagram-description">Used rsh/rexec to access trusted machines after gaining credentials</div>
                </div>
                <div class="diagram-step">
                    <div class="diagram-icon">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <div class="diagram-title">Reinfection Loop</div>
                    <div class="diagram-description">Design flaw caused multiple infections of the same machine, creating a cascading system overload</div>
                </div>
            </div>
            <div class="interactive-note">
                <p><i class="fas fa-lightbulb"></i> <strong>Did you know?</strong> The Morris Worm's design included code to verify if a machine was already infected to prevent reinfection. However, this mechanism had a critical flaw: it would still reinfect about 1 in 7 machines, causing the exponential resource consumption.</p>
            </div>
        </div>

        <!-- New Key Lessons Section -->
        <div class="key-lessons">
            <h2><i class="fas fa-graduation-cap"></i> Key Security Lessons</h2>
            <p>The Morris Worm incident taught the cybersecurity community several critical lessons that remain relevant today:</p>
            
            <div class="lessons-grid">
                <div class="lesson-card">
                    <i class="fas fa-shield-alt"></i>
                    <h4>Input Validation</h4>
                    <p>Always validate and sanitize input to prevent buffer overflow attacks, which was one of the primary vulnerabilities exploited by the worm.</p>
                </div>
                <div class="lesson-card">
                    <i class="fas fa-lock"></i>
                    <h4>Principle of Least Privilege</h4>
                    <p>System services should run with minimal privileges, not as root/administrator, to limit the potential damage of an exploit.</p>
                </div>
                <div class="lesson-card">
                    <i class="fas fa-code-branch"></i>
                    <h4>Test Thoroughly</h4>
                    <p>Even well-intentioned code can have devastating consequences if not properly tested. Always verify logic flows and fail-safe mechanisms.</p>
                </div>
                <div class="lesson-card">
                    <i class="fas fa-user-lock"></i>
                    <h4>Password Security</h4>
                    <p>Strong, unique passwords are essential. The worm's simple dictionary attack successfully compromised many accounts with weak passwords.</p>
                </div>
            </div>
        </div>

    </div>
    
    <div class="timeline-section">
        <h2 class="section-title">Timeline of the Attack</h2>
        
        <div class="timeline-container">
            <!-- Timeline Line with Points (hardcoded, like ILOVEYOU) -->
            <div class="timeline-line">
                <div class="timeline-point" data-index="0" aria-label="Worm Release - November 2, 1988">
                    <i class="fas fa-bug"></i>
                </div>
                <div class="timeline-point" data-index="1" aria-label="Initial Infection - Hours Later">
                    <i class="fas fa-microchip"></i>
                </div>
                <div class="timeline-point" data-index="2" aria-label="Rapid Propagation - Same Day">
                    <i class="fas fa-network-wired"></i>
                </div>
                <div class="timeline-point" data-index="3" aria-label="Network Disruption - November 3-4, 1988">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="timeline-point" data-index="4" aria-label="Containment & Analysis - Subsequent Days">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <!-- Timeline Event Cards (keep using PHP loop for content) -->
            <?php foreach ($events as $index => $event): ?>
            <div class="timeline-event-card" data-index="<?php echo $index; ?>">
                <h2><?php echo htmlspecialchars($event['year']); ?></h2>
                <h3><?php echo htmlspecialchars($event['title']); ?></h3>
                <p><?php echo htmlspecialchars($event['description']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="detail-section">
        <h2><i class="fas fa-book"></i> Further Reading</h2>
        <div class="further-reading">
            <ul>
                <li><i class="fas fa-file-alt"></i> <strong><a href="https://www.cs.cornell.edu/courses/cs1110/2013sp/reading/p678-spafford.pdf" target="_blank">The Internet Worm Program: An Analysis</a></strong> - A detailed analysis by Eugene H. Spafford</li>
                <li><i class="fas fa-microscope"></i> <strong><a href="https://course.csail.mit.edu/6.803/pdf/Microscope-Tweezers.pdf" target="_blank">With Microscope and Tweezers: An Analysis of the Internet Virus of November 1988</a></strong> - A technical report by Mark W. Eichin and Jon A. Rochlis</li>
                <li><i class="fas fa-key"></i> <strong><a href="https://www.cs.cmu.edu/~rdriley/487/papers/Thompson_1984_ReflectionsonTrustingTrust.pdf" target="_blank">Reflections on Trusting Trust</a></strong> - Ken Thompson's Turing Award lecture, which influenced discussions of security after the Morris worm</li>
                <li><i class="fas fa-landmark"></i> <strong><a href="https://scholarship.law.cornell.edu/cgi/viewcontent.cgi?article=1348&context=cjlpp" target="_blank">United States v. Morris: Legal Case Analysis</a></strong> - The legal proceedings and implications of the Morris worm case</li>
                <li><i class="fas fa-history"></i> <strong><a href="https://www.cert.org/about/history.html" target="_blank">History of CERT</a></strong> - How the Morris worm led to the formation of the Computer Emergency Response Team</li>
            </ul>
        </div>
    </div>

</section>

<script src="script.js"></script>
<script src="js/timeline.js"></script>

<?php include 'footer.php'; ?>