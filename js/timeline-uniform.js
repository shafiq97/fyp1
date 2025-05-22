/**
 * Timeline Uniform Spacing
 * This script ensures consistent timeline spacing across all pages
 * by standardizing the position calculations
 */

(function() {
  window.addEventListener('load', function() {
    // Wait for DOM to be fully loaded and rendered
    setTimeout(function() {
      // Get all timelines
      const timelines = document.querySelectorAll('.timeline-line');
      
      timelines.forEach(function(timeline) {
        // Get all points in this timeline
        const points = timeline.querySelectorAll('.timeline-point');
        const totalPoints = points.length;
        
        if (totalPoints === 0) return;
        
        // Get the timeline width
        const timelineWidth = timeline.offsetWidth;
        
        // Calculate position for each point
        points.forEach(function(point) {
          const index = parseInt(point.getAttribute('data-index'));
          
          // Skip if no valid index
          if (isNaN(index)) return;
          
          // Position based on index - ensure proper spacing
          let position;
          if (index === 0) {
            // First point
            position = {
              left: '0%',
              transform: 'translate(0, -50%)'
            };
          } else if (index === totalPoints - 1) {
            // Last point
            position = {
              left: '100%',
              transform: 'translate(-100%, -50%)'
            };
          } else {
            // Middle points
            const percentage = (index / (totalPoints - 1)) * 100;
            position = {
              left: percentage + '%',
              transform: 'translate(-50%, -50%)'
            };
          }
          
          // Apply positioning
          point.style.position = 'absolute';
          point.style.left = position.left;
          point.style.top = '50%';
          point.style.transform = position.transform;
        });
      });
      
      // Make sure the timeline is visible
      document.querySelectorAll('.timeline-container').forEach(function(container) {
        container.style.visibility = 'visible';
        container.style.opacity = '1';
      });
    }, 300);
  });
  
  // Handle window resize events
  window.addEventListener('resize', function() {
    setTimeout(function() {
      // Adjust point sizes based on screen width
      const points = document.querySelectorAll('.timeline-point');
      
      if (window.innerWidth <= 576) {
        // Small screens
        points.forEach(function(point) {
          point.style.width = '50px';
          point.style.height = '50px';
          
          const icon = point.querySelector('i');
          if (icon) {
            icon.style.fontSize = '1.5em';
          }
        });
      } else if (window.innerWidth <= 768) {
        // Medium screens
        points.forEach(function(point) {
          point.style.width = '60px';
          point.style.height = '60px';
          
          const icon = point.querySelector('i');
          if (icon) {
            icon.style.fontSize = '1.8em';
          }
        });
      } else {
        // Large screens
        points.forEach(function(point) {
          point.style.width = '70px';
          point.style.height = '70px';
          
          const icon = point.querySelector('i');
          if (icon) {
            icon.style.fontSize = '2.2em';
          }
        });
      }
    }, 300);
  });
})();
