<?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trojan Module</title>
        <link rel="stylesheet" href="css/trojan_module.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    </head>

    <section class="module-details-section">
        <h1 class="module-title"><i class="fas fa-horse"></i> Trojan Module</h1>

        <div class="module-content">
            <section class="module-subsection">
                <h2 class="subsection-title"><i class="fas fa-info-circle"></i> Definition</h2>
                <p class="module-paragraph">
                    A trojan horse, or trojan, is a type of malware that disguises itself as legitimate software to trick users into installing it. Unlike viruses and worms, trojans do not self-replicate. They rely on social engineering to deceive users.
                </p>
            </section>

            <section class="module-subsection">
                <h2 class="subsection-title"><i class="fas fa-route"></i> How Trojans Spread</h2>
                <p class="module-paragraph">
                    Trojans use deception to convince users to execute them. Common methods include:
                </p>
                <ul class="module-list">
                    <li><i class="fas fa-file"></i> Hiding within seemingly harmless software downloads.</li>
                    <li><i class="fas fa-envelope"></i> Arriving as attachments in phishing emails.</li>
                    <li><i class="fas fa-link"></i> Being distributed through malicious websites or links.</li>
                </ul>
            </section>

            <section class="module-subsection">
                <h2 class="subsection-title"><i class="fas fa-list-ul"></i> Types of Trojans</h2>
                <div class="module-grid">
                    <div class="module-card">
                        <h3 class="card-title"><i class="fas fa-door-open"></i> Backdoor Trojans</h3>
                        <p class="card-text">
                            Create backdoors on infected systems, allowing attackers remote access and control.
                        </p>
                    </div>
                    <div class="module-card">
                        <h3 class="card-title"><i class="fas fa-download"></i> Downloader Trojans</h3>
                        <p class="card-text">
                            Download other malware onto the infected system after installation.
                        </p>
                    </div>
                    <div class="module-card">
                        <h3 class="card-title"><i class="fas fa-key"></i> Information-Stealing Trojans</h3>
                        <p class="card-text">
                            Steal sensitive data such as passwords, credit card numbers, and other personal information.
                        </p>
                    </div>
                    <div class="module-card">
                        <h3 class="card-title"><i class="fas fa-money-bill-wave"></i> Banking Trojans</h3>
                        <p class="card-text">
                            Specifically designed to steal online banking credentials.
                        </p>
                    </div>
                    <div class="module-card">
                        <h3 class="card-title"><i class="fas fa-lock"></i> Ransomware Trojans</h3>
                        <p class="card-text">
                            Encrypt user files and demand a ransom payment for decryption (often considered ransomware, but delivered as a trojan).
                        </p>
                    </div>
                </div>
            </section>

            <section class="module-subsection">
                <h2 class="subsection-title"><i class="fas fa-exclamation-triangle"></i> Risks</h2>
                <p class="module-paragraph">
                    Trojans can lead to a wide range of security breaches and damage:
                </p>
                <ul class="module-list">
                    <li><i class="fas fa-user-secret"></i> Unauthorized access to systems.</li>
                    <li><i class="fas fa-file-invoice-dollar"></i> Financial loss due to theft of credentials.</li>
                    <li><i class="fas fa-id-card"></i> Identity theft.</li>
                    <li><i class="fas fa-file-excel"></i> Data corruption or deletion.</li>
                    <li><i class="fas fa-network-attack"></i> Use of infected systems for botnet attacks.</li>
                </ul>
            </section>

            <section class="module-subsection">
                <h2 class="subsection-title"><i class="fas fa-shield-alt"></i> Mitigation Strategies</h2>
                <p class="module-paragraph">
                    Protecting against trojans requires a combination of caution and security software:
                </p>
                <ul class="module-list">
                    <li><i class="fas fa-cloud-download-alt"></i> Download software only from trusted websites.</li>
                    <li><i class="fas fa-envelope-open-text"></i> Be wary of email attachments and links, especially from unknown senders.</li>
                    <li><i class="fas fa-sync-alt"></i> Keep operating systems and applications updated.</li>
                    <li><i class="fas fa-fire"></i> Use a firewall to block unauthorized connections.</li>
                    <li><i class="fas fa-sync-alt"></i> Install and maintain reputable antivirus and anti-malware software.</li>
                </ul>
            </section>

            <section class="module-subsection">
                <h2 class="subsection-title"><i class="fas fa-spider"></i> Malware Examples</h2>
                <div class="module-grid">
                    <div class="module-card">
                        <h3 class="card-title"><i class="fas fa-bolt"></i> Zeus</h3>
                        <p class="card-text">
                            A notorious banking trojan that stole login credentials.
                        </p>
                    </div>
                    <div class="module-card">
                        <h3 class="card-title"><i class="fas fa-robot"></i> Emotet</h3>
                        <p class="card-text">
                            A modular trojan used to distribute other malware.
                        </p>
                    </div>
                </div>
            </section>

        </div>
    </section>

    <?php include 'footer.php'; ?>