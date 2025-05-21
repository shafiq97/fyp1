<?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Virus Module</title>
        <link rel="stylesheet" href="css/virus_module.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    </head>

    <section class="module-details-section">
        <h1 class="module-title"><i class="fas fa-virus"></i> Virus Module</h1>

        <div class="module-content">
            <section class="module-subsection">
                <h2 class="subsection-title"><i class="fas fa-info-circle"></i> Definition</h2>
                <p class="module-paragraph">
                    A virus is a type of malware that inserts its malicious code into existing files or programs. It requires a host to execute and spread, much like a biological virus needs a living cell. Once infected, the host file carries the virus, and it activates when the file is opened or executed.
                </p>
            </section>

            <section class="module-subsection">
                <h2 class="subsection-title"><i class="fas fa-route"></i> How Viruses Spread</h2>
                <p class="module-paragraph">
                    Viruses spread through the transfer of infected files from one computer to another. Common methods include:
                </p>
                <ul class="module-list">
                    <li><i class="fas fa-file-download"></i> Downloading infected software from untrusted websites.</li>
                    <li><i class="fas fa-envelope"></i> Opening infected attachments in emails.</li>
                    <li><i class="fas fa-compact-disc"></i> Sharing infected files via external storage devices (USB drives, etc.).</li>
                </ul>
            </section>

            <section class="module-subsection">
                <h2 class="subsection-title"><i class="fas fa-list-ul"></i> Types of Viruses</h2>
                <div class="module-grid">
                    <div class="module-card">
                        <h3 class="card-title"><i class="fas fa-file-code"></i> File Infectors</h3>
                        <p class="card-text">
                            Infect executable files (.exe, .com, etc.). When the infected program runs, the virus activates.
                        </p>
                    </div>
                    <div class="module-card">
                        <h3 class="card-title"><i class="fas fa-hdd"></i> Boot Sector Viruses</h3>
                        <p class="card-text">
                            Infect the boot sector of storage devices, which is responsible for loading the operating system.
                        </p>
                    </div>
                    <div class="module-card">
                        <h3 class="card-title"><i class="fas fa-file-word"></i> Macro Viruses</h3>
                        <p class="card-text">
                            Infect data files created by applications with macro functionality (e.g., Word documents, Excel spreadsheets).
                        </p>
                    </div>
                </div>
            </section>

            <section class="module-subsection">
                <h2 class="subsection-title"><i class="fas fa-exclamation-triangle"></i> Risks</h2>
                <p class="module-paragraph">
                    Viruses can cause a variety of damage to computer systems and data:
                </p>
                <ul class="module-list">
                    <li><i class="fas fa-trash"></i> Deleting or corrupting files, leading to data loss.</li>
                    <li><i class="fas fa-desktop"></i> Causing system instability, crashes, or slow performance.</li>
                    <li><i class="fas fa-network-wired"></i> Spreading to other computers and networks.</li>
                    <li><i class="fas fa-user-secret"></i> Stealing sensitive information.</li>
                </ul>
            </section>

            <section class="module-subsection">
                <h2 class="subsection-title"><i class="fas fa-shield-alt"></i> Mitigation Strategies</h2>
                <p class="module-paragraph">
                    Protecting against viruses involves a combination of preventative measures and good computing habits:
                </p>
                <ul class="module-list">
                    <li><i class="fas fa-sync-alt"></i> Install and regularly update antivirus software.</li>
                    <li><i class="fas fa-cloud-download-alt"></i> Download software only from reputable sources.</li>
                    <li><i class="fas fa-envelope-open-text"></i> Be cautious when opening email attachments or clicking on links.</li>
                    <li><i class="fas fa-check-circle"></i> Keep your operating system and applications up to date.</li>
                    <li><i class="fas fa-hdd"></i> Regularly back up your important data.</li>
                </ul>
            </section>

            <section class="module-subsection">
                <h2 class="subsection-title"><i class="fas fa-spider"></i> Malware Examples</h2>
                <div class="module-grid">
                    <div class="module-card">
                        <h3 class="card-title"><i class="fas fa-heart"></i> ILOVEYOU</h3>
                        <p class="card-text">
                            A widespread email worm that tricked users into opening an attachment, causing massive disruption.
                        </p>
                    </div>
                    <div class="module-card">
                        <h3 class="card-title"><i class="fas fa-radiation"></i> Stuxnet</h3>
                        <p class="card-text">
                            A sophisticated worm that targeted industrial control systems.
                        </p>
                    </div>
                </div>
            </section>

        </div>
    </section>

    <?php include 'footer.php'; ?>