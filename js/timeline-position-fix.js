/**
 * Fix specific position issues with the rendered timeline
 * This script ensures proper positioning of timeline points with responsive behavior
 */

(function() {
  // Run after window loads to ensure all other scripts have run
  window.addEventListener('load', function() {
    console.log('Timeline position fixer running...');
    
    // Give the timeline a moment to render
    setTimeout(function() {
      // Get all timeline elements across all timeline sections
      var timelines = document.querySelectorAll('.timeline-line');
      
      timelines.forEach(function(timeline) {
        var container = timeline.closest('.timeline-container');
        var points = timeline.querySelectorAll('.timeline-point');
        
        if (!timeline || !container || points.length === 0) {
          console.log('Timeline elements not found');
          return;
        }
        
        // Ensure the container has proper positioning
        container.style.position = 'relative';
        container.style.overflow = 'visible';
        
        // Make the timeline line take full width
        timeline.style.width = '100%';
        timeline.style.position = 'relative';
        
        // Calculate point width for spacing
        var pointWidth = points.length > 0 ? points[0].offsetWidth : 70;
        var timelineWidth = timeline.offsetWidth;
        
        // Ensure the first and last points are positioned correctly
        var firstPoint = timeline.querySelector('.timeline-point[data-index="0"]');
        var lastPoint = timeline.querySelector('.timeline-point[data-index="4"]');
        
        if (firstPoint) {
          firstPoint.style.position = 'absolute';
          firstPoint.style.left = '0%';
          firstPoint.style.top = '50%';
          firstPoint.style.transform = 'translate(0, -50%)';
          firstPoint.style.marginLeft = '0';
        }
        
        if (lastPoint) {
          lastPoint.style.position = 'absolute';
          lastPoint.style.left = '100%';
          lastPoint.style.top = '50%';
          lastPoint.style.transform = 'translate(-100%, -50%)';
          lastPoint.style.marginRight = '0';
        }
        
        // Position middle points proportionally
        var middlePoints = Array.from(points).filter(function(point) {
          var index = parseInt(point.getAttribute('data-index'));
          return index > 0 && index < 4;
        });
        
        middlePoints.forEach(function(point) {
          var index = parseInt(point.getAttribute('data-index'));
          var percentage = index * 25; // 25% spacing between points (0%, 25%, 50%, 75%, 100%)
          
          point.style.position = 'absolute';
          point.style.left = percentage + '%';
          point.style.top = '50%';
          point.style.transform = 'translate(-50%, -50%)';
        });
        
        // Force larger icon size
        points.forEach(function(point) {
          var icon = point.querySelector('i');
          if (icon) {
            icon.style.fontSize = '2.2em';
            icon.style.display = 'inline-block';
            icon.style.visibility = 'visible';
            icon.style.opacity = '1';
          }
        });
      });
      
      console.log('Timeline position fixed successfully');
    }, 500); // Half-second delay to ensure everything is loaded
    
    // Add window resize handler for responsive adjustments
    window.addEventListener('resize', function() {
      // Reapply positioning after resize
      setTimeout(function() {
        var timelines = document.querySelectorAll('.timeline-line');
        timelines.forEach(function(timeline) {
          var points = timeline.querySelectorAll('.timeline-point');
          var pointWidth = points.length > 0 ? points[0].offsetWidth : 70;
          
          // Adjust size for smaller screens
          if (window.innerWidth <= 768) {
            points.forEach(function(point) {
              var icon = point.querySelector('i');
              if (icon) {
                icon.style.fontSize = '1.8em';
              }
            });
          } else {
            points.forEach(function(point) {
              var icon = point.querySelector('i');
              if (icon) {
                icon.style.fontSize = '2.2em';
              }
            });
          }
        });
      }, 300);
    });
  });
})();
