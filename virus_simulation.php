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
    <link rel="stylesheet" href="css/virus-simulation-fix.css">
    <link rel="stylesheet" href="css/logo-fix.css">
    <link rel="stylesheet" href="VIRUS%20SIMULATION/TemplateData/style.css">
    
    <style>
        /* Custom styles for better Unity integration */
        .simulation-container {
            position: relative;
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 20px;
            box-sizing: border-box;
            margin-left: auto;
            margin-right: auto;
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

<section class="simulation-container content-container simulation-page">
    <div class="simulation-header">
        <h1 class="heading">Virus Simulation</h1>
        <p>Experience how computer viruses spread and infect systems in this interactive simulation</p>
    </div>
    
    <div class="unity-frame">
        <div id="loading-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.7); display: flex; justify-content: center; align-items: center; z-index: 10; border-radius: 10px;">
            <div style="text-align: center; color: white;">
                <div class="spinner-border text-light" role="status" style="width: 3rem; height: 3rem;"></div>
                <p style="margin-top: 15px; font-size: 18px;">Loading Simulation Environment...</p>
            </div>
        </div>
        <iframe src="unity_simulation_fixed.html" width="960" height="540" frameborder="0" allowfullscreen onload="document.getElementById('loading-overlay').style.display='none';"></iframe>
    </div>
    
    <div id="webgl-error" style="display: none; margin-top: 20px; padding: 15px; background-color: #ffdddd; border-left: 6px solid #f44336; color: #333; border-radius: 5px;">
        <h4 style="margin-top: 0;"><i class="fas fa-exclamation-triangle"></i> WebGL Warning</h4>
        <p>The simulation is experiencing some WebGL compatibility issues. These warnings don't affect the functionality of the simulation but indicate that your browser might not fully support all WebGL features used.</p>
        <p>For the best experience, we recommend using the latest version of Chrome, Firefox, or Edge browsers.</p>
    </div>
    
    <div id="webgl-not-supported" style="display: none; margin-top: 20px; padding: 15px; background-color: #ffdddd; border-left: 6px solid #f44336; color: #333; border-radius: 5px;">
        <h4 style="margin-top: 0;"><i class="fas fa-times-circle"></i> WebGL Not Supported</h4>
        <p>Your browser does not support WebGL, which is required to run this simulation.</p>
        <p>Please try using a modern browser like Chrome, Firefox, or Edge. If you're already using one of these browsers, try updating to the latest version or enabling hardware acceleration in your browser settings.</p>
    </div>
    
    <div id="webgl-limited" style="display: none; margin-top: 20px; padding: 15px; background-color: #fff3cd; border-left: 6px solid #ffc107; color: #333; border-radius: 5px;">
        <h4 style="margin-top: 0;"><i class="fas fa-exclamation-circle"></i> Limited WebGL Support</h4>
        <p>Your browser has limited WebGL support, which may cause performance issues or visual glitches in the simulation.</p>
        <p>The simulation will still work, but for the best experience, we recommend using Chrome or Firefox with hardware acceleration enabled.</p>
    </div>
    
    <div id="audio-context-error" style="display: none; margin-top: 20px; padding: 15px; background-color: #fff3cd; border-left: 6px solid #ffc107; color: #333; border-radius: 5px;">
        <h4 style="margin-top: 0;"><i class="fas fa-volume-mute"></i> Audio Alert</h4>
        <p>To enable audio in the simulation, please interact with the simulation by clicking on it or pressing any key.</p>
        <p>This is a browser security feature that prevents websites from playing audio automatically.</p>
        <button id="enable-audio-btn" class="btn" style="background-color: #007bff; color: white; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer;">Enable Audio</button>
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
        const unityFrame = document.querySelector('.unity-frame');
        
        if (iframe && unityFrame) {
            const containerWidth = unityFrame.parentElement.clientWidth;
            const maxWidth = 960; // Maximum width
            
            if (containerWidth < maxWidth) {
                const width = Math.min(containerWidth - 40, maxWidth);
                const height = width * (540/960); // maintain aspect ratio
                
                iframe.style.width = width + 'px';
                iframe.style.height = height + 'px';
                unityFrame.style.width = width + 'px';
                unityFrame.style.height = height + 'px';
            } else {
                iframe.style.width = maxWidth + 'px';
                iframe.style.height = '540px';
                unityFrame.style.width = maxWidth + 'px';
                unityFrame.style.height = '540px';
            }
        }
    }
    
    // Adjust iframe on page load and window resize
    window.addEventListener('load', adjustIframeSize);
    window.addEventListener('resize', adjustIframeSize);
    document.addEventListener('DOMContentLoaded', adjustIframeSize);
    
    // Also periodically check and adjust size to ensure proper rendering
    setTimeout(adjustIframeSize, 500);
    setTimeout(adjustIframeSize, 1000);
    setTimeout(adjustIframeSize, 2000);
    
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
    
    // Show WebGL error warning if errors are detected in console
    let errorCount = 0;
    const errorThreshold = 5; // Show message after this many WebGL errors
    
    // Create a proxy for console.error to detect WebGL errors
    const originalConsoleError = console.error;
    console.error = function() {
        // Check if this is a WebGL error
        if (arguments[0] && typeof arguments[0] === 'string' && 
            (arguments[0].includes('WebGL') || arguments[0].includes('INVALID_ENUM'))) {
            errorCount++;
            
            if (errorCount >= errorThreshold) {
                document.getElementById('webgl-error').style.display = 'block';
            }
        }
        
        // Call the original console.error
        originalConsoleError.apply(console, arguments);
    };
    
    // Also listen for messages from the iframe
    window.addEventListener('message', function(event) {
        if (event.data && event.data.type === 'webgl-error') {
            document.getElementById('webgl-error').style.display = 'block';
        }
        if (event.data && event.data.type === 'audio-context-error') {
            document.getElementById('audio-context-error').style.display = 'block';
        }
        if (event.data && event.data.type === 'webgl-not-supported') {
            document.getElementById('webgl-not-supported').style.display = 'block';
            // Hide the iframe to prevent confusion
            const iframe = document.querySelector('.unity-frame iframe');
            if (iframe) {
                iframe.style.display = 'none';
            }
        }
        if (event.data && event.data.type === 'webgl-limited-support') {
            document.getElementById('webgl-limited').style.display = 'block';
        }
    });
    
    // Function to resume audio context in the iframe
    function resumeAudioInSimulation() {
        const iframe = document.querySelector('.unity-frame iframe');
        if (iframe) {
            try {
                // Send a message to the iframe to resume audio
                iframe.contentWindow.postMessage({ type: 'resume-audio' }, '*');
                // Hide the audio warning after attempting to resume
                document.getElementById('audio-context-error').style.display = 'none';
            } catch (e) {
                console.error("Error sending message to iframe:", e);
            }
        }
    }
    
    // Add click handler for the enable audio button
    document.getElementById('enable-audio-btn').addEventListener('click', function() {
        resumeAudioInSimulation();
    });
    
    // Also try to automatically enable audio on page interaction
    document.addEventListener('click', function(e) {
        // Check if the click is anywhere in the simulation container
        if (e.target.closest('.simulation-container')) {
            resumeAudioInSimulation();
        }
    });
</script>

<?php include 'footer.php'; ?>
