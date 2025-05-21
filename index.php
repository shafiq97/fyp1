<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cybersecurity Learning Platform</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        /* Enable Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="home-page">

    <section class="header">
        <nav>
            <a href="index.php"><img src="images/logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>                    <li><a href="dashboard.php">DASHBOARD</a></li>
                    <li><a href="#simulation-section">SIMULATION</a></li>
                    <li><a href="#history-section">HISTORY</a></li>
                    <li><a href="login.php">PROFILE</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>Learn Cybersecurity</h1>
            <p>Protect your digital world with the latest knowledge in cybersecurity.</p>
            <a href="profile.php" class="hero-btn">Get Started</a>
        </div>
    </section>

    <!--------Simulation Section-------->
    <section id="simulation-section" class="simulation">
        <h1>Malware Simulations</h1>
        <p>Let's explore how malware behaves in real-world scenarios.</p>

        <div class="row">
            <div class="simulation-col">
                <img src="images/virus.png">
                <h3>Viruses</h3>
                <p>Understand how viruses work and how they infect systems.</p>
                <a href="simulation.php" class="sim-btn">Start Learning</a>
            </div>
            <div class="simulation-col">
                <img src="images/worms.png">
                <h3>Worms</h3>
                <p>Discover how worms spread across networks.</p>
                <a href="simulation.php" class="sim-btn">Start Learning</a>
            </div>
            <div class="simulation-col">
                <img src="images/trojans.png">
                <h3>Trojans</h3>
                <p>Learn how trojans disguise themselves and infiltrate systems.</p>
                <a href="simulation.php" class="sim-btn">Start Learning</a>
            </div>
        </div>
    </section>

    <!--------Real-World Scenario Section-------->
    <section id="history-section" class="history">
        <h1>Real-World Scenario</h1>
        <p>Get to know real-world scenarios for in-depth knowledge about malware.</p>
        <div class="row">
            <div class="history-col">
                <img src="images/iloveyou.jpg">
                <div class="layer">
                    <h3>ILOVEYOU Virus</h3>
                </div>
            </div>
            <div class="history-col">
                <img src="images/morrisworm.jpg">
                <div class="layer">
                    <h3>Morris Worm</h3>
                </div>
            </div>
            <div class="history-col">
                <img src="images/zeustrojan.jpg">
                <div class="layer">
                    <h3>Zeus Trojan</h3>
                </div>
            </div>
        </div>
    </section>

    <!--------JavaScript for the Navigation Bar-------->
    <script>
        var navLinks = document.getElementById("navLinks");
        function showMenu() {
            navLinks.style.right = "0";
        }
        function hideMenu() {
            navLinks.style.right = "-200px";
        }
    </script>

</body>

</html>
