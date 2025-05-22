<?php
/**
 * Timeline Icons Test Script
 * Tests the display of all Font Awesome icons used in timeline
 */

// Enable full error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline Icons Test</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/fa-icons-fix.css">
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
        .icon-test {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
        }
        .icon-card {
            width: 150px;
            height: 120px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: white;
        }
        .icon-display {
            font-size: 30px;
            margin-bottom: 10px;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .icon-name {
            font-size: 12px;
        }
        .icon-code {
            font-size: 10px;
            color: #666;
            margin-top: 5px;
        }
        .section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        h2 {
            color: #2c3e50;
        }
        .timeline-simulation {
            width: 80%;
            height: 80px;
            background-color: #f1f1f1;
            position: relative;
            margin: 50px auto;
            border-radius: 4px;
        }
        .timeline-point-test {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: white;
            border: 2px solid #3498db;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .success {
            color: green;
        }
        .warning {
            color: orange;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="test-container">
        <h1>Timeline Icons Test</h1>
        
        <div class="section">
            <h2>ILOVEYOU Timeline Icons</h2>
            <div class="icon-test">
                <div class="icon-card">
                    <div class="icon-display">
                        <i class="fas fa-virus"></i>
                    </div>
                    <div class="icon-name">fa-virus</div>
                    <div class="icon-code">Point 1</div>
                    <div id="iloveyou-1-status"></div>
                </div>
                <div class="icon-card">
                    <div class="icon-display">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <div class="icon-name">fa-share-alt</div>
                    <div class="icon-code">Point 2 (Deprecated)</div>
                    <div id="iloveyou-2-old-status"></div>
                </div>
                <div class="icon-card">
                    <div class="icon-display">
                        <i class="fas fa-share-nodes"></i>
                    </div>
                    <div class="icon-name">fa-share-nodes</div>
                    <div class="icon-code">Point 2 (New)</div>
                    <div id="iloveyou-2-status"></div>
                </div>
                <div class="icon-card">
                    <div class="icon-display">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="icon-name">fa-globe</div>
                    <div class="icon-code">Point 3</div>
                    <div id="iloveyou-3-status"></div>
                </div>
                <div class="icon-card">
                    <div class="icon-display">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="icon-name">fa-shield-alt</div>
                    <div class="icon-code">Point 4 (Deprecated)</div>
                    <div id="iloveyou-4-old-status"></div>
                </div>
                <div class="icon-card">
                    <div class="icon-display">
                        <i class="fas fa-shield-halved"></i>
                    </div>
                    <div class="icon-name">fa-shield-halved</div>
                    <div class="icon-code">Point 4 (New)</div>
                    <div id="iloveyou-4-status"></div>
                </div>
                <div class="icon-card">
                    <div class="icon-display">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="icon-name">fa-chart-line</div>
                    <div class="icon-code">Point 5</div>
                    <div id="iloveyou-5-status"></div>
                </div>
            </div>

            <h3>ILOVEYOU Timeline Simulation</h3>
            <div class="timeline-simulation">
                <div class="timeline-point-test" style="left: 10%;">
                    <i class="fas fa-virus"></i>
                </div>
                <div class="timeline-point-test" style="left: 30%;">
                    <i class="fas fa-share-alt"></i>
                </div>
                <div class="timeline-point-test" style="left: 50%;">
                    <i class="fas fa-globe"></i>
                </div>
                <div class="timeline-point-test" style="left: 70%;">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="timeline-point-test" style="left: 90%;">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>
        </div>
        
        <div class="section">
            <h2>Morris Worm Timeline Icons</h2>
            <div class="icon-test">
                <!-- Morris Worm Icons -->
                <div class="icon-card">
                    <div class="icon-display">
                        <i class="fas fa-bug"></i>
                    </div>
                    <div class="icon-name">fa-bug</div>
                    <div class="icon-code">Point 1</div>
                </div>
                <div class="icon-card">
                    <div class="icon-display">
                        <i class="fas fa-microchip"></i>
                    </div>
                    <div class="icon-name">fa-microchip</div>
                    <div class="icon-code">Point 2</div>
                </div>
                <div class="icon-card">
                    <div class="icon-display">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <div class="icon-name">fa-network-wired</div>
                    <div class="icon-code">Point 3</div>
                </div>
                <div class="icon-card">
                    <div class="icon-display">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="icon-name">fa-exclamation-triangle</div>
                    <div class="icon-code">Point 4 (Deprecated)</div>
                </div>
                <div class="icon-card">
                    <div class="icon-display">
                        <i class="fas fa-triangle-exclamation"></i>
                    </div>
                    <div class="icon-name">fa-triangle-exclamation</div>
                    <div class="icon-code">Point 4 (New)</div>
                </div>
                <div class="icon-card">
                    <div class="icon-display">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="icon-name">fa-search</div>
                    <div class="icon-code">Point 5</div>
                </div>
            </div>
        </div>
        
        <div class="section">
            <h2>Zeus Trojan Timeline Icons</h2>
            <div class="icon-test">
                <!-- Zeus Trojan Icons -->
                <div class="icon-card">
                    <div class="icon-display">
                        <i class="fas fa-horse-head"></i>
                    </div>
                    <div class="icon-name">fa-horse-head</div>
                    <div class="icon-code">Point 1</div>
                </div>
                <div class="icon-card">
                    <div class="icon-display">
                        <i class="fas fa-puzzle-piece"></i>
                    </div>
                    <div class="icon-name">fa-puzzle-piece</div>
                    <div class="icon-code">Point 2</div>
                </div>
                <div class="icon-card">
                    <div class="icon-display">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="icon-name">fa-code</div>
                    <div class="icon-code">Point 3</div>
                </div>
                <div class="icon-card">
                    <div class="icon-display">
                        <i class="fas fa-gavel"></i>
                    </div>
                    <div class="icon-name">fa-gavel</div>
                    <div class="icon-code">Point 4</div>
                </div>
                <div class="icon-card">
                    <div class="icon-display">
                        <i class="fas fa-history"></i>
                    </div>
                    <div class="icon-name">fa-history</div>
                    <div class="icon-code">Point 5</div>
                </div>
            </div>
        </div>
        
        <div>
            <p><a href="iloveyou_history.php">Go to ILOVEYOU History Page</a></p>
            <p><a href="morrisworm_history.php">Go to Morris Worm History Page</a></p>
            <p><a href="zeustrojan_history.php">Go to Zeus Trojan History Page</a></p>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if icons are visible
            function checkIconVisibility(selector, statusId) {
                const icon = document.querySelector(selector);
                const statusElement = document.getElementById(statusId);
                
                if (!icon || !statusElement) return;
                
                const rect = icon.getBoundingClientRect();
                const isVisible = rect.width > 0 && rect.height > 0;
                
                if (isVisible) {
                    statusElement.textContent = '✓ Visible';
                    statusElement.className = 'success';
                } else {
                    statusElement.textContent = '✕ Not visible';
                    statusElement.className = 'error';
                }
            }
            
            // Check ILOVEYOU icons
            setTimeout(() => {
                checkIconVisibility('.icon-display .fa-virus', 'iloveyou-1-status');
                checkIconVisibility('.icon-display .fa-share-alt', 'iloveyou-2-old-status');
                checkIconVisibility('.icon-display .fa-share-nodes', 'iloveyou-2-status');
                checkIconVisibility('.icon-display .fa-globe', 'iloveyou-3-status');
                checkIconVisibility('.icon-display .fa-shield-alt', 'iloveyou-4-old-status');
                checkIconVisibility('.icon-display .fa-shield-halved', 'iloveyou-4-status');
                checkIconVisibility('.icon-display .fa-chart-line', 'iloveyou-5-status');
            }, 500);
        });
    </script>
    <script src="js/fa-icon-fix.js"></script>
</body>
</html>
