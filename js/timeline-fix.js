/**
 * Universal Timeline Fix
 * This script ensures consistent timeline behavior across all history pages
 */
document.addEventListener('DOMContentLoaded', function() {
    // Handle line-style timelines (Morris Worm, ILOVEYOU style)
    const timelinePoints = document.querySelectorAll('.timeline-line .timeline-point');
    const eventCards = document.querySelectorAll('.timeline-event-card');
    
    // Set first point as active by default if found
    if (timelinePoints.length > 0) {
        timelinePoints[0].classList.add('active');
        
        if (eventCards.length > 0) {
            eventCards[0].classList.add('active');
        }
        
        // Add click event to all timeline points
        timelinePoints.forEach(point => {
            point.addEventListener('click', function() {
                // Get the index of the clicked point
                const index = this.getAttribute('data-index');
                
                // Remove active class from all points and cards
                timelinePoints.forEach(p => p.classList.remove('active'));
                eventCards.forEach(card => card.classList.remove('active'));
                
                // Add active class to clicked point
                this.classList.add('active');
                
                // Find and show the corresponding event card
                const correspondingCard = document.querySelector(`.timeline-event-card[data-index="${index}"]`);
                if (correspondingCard) {
                    correspondingCard.classList.add('active');
                    
                    // Smooth scroll to the card
                    correspondingCard.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
                
                // Update progress bar if it exists
                const timelineLine = document.querySelector('.timeline-line');
                if (timelineLine) {
                    timelineLine.style.setProperty('--progress-width', 
                        (parseInt(index) / (timelinePoints.length - 1) * 100) + '%');
                }
            });
        });
    }
    
    // Handle row-style timelines (Zeus Trojan style)
    const rowTimelinePoints = document.querySelectorAll('.row .timeline-point');
    if (rowTimelinePoints.length > 0) {
        // Add hover effects to row-style timeline points
        rowTimelinePoints.forEach(point => {
            point.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.1)';
                this.style.boxShadow = '0 0 15px rgba(0,0,0,0.3)';
            });
            
            point.addEventListener('mouseleave', function() {
                this.style.transform = '';
                this.style.boxShadow = '';
            });
        });
    }
});
