/**
 * Timeline Progress Fix
 * This script ensures the progress line works correctly with any number of timeline points
 */

// Define a reusable function to apply timeline behaviors
window.applyTimelineBehaviors = function(timeline) {
    if (!timeline) return;
    
    // Get all timeline points
    const timelinePoints = timeline.querySelectorAll('.timeline-point');
    const totalPoints = timelinePoints.length;
    
    // Find the parent container
    const container = timeline.closest('.timeline-container');
    if (!container) return;
    
    // Set the CSS variable for total points
    timeline.style.setProperty('--total-points', totalPoints);
    
    // Set up click handlers for points
    timelinePoints.forEach((point, pointIndex) => {
        point.addEventListener('click', function() {
            // Get the index of the clicked point
            const index = parseInt(this.getAttribute('data-index') || pointIndex);
            
            // Calculate the correct progress percentage based on the actual number of points
            // The formula ensures equal spacing between points
            let progressWidth = 0;
            if (totalPoints > 1) {
                progressWidth = (index / (totalPoints - 1)) * 100;
            } else if (index > 0) {
                progressWidth = 100; // If there's only one point and it's active
            }
            
            // Apply the progress width
            timeline.style.setProperty('--progress-width', progressWidth + '%');
            
            // Set this point as active and deactivate others
            timelinePoints.forEach(p => p.classList.remove('active'));
            this.classList.add('active');
            
            // Handle event cards if they exist
            const eventCards = container.querySelectorAll('.timeline-event-card');
            eventCards.forEach(card => {
                card.classList.remove('active');
                const cardIndex = parseInt(card.getAttribute('data-index') || 0);
                if (cardIndex === index) {
                    card.classList.add('active');
                    // Smooth scroll to card
                    card.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
            });
        });
    });
    
    // Initialize the first point as active if none is active
    const activePoint = timeline.querySelector('.timeline-point.active');
    if (!activePoint && timelinePoints.length > 0) {
        timelinePoints[0].click();
    }
};

document.addEventListener('DOMContentLoaded', function() {
    // Find all timeline containers
    const timelineContainers = document.querySelectorAll('.timeline-container');
    
    timelineContainers.forEach(container => {
        const timeline = container.querySelector('.timeline-line');
        if (!timeline) return;
        
        // Get all timeline points
        const timelinePoints = timeline.querySelectorAll('.timeline-point');
        const totalPoints = timelinePoints.length;
        
        // Set the CSS variable for total points
        timeline.style.setProperty('--total-points', totalPoints);
        
        // Identify which history page we're on and add the appropriate class
        const historyContainer = document.querySelector('.history-details');
        if (historyContainer) {
            const pageUrl = window.location.pathname;
            
            if (pageUrl.includes('morrisworm')) {
                container.classList.add('morris-timeline');
            } else if (pageUrl.includes('iloveyou')) {
                container.classList.add('iloveyou-timeline');
            } else if (pageUrl.includes('zeus')) {
                container.classList.add('zeus-timeline');
            }
        }
        
        // Set up click handlers for points
        timelinePoints.forEach((point, pointIndex) => {
            point.addEventListener('click', function() {
                // Get the index of the clicked point
                const index = parseInt(this.getAttribute('data-index') || pointIndex);
                
                // Calculate the correct progress percentage based on the actual number of points
                // The formula ensures equal spacing between points
                let progressWidth = 0;
                if (totalPoints > 1) {
                    progressWidth = (index / (totalPoints - 1)) * 100;
                } else if (index > 0) {
                    progressWidth = 100; // If there's only one point and it's active
                }
                
                // Apply the progress width
                timeline.style.setProperty('--progress-width', progressWidth + '%');
                
                // Set this point as active and deactivate others
                timelinePoints.forEach(p => p.classList.remove('active'));
                this.classList.add('active');
                
                // Handle event cards if they exist
                const eventCards = document.querySelectorAll('.timeline-event-card');
                eventCards.forEach(card => {
                    card.classList.remove('active');
                    const cardIndex = parseInt(card.getAttribute('data-index') || 0);
                    if (cardIndex === index) {
                        card.classList.add('active');
                        // Smooth scroll to card
                        card.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                });
                
                // Log for debugging
                console.log(`Timeline Progress: Point ${index+1}/${totalPoints}, Width: ${progressWidth}%`);
            });
        });
        
        // Initialize the first point as active if none is active
        const activePoint = timeline.querySelector('.timeline-point.active');
        if (!activePoint && timelinePoints.length > 0) {
            timelinePoints[0].click();
        }
    });
    
    // Special handling for row-style timelines
    const rowTimelines = document.querySelectorAll('.row-timeline');
    rowTimelines.forEach(rowTimeline => {
        const points = rowTimeline.querySelectorAll('.timeline-point');
        points.forEach(point => {
            point.addEventListener('click', function() {
                points.forEach(p => p.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
});
