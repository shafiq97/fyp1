// Timeline Debug Helper and Fixer
document.addEventListener('DOMContentLoaded', function() {
    console.log('Timeline Debug Helper and Fixer loaded');
    
    // Check if timeline elements exist
    const timelineContainer = document.querySelector('.timeline-container');
    console.log('Timeline container found:', !!timelineContainer);
    if (!timelineContainer) return;
    
    // Get all timeline components
    const timelinePoints = document.querySelectorAll('.timeline-point');
    const timelineCards = document.querySelectorAll('.timeline-event-card');
    const timelineLines = document.querySelectorAll('.timeline-line');
    
    console.log('Timeline points found:', timelinePoints.length);
    console.log('Timeline cards found:', timelineCards.length);
    
    // Make sure we have the same number of points and cards
    if (timelinePoints.length !== timelineCards.length) {
        console.error('Mismatch between timeline points and cards');
        return;
    }
    
    // Ensure all timeline points have proper attributes and event listeners
    timelinePoints.forEach((point, index) => {
        point.setAttribute('tabindex', '0');
        point.setAttribute('role', 'button');
        
        // Make sure point has data-index
        if (!point.hasAttribute('data-index')) {
            point.setAttribute('data-index', index.toString());
        }
        
        // Ensure point has an icon
        if (!point.querySelector('i')) {
            const iconClasses = ['fa-virus', 'fa-share-alt', 'fa-globe', 'fa-shield-alt', 'fa-chart-line'];
            const icon = document.createElement('i');
            icon.className = 'fas ' + (iconClasses[index] || 'fa-circle');
            point.appendChild(icon);
        }
        
        // Add click event if not already present
        point.onclick = () => {
            setActiveTimelinePoint(parseInt(point.getAttribute('data-index')));
        };
    });
    
    // Ensure all timeline cards have proper attributes
    timelineCards.forEach((card, index) => {
        // Make sure card has data-index
        if (!card.hasAttribute('data-index')) {
            card.setAttribute('data-index', index.toString());
        }
        
        // Set initial display style for all cards
        card.style.display = 'none';
    });
    
    // Function to set active timeline point and card
    function setActiveTimelinePoint(index) {
        const maxIndex = timelinePoints.length - 1;
        if (index < 0 || index > maxIndex) return;
        
        // Update points
        timelinePoints.forEach((p, i) => {
            if (i === index) {
                p.classList.add('active');
            } else {
                p.classList.remove('active');
            }
            
            // Dim points that come after the active one
            p.style.opacity = i > index ? '0.6' : '1';
        });
        
        // Update cards
        timelineCards.forEach((c, i) => {
            if (i === index) {
                c.classList.add('active');
                c.style.display = 'block';
                c.style.opacity = '1';
                c.style.transform = 'translateY(0)';
            } else {
                c.classList.remove('active');
                c.style.display = 'none';
            }
        });
        
        // Update progress bar
        const progress = index * (100 / maxIndex);
        timelineLines.forEach(line => {
            line.style.setProperty('--progress-width', `${progress}%`);
        });
        
        console.log(`Timeline point ${index} activated`);
    }
    
    // Initialize timeline - set first point as active
    console.log('Initializing timeline');
    setActiveTimelinePoint(0);
    
    // Add keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (!timelineContainer.contains(document.activeElement)) return;
        
        const activeIndex = Array.from(timelinePoints).findIndex(p => p.classList.contains('active'));
        
        if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
            e.preventDefault();
            setActiveTimelinePoint(Math.min(activeIndex + 1, timelinePoints.length - 1));
        } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
            e.preventDefault();
            setActiveTimelinePoint(Math.max(activeIndex - 1, 0));
        }
    });
    
    // Add mobile swipe support
    let touchStartX = 0;
    let touchEndX = 0;
    
    timelineContainer.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });
    
    timelineContainer.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    }, { passive: true });
    
    function handleSwipe() {
        const activeIndex = Array.from(timelinePoints).findIndex(p => p.classList.contains('active'));
        const swipeThreshold = 50;
        const swipeDistance = touchEndX - touchStartX;
        
        if (Math.abs(swipeDistance) < swipeThreshold) return;
        
        if (swipeDistance > 0) {
            // Swipe right - previous
            setActiveTimelinePoint(Math.max(activeIndex - 1, 0));
        } else {
            // Swipe left - next
            setActiveTimelinePoint(Math.min(activeIndex + 1, timelinePoints.length - 1));
        }
    }
});
