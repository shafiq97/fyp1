<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virus Simulation</title>

    <!---- CSS File Link ---->
    <link rel="stylesheet" href="css/simulation.css">
    <link rel="stylesheet" href="css/virus_simulation.css">
    <link rel="stylesheet" href="VIRUS%20SIMULATION/TemplateData/style.css">
    
    <style>
        /* Custom styles for better Unity integration */
        .simulation-container {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 20px;
            box-sizing: border-box;
        }
        
        .simulation-header {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .unity-frame {
            width: 960px;
            height: 600px;
            max-width: 100%;
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }
        
        /* Dark mode integration */
        .dark-mode .unity-frame {
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.1);
        }
        
        /* Responsive styles */
        @media (max-width: 1024px) {
            .unity-frame {
                width: 100%;
                height: 400px;
            }
        }
        
        /* Style for simulation info section */
        .simulation-info {
            width: 100%;
            max-width: 960px;
            margin-top: 30px;
            background-color: var(--white-color);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .dark-mode .simulation-info {
            background-color: var(--light-bg);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }
        
        .simulation-info h3 {
            margin-top: 0;
            color: var(--black-color);
            font-size: 1.8rem;
            border-bottom: 1px solid var(--secondary-color);
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
        
        .dark-mode .simulation-info h3 {
            color: var(--light-color);
        }
        
        .simulation-info p {
            line-height: 1.6;
            margin-bottom: 15px;
            color: var(--dark-color);
        }
        
        .dark-mode .simulation-info p {
            color: var(--light-color);
        }
    </style>
</head>

<section class="simulation-container">
    <div class="simulation-header">
        <h1 class="heading">Virus Simulation</h1>
        <p>Experience how computer viruses spread and infect systems in this interactive simulation</p>
    </div>
    
    <div class="unity-frame">
        <iframe src="unity_simulation_fixed.html" width="960" height="540" frameborder="0" allowfullscreen></iframe>
    </div>
    
    <div class="simulation-info">
        <h3>About This Simulation</h3>
        <p>This interactive simulation demonstrates how computer viruses spread through networks and systems. Use the controls to observe how different security measures affect virus propagation.</p>
        
        <h3>How to Use</h3>
        <p>Click within the simulation to interact. Use the provided buttons and controls to adjust settings and watch how the virus behavior changes accordingly. This simulation helps visualize concepts covered in the Virus Module.</p>
        
        <h3>Learning Objectives</h3>
        <p>Through this simulation, you'll learn about virus propagation methods, how viruses exploit system vulnerabilities, and basic strategies to prevent virus infections.</p>
    </div>
</section>

<script>
    // Add a small script to handle iframe resizing for responsiveness
    function adjustIframeSize() {
        const iframe = document.querySelector('.unity-frame iframe');
        if (iframe) {
            if (window.innerWidth < 960) {
                const width = Math.min(window.innerWidth - 40, 960);
                const height = width * (540/960); // maintain aspect ratio
                iframe.style.width = width + 'px';
                iframe.style.height = height + 'px';
            } else {
                iframe.style.width = '960px';
                iframe.style.height = '540px';
            }
        }
    }
    
    // Adjust iframe on page load and window resize
    window.addEventListener('load', adjustIframeSize);
    window.addEventListener('resize', adjustIframeSize);
    
    // Reload Unity simulation when dark mode changes to adjust visuals
    const toggleBtn = document.getElementById('toggle-btn');
    if (toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            setTimeout(() => {
                const iframe = document.querySelector('.unity-frame iframe');
                if (iframe) {
                    // Add a timestamp parameter to force reload
                    const currentSrc = iframe.src.split('?')[0];
                    iframe.src = currentSrc + '?t=' + new Date().getTime();
                }
            }, 300);
        });
    }
</script>

<?php include 'footer.php'; ?>
