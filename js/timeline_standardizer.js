/**
 * Timeline Points Standardizer
 * This script ensures all timelines display 5 points consistently
 */

document.addEventListener('DOMContentLoaded', function() {
    // Check if we're on a history page
    const historyContainer = document.querySelector('.history-details');
    if (!historyContainer) return;
    
    // Get all timeline lines
    const timelineLines = document.querySelectorAll('.timeline-line');
    
    timelineLines.forEach(timelineLine => {
        const timelinePoints = timelineLine.querySelectorAll('.timeline-point');
        
        // If we don't have exactly 5 points or if we have no points at all, we need to fix it
        if (timelinePoints.length !== 5 || timelinePoints.length === 0) {
            console.log(`Found timeline with ${timelinePoints.length} points instead of 5, standardizing...`);
            
            // Get current points data to preserve any existing points
            const existingPointsData = [];
            timelinePoints.forEach(point => {
                const index = point.getAttribute('data-index');
                const label = point.getAttribute('aria-label') || '';
                const iconClass = point.querySelector('i')?.className.replace('fas ', '') || '';
                
                existingPointsData.push({
                    index: index,
                    label: label,
                    iconClass: iconClass
                });
            });
            
            // Standard 5-point timeline data
            const standardTimelineData = [
                { index: 0, label: 'Initial Release', iconClass: 'fa-flag' },
                { index: 1, label: 'Propagation', iconClass: 'fa-network-wired' },
                { index: 2, label: 'Impact', iconClass: 'fa-exclamation-triangle' },
                { index: 3, label: 'Containment', iconClass: 'fa-shield-alt' },
                { index: 4, label: 'Aftermath', iconClass: 'fa-gavel' }
            ];
            
            // Merge existing data with standard data
            // We'll use existing data where available, and fall back to standard data
            const finalTimelineData = standardTimelineData.map((item, idx) => {
                if (existingPointsData[idx]) {
                    return {
                        index: idx,
                        label: existingPointsData[idx].label || item.label,
                        iconClass: existingPointsData[idx].iconClass || item.iconClass
                    };
                }
                return {
                    index: idx,
                    label: item.label,
                    iconClass: item.iconClass
                };
            });
            
            // Clear existing timeline points
            timelinePoints.forEach(point => point.remove());
            
            // Create 5 standard points
            finalTimelineData.forEach(item => {
                const pointElement = document.createElement('div');
                pointElement.className = 'timeline-point';
                pointElement.setAttribute('data-index', item.index);
                pointElement.setAttribute('aria-label', item.label);
                
                const iconElement = document.createElement('i');
                iconElement.className = `fas ${item.iconClass}`;
                
                pointElement.appendChild(iconElement);
                timelineLine.appendChild(pointElement);
            });
            
            // Reapply timeline functionality
            if (window.applyTimelineBehaviors) {
                window.applyTimelineBehaviors(timelineLine);
            }
        }
    });
    
    // Also check if we need to create corresponding timeline event cards
    const timelineContainers = document.querySelectorAll('.timeline-container');
    timelineContainers.forEach(container => {
        const timeline = container.querySelector('.timeline-line');
        if (!timeline) return;
        
        const points = timeline.querySelectorAll('.timeline-point');
        let cards = container.querySelectorAll('.timeline-event-card');
        
        // If we don't have the same number of cards as points, fix it
        if (cards.length !== points.length) {
            console.log(`Found timeline container with ${cards.length} cards for ${points.length} points, fixing...`);
            
            // Remove existing cards
            cards.forEach(card => card.remove());
            
            // Create standard cards for each point
            points.forEach((point, i) => {
                const label = point.getAttribute('aria-label') || `Event ${i+1}`;
                
                const card = document.createElement('div');
                card.className = 'timeline-event-card';
                card.setAttribute('data-index', i);
                
                // Get data for this point
                let title = label;
                let year = (new Date()).getFullYear(); // Current year as fallback
                let description = `Details for ${label}`;
                
                if (label === "Initial Release" || label === "Worm Release") year = "1988";
                if (label === "Propagation" || label === "Rapid Propagation") year = "1988";
                if (label === "Impact" || label === "Systems Crash") year = "1988";
                if (label === "Containment") year = "1988";
                if (label === "Aftermath" || label === "Legal Aftermath") year = "1988-1990";
                
                // Create card content
                card.innerHTML = `
                    <h2>${year}</h2>
                    <h3>${title}</h3>
                    <p>${description}</p>
                `;
                
                container.appendChild(card);
            });
            
            // Show the first card as active
            const firstCard = container.querySelector('.timeline-event-card');
            if (firstCard) {
                firstCard.classList.add('active');
            }
        }
    });
});
