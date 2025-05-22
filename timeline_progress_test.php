<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline Progress Test</title>
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
        
        .debug-info {
            margin-top: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 5px;
            border-left: 4px solid #5090C1;
            font-family: monospace;
        }
    </style>
</head>

<section class="history-details content-container">
    
    <div class="test-container">
        <h1>Timeline Progress Test</h1>
        
        <div class="test-section">
            <h2>3-Point Timeline</h2>
            <div class="timeline-container">
                <div class="timeline-line">
                    <div class="timeline-point" data-index="0"><i class="fas fa-flag"></i></div>
                    <div class="timeline-point" data-index="1"><i class="fas fa-sync"></i></div>
                    <div class="timeline-point" data-index="2"><i class="fas fa-check"></i></div>
                </div>
                <div class="debug-info" id="debug-3"></div>
            </div>
        </div>
        
        <div class="test-section">
            <h2>5-Point Timeline</h2>
            <div class="timeline-container">
                <div class="timeline-line">
                    <div class="timeline-point" data-index="0"><i class="fas fa-flag"></i></div>
                    <div class="timeline-point" data-index="1"><i class="fas fa-sync"></i></div>
                    <div class="timeline-point" data-index="2"><i class="fas fa-exclamation"></i></div>
                    <div class="timeline-point" data-index="3"><i class="fas fa-shield-alt"></i></div>
                    <div class="timeline-point" data-index="4"><i class="fas fa-check"></i></div>
                </div>
                <div class="debug-info" id="debug-5"></div>
            </div>
        </div>
        
        <div class="test-section">
            <h2>7-Point Timeline</h2>
            <div class="timeline-container">
                <div class="timeline-line">
                    <div class="timeline-point" data-index="0"><i class="fas fa-flag"></i></div>
                    <div class="timeline-point" data-index="1"><i class="fas fa-code"></i></div>
                    <div class="timeline-point" data-index="2"><i class="fas fa-bug"></i></div>
                    <div class="timeline-point" data-index="3"><i class="fas fa-sync"></i></div>
                    <div class="timeline-point" data-index="4"><i class="fas fa-exclamation"></i></div>
                    <div class="timeline-point" data-index="5"><i class="fas fa-shield-alt"></i></div>
                    <div class="timeline-point" data-index="6"><i class="fas fa-check"></i></div>
                </div>
                <div class="debug-info" id="debug-7"></div>
            </div>
        </div>
    </div>

</section>

<script src="js/timeline-fix.js"></script>
<script src="js/timeline_diagnostics.js"></script>
<script src="js/timeline_progress_fix.js"></script>
<script src="js/timeline_standardizer.js"></script>
<script>
// Additional debug code for timeline progress test
document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('.test-section');
    
    sections.forEach(section => {
        const container = section.querySelector('.timeline-container');
        const timeline = container.querySelector('.timeline-line');
        const points = timeline.querySelectorAll('.timeline-point');
        const debugBox = section.querySelector('.debug-info');
        
        // Update debug info
        function updateDebugInfo() {
            const totalPoints = points.length;
            const activePoint = timeline.querySelector('.timeline-point.active');
            const activeIndex = activePoint ? parseInt(activePoint.getAttribute('data-index')) : -1;
            const progressWidth = timeline.style.getPropertyValue('--progress-width') || '0%';
            
            debugBox.innerHTML = 
                `<strong>Total Points:</strong> ${totalPoints}<br>` +
                `<strong>Active Point:</strong> ${activeIndex + 1} (index: ${activeIndex})<br>` +
                `<strong>Progress Width:</strong> ${progressWidth}<br>` +
                `<strong>Expected Progress:</strong> ${activeIndex >= 0 ? ((activeIndex / (totalPoints-1)) * 100).toFixed(2) + '%' : 'N/A'}`;
        }
        
        // Update initially
        updateDebugInfo();
        
        // Add click handlers to update debug info
        points.forEach(point => {
            const originalClick = point.onclick;
            point.addEventListener('click', function() {
                setTimeout(updateDebugInfo, 100);
            });
        });
    });
});
</script>

<?php include 'footer.php'; ?>
