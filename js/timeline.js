/**
 * Unified Timeline JavaScript
 * Handles Font Awesome icons and timeline functionality
 */
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Font Awesome configuration
    const timelineIcons = [
        { index: 0, icon: 'virus', prefix: 'fas' },
        { index: 1, icon: 'share-nodes', prefix: 'fas' },
        { index: 2, icon: 'globe', prefix: 'fas' },
        { index: 3, icon: 'shield-halved', prefix: 'fas' },
        { index: 4, icon: 'chart-line', prefix: 'fas' }
    ];

    // Initialize timeline points
    const timelinePoints = document.querySelectorAll('.timeline-point');
    const eventCards = document.querySelectorAll('.timeline-event-card');

    // Update timeline icons
    timelinePoints.forEach((point, index) => {
        const iconElement = point.querySelector('i');
        if (iconElement && index < timelineIcons.length) {
            // Clear existing classes
            iconElement.className = '';
            // Add new classes
            iconElement.classList.add(timelineIcons[index].prefix, `fa-${timelineIcons[index].icon}`);
            // Force visibility
            iconElement.style.display = 'inline-block';
            iconElement.style.visibility = 'visible';
            iconElement.style.opacity = '1';
        }
    });

    // Set first point as active by default
    if (timelinePoints.length > 0) {
        timelinePoints[0].classList.add('active');
        if (eventCards.length > 0) {
            eventCards[0].classList.add('active');
        }
    }

    // Add click events to timeline points
    timelinePoints.forEach(point => {
        point.addEventListener('click', function() {
            const index = parseInt(this.getAttribute('data-index'));
            
            // Update active states
            timelinePoints.forEach(p => p.classList.remove('active'));
            eventCards.forEach(card => card.classList.remove('active'));
            this.classList.add('active');

            // Show corresponding card
            const card = document.querySelector(`.timeline-event-card[data-index="${index}"]`);
            if (card) {
                card.classList.add('active');
                card.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }

            // Update progress line
            const timeline = document.querySelector('.timeline-line');
            if (timeline) {
                const progress = index * (100 / (timelinePoints.length - 1));
                timeline.style.setProperty('--progress-width', progress + '%');
            }
        });
    });

    // Add keyboard navigation
    document.addEventListener('keydown', (e) => {
        const activePoint = document.querySelector('.timeline-point.active');
        if (!activePoint) return;

        const currentIndex = parseInt(activePoint.getAttribute('data-index'));
        let newIndex = currentIndex;

        if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
            newIndex = Math.min(currentIndex + 1, timelinePoints.length - 1);
        } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
            newIndex = Math.max(currentIndex - 1, 0);
        }

        if (newIndex !== currentIndex) {
            const nextPoint = document.querySelector(`.timeline-point[data-index="${newIndex}"]`);
            if (nextPoint) nextPoint.click();
        }
    });
});
