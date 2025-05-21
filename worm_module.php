<?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Worm Module</title>
        <link rel="stylesheet" href="css/worm_module.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    </head>

    <section class="module-details-section">
        <h1 class="module-title"><i class="fas fa-worm"></i> Worm Module</h1>

        <div class="module-content">
            <section class="module-subsection">
                <h2 class="subsection-title"><i class="fas fa-info-circle"></i> Definition</h2>
                <p class="module-paragraph">
                    A worm is a standalone malware program that replicates itself in order to spread to other computers. Unlike a virus, a worm does not need to attach itself to an existing program to infect a device. This self-replication enables worms to spread rapidly across networks.
                </p>
            </section>

            <section class="module-subsection">
                <h2 class="subsection-title"><i class="fas fa-route"></i> How Worms Spread</h2>
                <p class="module-paragraph">
                    Worms exploit network vulnerabilities to propagate, often without requiring user interaction. Common methods include:
                </p>
                <ul class="module-list">
                    <li><i class="fas fa-network-wired"></i> Exploiting vulnerabilities in operating systems or applications.</li>
                    <li><i class="fas fa-envelope"></i> Spreading through infected email attachments or links.</li>
                    <li><i class="fas fa-comment-dots"></i> Spreading through instant messaging applications.</li>
                    <li><i class="fas fa-share-alt"></i> Spreading through file-sharing networks.</li>
                </ul>
            </section>

            <section class="module-subsection">
                <h2 class="subsection-title"><i class="fas fa-list-ul"></i> Types of Worms</h2>
                <div class="module-grid">
                    <div class="module-card">
                        <h3 class="card-title"><i class="fas fa-at"></i> Email Worms</h3>
                        <p class="card-text">
                            Spread through email messages, often by sending copies of themselves as attachments to contacts in an address book.
                        </p>
                    </div>
                    <div class="module-card">
                        <h3 class="card-title"><i class="fas fa-globe"></i> Internet Worms</h3>
                        <p class="card-text">
                            Spread through the internet by exploiting vulnerabilities in web servers or other internet-facing services.
                        </p>
                    </div>
                    <div class="module-card">
                        <h3 class="card-title"><i class="fas fa-users"></i> File-Sharing Worms</h3>
                        <p class="card-text">
                            Spread through peer-to-peer file-sharing networks, often by disguising themselves as popular files.
                        </p>
                    </div>
                    <div class="module-card">
                        <h3 class="card-title"><i class="fas fa-comment"></i> Instant Messaging Worms</h3>
                        <p class="card-text">
                            Spread through instant messaging applications by sending malicious links or files to contacts.
                        </p>
                    </div>
                </div>
            </section>

            <section class="module-subsection">
                <h2 class="subsection-title"><i class="fas fa-exclamation-triangle"></i> Risks</h2>
                <p class="module-paragraph">
                    Worms can cause a variety of problems, including:
                </p>
                <ul class="module-list">
                    <li><i class="fas fa-traffic-light"></i> Consuming network bandwidth, leading to slowdowns.</li>
                    <li><i class="fas fa-desktop"></i> Slowing down infected computers.</li>
                    <li><i class="fas fa-user-secret"></i> Stealing sensitive data.</li>
                    <li><i class="fas fa-door-open"></i> Installing backdoors to allow attackers to gain control.</li>
                    <li><i class="fas fa-bomb"></i> Launching denial-of-service (DoS) attacks.</li>
                </ul>
            </section>

            <section class="module-subsection">
                <h2 class="subsection-title"><i class="fas fa-shield-alt"></i> Mitigation Strategies</h2>
                <p class="module-paragraph">
                    Protecting against worms requires a combination of vigilance and security measures:
                </p>
                <ul class="module-list">
                    <li><i class="fas fa-sync-alt"></i> Keep operating systems and applications fully patched and updated.</li>
                    <li><i class="fas fa-fire"></i> Use a firewall to block unauthorized network access.</li>
                    <li><i class="fas fa-envelope-open-text"></i> Exercise caution when opening email attachments or clicking on links.</li>
                    <li><i class="fas fa-sync-alt"></i> Install and maintain up-to-date antivirus and anti-malware software.</li>
                    <li><i class="fas fa-network-wired"></i> Segment your network to limit the spread of worms.</li>
                </ul>
            </section>

            <section class="module-subsection">
                <h2 class="subsection-title"><i class="fas fa-spider"></i> Malware Examples</h2>
                <div class="module-grid">
                    <div class="module-card">
                        <h3 class="card-title"><i class="fas fa-calendar-alt"></i> Morris Worm (1988)</h3>
                        <p class="card-text">
                            One of the first major computer worms to spread across the internet, causing significant disruption.
                        </p>
                    </div>
                    <div class="module-card">
                        <h3 class="card-title"><i class="fas fa-code-branch"></i> Conficker</h3>
                        <p class="card-text">
                            A highly sophisticated worm that infected millions of computers worldwide.
                        </p>
                    </div>
                </div>
            </section>

        </div>
    </section>

    <?php include 'footer.php'; ?>