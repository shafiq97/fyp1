document.addEventListener('DOMContentLoaded', function() {
    const timelineContainer = document.querySelector('.timeline-container');
    if (!timelineContainer) return;

    const timelinePoints = document.querySelectorAll('.timeline-point');
    const timelineCards = document.querySelectorAll('.timeline-event-card');
    const timelineLine = document.querySelector('.timeline-line');

    // Initialize the first point as active
    if (timelinePoints.length > 0 && timelineCards.length > 0) {
        timelinePoints[0].classList.add('active');
        timelineCards[0].classList.add('active');
        if (timelineLine) {
            timelineLine.style.setProperty('--progress-width', '0%');
        }
    }

    // Handle click events on timeline points
    timelinePoints.forEach((point, index) => {
        point.addEventListener('click', function() {
            const currentIndex = parseInt(this.getAttribute('data-index'));
            
            // Remove active class from all points and cards
            timelinePoints.forEach(p => p.classList.remove('active'));
            timelineCards.forEach(card => card.classList.remove('active'));
            
            // Add active class to current point
            this.classList.add('active');
            
            // Find and show the corresponding card
            const card = document.querySelector(`.timeline-event-card[data-index="${currentIndex}"]`);
            if (card) {
                card.classList.add('active');
                card.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
            
            // Update progress line
            if (timelineLine) {
                const progress = (currentIndex / (timelinePoints.length - 1)) * 100;
                timelineLine.style.setProperty('--progress-width', `${progress}%`);
            }
        });
    });

    // Add keyboard navigation
    document.addEventListener('keydown', (e) => {
        const activePoint = document.querySelector('.timeline-point.active');
        if (!activePoint) return;

        const currentIndex = parseInt(activePoint.getAttribute('data-index'));
        let nextIndex = currentIndex;

        switch (e.key) {
            case 'ArrowRight':
            case 'ArrowDown':
                nextIndex = Math.min(currentIndex + 1, timelinePoints.length - 1);
                break;
            case 'ArrowLeft':
            case 'ArrowUp':
                nextIndex = Math.max(currentIndex - 1, 0);
                break;
            default:
                return;
        }

        if (nextIndex !== currentIndex) {
            timelinePoints[nextIndex].click();
        }
    });
});
