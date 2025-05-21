-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS fyp_malware_db;
USE fyp_malware_db;

-- Create the malware_types table
CREATE TABLE IF NOT EXISTS malware_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(50) NOT NULL UNIQUE,
    short_description TEXT,
    image_path VARCHAR(255),
    year INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create the timeline_events table
CREATE TABLE IF NOT EXISTS timeline_events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    malware_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    year VARCHAR(20) NOT NULL,
    description TEXT,
    icon_class VARCHAR(50) NOT NULL,
    event_order INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (malware_id) REFERENCES malware_types(id) ON DELETE CASCADE
);

-- Insert data into malware_types
INSERT INTO malware_types (name, slug, short_description, image_path, year) VALUES 
('ILOVEYOU Virus', 'iloveyou', 'An email virus that infected millions of systems worldwide in 2000.', 'iloveyou.jpg', 2000),
('Morris Worm', 'morrisworm', 'The first worm to spread across the internet in 1988.', 'morrisworm.jpg', 1988),
('Zeus Trojan', 'zeustrojan', 'A sophisticated banking trojan that stole financial information.', 'zeustrojan.jpg', 2007);

-- Insert ILOVEYOU timeline events
INSERT INTO timeline_events (malware_id, title, year, description, icon_class, event_order) VALUES
(1, 'Initial Infection - May 4, 2000', '2000', 'The ILOVEYOU worm arrives via email with the subject \'ILOVEYOU\' and a malicious attachment named "LOVE-LETTER-FOR-YOU.TXT.vbs". Opening the attachment begins the infection process. The virus was first detected in the Philippines.', 'fa-virus', 0),
(1, 'Rapid Propagation - Hours Later', '2000', 'Within hours, the worm replicates and sends copies of itself to all Outlook contacts, spreading exponentially. The worm\'s simple yet effective social engineering tactic causes it to spread faster than any previous malware.', 'fa-share-alt', 1),
(1, 'Global Disruption - Same Day', '2000', 'Email servers are overwhelmed globally due to the massive volume of infected messages, causing widespread communication disruptions. Major organizations worldwide shut down their email systems to prevent further spread.', 'fa-globe', 2),
(1, 'Containment Efforts - Days Later', '2000', 'Efforts to contain the worm include shutting down mail servers and urging users not to open suspicious attachments. Security vendors rush to update their products to detect and remove the worm from infected systems.', 'fa-shield-alt', 3),
(1, 'Aftermath - Weeks Later', '2000', 'The ILOVEYOU outbreak causes an estimated $5.5-8.7 billion in damages worldwide. The incident leads to increased awareness of email-borne threats and changes in how email attachments are handled. Legal charges against the creators are eventually dropped due to lack of applicable laws in the Philippines at the time.', 'fa-chart-line', 4);

-- Insert Morris Worm timeline events
INSERT INTO timeline_events (malware_id, title, year, description, icon_class, event_order) VALUES
(2, 'Worm Release - November 2, 1988', '1988', 'Robert Morris, a graduate student at MIT, releases the Morris worm from MIT\'s computer lab. Morris intended it to be a harmless experiment to measure the size of the ARPANET (the precursor to the modern internet).', 'fa-bug', 0),
(2, 'Initial Infection - Hours Later', '1988', 'The worm begins exploiting vulnerabilities in Unix systems, targeting specific weaknesses in sendmail, fingerd, and rsh/rexec services. It begins to spread through the network by replicating itself to other systems.', 'fa-microchip', 1),
(2, 'Rapid Propagation - Same Day', '1988', 'A critical flaw in the worm\'s design fails to properly check if a system is already infected, causing it to reinfect systems multiple times. This leads to exponential growth and system resource exhaustion as multiple copies run simultaneously.', 'fa-network-wired', 2),
(2, 'Network Disruption - November 3-4, 1988', '1988', 'Systems across the ARPANET slow down dramatically and many become completely unresponsive. Approximately 10% of all internet-connected computers (around 6,000 machines) are infected. Many systems have to be disconnected from the network to stop the spread.', 'fa-exclamation-triangle', 3),
(2, 'Containment & Analysis - Subsequent Days', '1988', 'Computer scientists at Berkeley and other institutions disassemble the worm code to understand it. A "vaccine" program is developed to prevent infection. The incident leads to the formation of the Computer Emergency Response Team (CERT) at Carnegie Mellon University to coordinate responses to future threats.', 'fa-search', 4);

-- Insert Zeus Trojan timeline events
INSERT INTO timeline_events (malware_id, title, year, description, icon_class, event_order) VALUES
(3, 'Initial Appearance', '2007', 'Zeus trojan first emerges in the cybercrime landscape, targeting online banking information on Microsoft Windows systems. Its creator begins selling the malware toolkit in underground forums to cybercriminals.', 'fa-horse-head', 0),
(3, 'Feature Enhancements', '2009', 'Zeus evolves with advanced techniques like form grabbing, man-in-the-browser attacks, and sophisticated encryption to improve its data theft capabilities and evade detection. The trojan becomes one of the most prevalent threats to online banking security.', 'fa-puzzle-piece', 1),
(3, 'Source Code Leak', '2011', 'The Zeus source code is leaked online, leading to the creation of numerous variants and derivatives such as Citadel, Gameover Zeus, and Ice IX. This leak results in a surge of attacks as the barrier to entry for using this sophisticated malware is lowered.', 'fa-code', 2),
(3, 'Operation Tovar', '2014', 'Law enforcement agencies from multiple countries coordinate Operation Tovar to disrupt the Gameover Zeus botnet, which had infected between 500,000 and 1 million computers worldwide. The FBI offers a $3 million reward for information leading to the arrest of the botnet\'s administrator, Evgeniy Bogachev.', 'fa-gavel', 3),
(3, 'Continuing Legacy', '2016-Present', 'Despite law enforcement efforts, Zeus variants continue to evolve and remain active in cybercriminal operations. The core techniques pioneered by Zeus are incorporated into newer banking trojans, and its code influences modern financial malware. Total damages attributed to Zeus and its derivatives are estimated to be in the billions of dollars.', 'fa-history', 4);
