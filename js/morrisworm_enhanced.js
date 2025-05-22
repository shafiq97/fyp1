/**
 * Enhanced Timeline Functionality for Morris Worm History
 */
document.addEventListener('DOMContentLoaded', function() {
    // Timeline point click functionality
    const timelinePoints = document.querySelectorAll('.timeline-point');
    const eventCards = document.querySelectorAll('.timeline-event-card');
    
    // Set first point as active by default
    if (timelinePoints.length > 0) {
        timelinePoints[0].classList.add('active');
        
        if (eventCards.length > 0) {
            eventCards[0].classList.add('active');
        }
    }
    
    // Add click event to all timeline points
    timelinePoints.forEach(point => {
        point.addEventListener('click', function() {
            // Get the index of the clicked point
            const index = this.getAttribute('data-index');
            
            // Remove active class from all points and cards
            timelinePoints.forEach(p => p.classList.remove('active'));
            eventCards.forEach(card => card.classList.remove('active'));
            
            // Add active class to clicked point and corresponding card
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
            
            // Update progress bar
            document.querySelector('.timeline-line').style.setProperty('--progress-width', 
                (parseInt(index) / (timelinePoints.length - 1) * 100) + '%');
        });
    });
    
    // Interactive elements for diagram and lessons sections
    const diagramSteps = document.querySelectorAll('.diagram-step');
    diagramSteps.forEach(step => {
        step.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
            this.style.boxShadow = '0 10px 20px rgba(0,0,0,0.2)';
        });
        
        step.addEventListener('mouseleave', function() {
            this.style.transform = '';
            this.style.boxShadow = '';
        });
    });
    
    const lessonCards = document.querySelectorAll('.lesson-card');
    lessonCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
        });
    });
});
