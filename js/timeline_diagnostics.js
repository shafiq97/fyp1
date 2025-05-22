/**
 * Timeline Diagnostics Tool
 * This script helps diagnose and fix timeline issues across all pages
 */

// Function to output diagnostic information for timelines
function timelineDiagnostics() {
    console.log('*** TIMELINE DIAGNOSTICS ***');
    
    // Check for line-style timelines
    const timelineLines = document.querySelectorAll('.timeline-line');
    console.log(`Line-style timelines found: ${timelineLines.length}`);
    
    if (timelineLines.length > 0) {
        timelineLines.forEach((line, i) => {
            const points = line.querySelectorAll('.timeline-point');
            console.log(`Timeline #${i+1} has ${points.length} points`);
            
            // Check icon positioning within points
            points.forEach((point, j) => {
                const icon = point.querySelector('i');
                if (icon) {
                    console.log(`Point #${j+1} has icon: ${icon.className}`);
                    
                    // Get computed style to check positioning
                    const pointStyles = window.getComputedStyle(point);
                    const iconStyles = window.getComputedStyle(icon);
                    
                    console.log(`Point dimensions: ${pointStyles.width} x ${pointStyles.height}`);
                    console.log(`Icon position: left=${iconStyles.left}, top=${iconStyles.top}`);
                } else {
                    console.error(`Point #${j+1} is missing an icon!`);
                }
            });
        });
    }
    
    // Check for row-style timelines
    const rowTimelines = document.querySelectorAll('.row .timeline-point');
    console.log(`Row-style timeline points found: ${rowTimelines.length}`);
    
    if (rowTimelines.length > 0) {
        rowTimelines.forEach((point, i) => {
            const icon = point.querySelector('i');
            if (icon) {
                console.log(`Row Point #${i+1} has icon: ${icon.className}`);
            } else {
                console.error(`Row Point #${i+1} is missing an icon!`);
            }
        });
    }
    
    // Check event cards
    const eventCards = document.querySelectorAll('.timeline-event-card');
    console.log(`Timeline event cards found: ${eventCards.length}`);
    
    // Apply fixes if needed
    if (timelineLines.length > 0 || rowTimelines.length > 0) {
        applyTimelineFixes();
    }
}

// Function to apply emergency fixes to timelines if needed
function applyTimelineFixes() {
    console.log('Applying timeline fixes...');
    
    // Fix line-style timeline points
    document.querySelectorAll('.timeline-line .timeline-point').forEach(point => {
        // Ensure display flex is applied
        point.style.display = 'flex';
        point.style.alignItems = 'center';
        point.style.justifyContent = 'center';
        
        // Fix icon positioning
        const icon = point.querySelector('i');
        if (icon) {
            icon.style.position = 'absolute';
            icon.style.top = '50%';
            icon.style.left = '50%';
            icon.style.transform = 'translate(-50%, -50%)';
        }
    });
    
    // Fix row-style timeline points
    document.querySelectorAll('.row .timeline-point').forEach(point => {
        point.style.display = 'flex';
        point.style.alignItems = 'center';
        point.style.justifyContent = 'center';
    });
    
    console.log('Timeline fixes applied');
}

// Run diagnostics when page is fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Wait a bit to ensure all styles are applied
    setTimeout(timelineDiagnostics, 500);
});
