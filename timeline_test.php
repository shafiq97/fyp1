<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline Test</title>
    <link rel="stylesheet" href="css/bootstrap-layout.css">
    <link rel="stylesheet" href="css/timeline-icon-fix.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/fa-icons-fix.css"><!-- Added Font Awesome icons fix -->
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .test-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .test-section {
            margin-bottom: 50px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #0056b3;
            margin-bottom: 20px;
        }
        .timeline-container {
            width: 100%;
            position: relative;
            padding: 30px 0;
        }
        .timeline-line {
            position: relative;
            width: 100%;
            height: 5px;
            background-color: #e0e0e0;
            margin: 40px 0 60px 0;
            overflow: visible;
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
        .row-timeline .timeline-point {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #5090C1;
            color: white;
            margin: 0 auto;
            cursor: pointer;
            border: 3px solid #333;
        }
    </style>
</head>
<body>
    <div class="test-container">
        <h1>Timeline Icon Fix Test</h1>
        
        <!-- Test for Line-style Timeline (Morris Worm style) -->
        <div class="test-section">
            <h2>Line-style Timeline Test</h2>
            <div class="timeline-container">
                <div class="timeline-line">
                    <div class="timeline-point" data-index="0" aria-label="Event 1">
                        <i class="fas fa-bug"></i>
                    </div>
                    <div class="timeline-point" data-index="1" aria-label="Event 2">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <div class="timeline-point" data-index="2" aria-label="Event 3">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="timeline-point" data-index="3" aria-label="Event 4">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="timeline-point" data-index="4" aria-label="Event 5">
                        <i class="fas fa-gavel"></i>
                    </div>
                </div>
                
                <!-- Timeline Event Cards -->
                <div class="timeline-event-card" data-index="0">
                    <h3>Event 1</h3>
                    <p>This is the first event description.</p>
                </div>
                <div class="timeline-event-card" data-index="1">
                    <h3>Event 2</h3>
                    <p>This is the second event description.</p>
                </div>
                <div class="timeline-event-card" data-index="2">
                    <h3>Event 3</h3>
                    <p>This is the third event description.</p>
                </div>
                <div class="timeline-event-card" data-index="3">
                    <h3>Event 4</h3>
                    <p>This is the fourth event description.</p>
                </div>
                <div class="timeline-event-card" data-index="4">
                    <h3>Event 5</h3>
                    <p>This is the fifth event description.</p>
                </div>
            </div>
        </div>
        
        <!-- Test for Row-style Timeline (Zeus Trojan style) -->
        <div class="test-section">
            <h2>Row-style Timeline Test</h2>
            <div class="row-timeline">
                <div class="row position-relative">
                    <div class="col text-center">
                        <div class="timeline-point" data-index="0">
                            <i class="fas fa-binoculars"></i>
                        </div>
                        <p class="mt-2">First Appearance</p>
                    </div>
                    <div class="col text-center">
                        <div class="timeline-point" data-index="1">
                            <i class="fas fa-globe"></i>
                        </div>
                        <p class="mt-2">Widespread Distribution</p>
                    </div>
                    <div class="col text-center">
                        <div class="timeline-point" data-index="2">
                            <i class="fas fa-university"></i>
                        </div>
                        <p class="mt-2">Banking Targets</p>
                    </div>
                    <div class="col text-center">
                        <div class="timeline-point" data-index="3">
                            <i class="fas fa-gavel"></i>
                        </div>
                        <p class="mt-2">Law Enforcement Response</p>
                    </div>
                    <div class="col text-center">
                        <div class="timeline-point" data-index="4">
                            <i class="fas fa-code-branch"></i>
                        </div>
                        <p class="mt-2">Legacy & Variants</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/timeline-fix.js"></script>
    <script src="js/timeline_diagnostics.js"></script>
</body>
</html>
