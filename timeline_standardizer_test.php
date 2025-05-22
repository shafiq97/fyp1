<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline Standardizer Test</title>
    <link rel="stylesheet" href="css/history-layout-fix.css">
    <link rel="stylesheet" href="css/logo-fix.css">
    <link rel="stylesheet" href="css/timeline-icon-fix.css">
    <link rel="stylesheet" href="css/timeline_progress_fix.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/fa-icons-fix.css"><!-- Added Font Awesome icons fix -->
    <style>
        .test-container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .test-section {
            margin-bottom: 40px;
        }
        
        h1 {
            color: var(--primary-color, #444);
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        
        h2 {
            color: var(--secondary-color, #666);
            margin-bottom: 15px;
        }
        
        .history-details {
            /* Required class for the timeline standardizer to work */
        }
        
        .timeline-line {
            position: relative;
            width: 100%;
            height: 5px;
            background-color: #e0e0e0;
            margin: 40px 0;
            overflow: visible;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .timeline-point {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #5090C1;
            color: white;
            position: relative;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: 3px solid #333;
            transition: transform 0.3s ease;
        }
        
        .timeline-point.active {
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        
        .timeline-event-card {
            width: 80%;
            margin: 30px auto;
            padding: 20px;
            border-radius: 8px;
            background-color: #f8f8f8;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: none;
        }
        
        .timeline-event-card.active {
            display: block;
        }
        
        .debug-info {
            margin-top: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 5px;
            border-left: 4px solid #5090C1;
            font-family: monospace;
        }
        
        .control-panel {
            margin-top: 20px;
            padding: 15px;
            background: #f0f0f0;
            border-radius: 5px;
        }
        
        button {
            padding: 8px 15px;
            margin: 5px;
            background: #5090C1;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button:hover {
            background: #3a7ca5;
        }
    </style>
</head>

<section class="history-details content-container">
    
    <div class="test-container">
        <h1>Timeline Standardizer Test</h1>
        
        <div class="control-panel">
            <h3>Test Controls</h3>
            <button id="test3points">Create 3-Point Timeline</button>
            <button id="test5points">Create 5-Point Timeline</button>
            <button id="test7points">Create 7-Point Timeline</button>
            <button id="runStandardizer">Run Standardizer</button>
        </div>
        
        <div class="test-section">
            <h2>Dynamic Timeline Test</h2>
            <div class="timeline-container">
                <div class="timeline-line">
                    <!-- Points will be added dynamically -->
                </div>
                <div class="debug-info" id="debug-info"></div>
            </div>
        </div>
    </div>

</section>

<script src="js/timeline-fix.js"></script>
<script src="js/timeline_diagnostics.js"></script>
<script src="js/timeline_progress_fix.js"></script>
<script src="js/timeline_standardizer.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const timeline = document.querySelector('.timeline-line');
    const debugInfo = document.getElementById('debug-info');
    
    // Function to create a timeline with specified number of points
    function createTimeline(numPoints) {
        // Clear existing points
        timeline.innerHTML = '';
        
        // Create points
        for (let i = 0; i < numPoints; i++) {
            const point = document.createElement('div');
            point.className = 'timeline-point';
            point.setAttribute('data-index', i);
            point.setAttribute('aria-label', `Point ${i+1}`);
            
            const icon = document.createElement('i');
            icon.className = 'fas fa-circle';
            
            point.appendChild(icon);
            timeline.appendChild(point);
        }
        
        // Apply timeline behaviors
        if (window.applyTimelineBehaviors) {
            window.applyTimelineBehaviors(timeline);
        }
        
        // Update debug info
        updateDebugInfo();
    }
    
    // Function to update debug info
    function updateDebugInfo() {
        const points = timeline.querySelectorAll('.timeline-point');
        debugInfo.innerHTML = `
            <strong>Current Timeline Points:</strong> ${points.length}<br>
            <strong>Expected After Standardization:</strong> 5<br>
            <strong>Status:</strong> ${points.length === 5 ? 'Standardized ✅' : 'Not Standardized ❌'}
        `;
    }
    
    // Set up button handlers
    document.getElementById('test3points').addEventListener('click', function() {
        createTimeline(3);
    });
    
    document.getElementById('test5points').addEventListener('click', function() {
        createTimeline(5);
    });
    
    document.getElementById('test7points').addEventListener('click', function() {
        createTimeline(7);
    });
    
    document.getElementById('runStandardizer').addEventListener('click', function() {
        // Force the standardizer to run
        const event = new Event('DOMContentLoaded');
        document.dispatchEvent(event);
        
        // Update debug info after a short delay
        setTimeout(updateDebugInfo, 100);
    });
    
    // Start with 3 points
    createTimeline(3);
});
</script>

<?php include 'footer.php'; ?>
